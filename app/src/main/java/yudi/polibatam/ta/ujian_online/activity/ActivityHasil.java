package yudi.polibatam.ta.ujian_online.activity;

/**
 * Created by my_Pc on 4/30/2016.
 */

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Gravity;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import yudi.polibatam.ta.ujian_online.R;
import yudi.polibatam.ta.ujian_online.app.AppConfig;
import yudi.polibatam.ta.ujian_online.app.AppController;
import yudi.polibatam.ta.ujian_online.helper.SQLiteHandler;

public class ActivityHasil extends AppCompatActivity {

    private static final String TAG = ActivityMain.class.getSimpleName();
    private ProgressDialog pDialog;
    private Context context;
    ArrayList<HashMap<String, String>> list_nilai;
    int color_white = -1;
    private SQLiteHandler db;
    TableLayout table;

    private static final String TAG_JSON_ARRAY = "nilai";
    private static final String TAG_USER = "user";
    private static final String TAG_MAPEL= "mapel";
    private static final String TAG_NILAI= "nilai";
    private String nama;
    JSONArray JSONnilai = null;

    // Nama tabel nilai
    private static final String TABEL_HASIL = "hasil";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hasil);
        context = this;


        // Progress dialog
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);

        // kontrol SQLite database
        db = new SQLiteHandler(getApplicationContext());

        // ambil data dari SQLite
        HashMap<String, String> user = db.getUserDetails();
        nama = user.get("nama");

        table = (TableLayout) findViewById(R.id.tablelayout);
        list_nilai = (ArrayList<HashMap<String, String>>) getIntent().getSerializableExtra("arraylist");

        // Add header row
        TableRow rowHeader = new TableRow(context);
        rowHeader.setBackgroundColor(Color.parseColor("#c0c0c0"));
        rowHeader.setLayoutParams(new TableLayout.LayoutParams(TableLayout.LayoutParams.WRAP_CONTENT,
                TableLayout.LayoutParams.WRAP_CONTENT));
        String[] headerText = {"Materi", "Nilai"};
        for (String c : headerText) {
            TextView tv = new TextView(context);
            tv.setLayoutParams(new TableRow.LayoutParams(TableRow.LayoutParams.WRAP_CONTENT,
                    TableRow.LayoutParams.WRAP_CONTENT));
            tv.setGravity(Gravity.CENTER);
            tv.setTextSize(18);
            tv.setPadding(5, 5, 5, 5);
            tv.setText(c);
            rowHeader.addView(tv);
        }
        table.addView(rowHeader);

        lihatHasil(nama);


    }

    /**
     * fungsi fungsi ambil nilai
     * */
    private void lihatHasil(final String user) {
        String tag_string_req = "req_pertanyaan";

        pDialog.setMessage("Ambil Nilai ...");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST,
                AppConfig.URL_AMBIL_NILAI, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.d(TAG, "Ambil Nilai Berhasil: " + response);
                hideDialog();


                try {
                    JSONObject jObj = new JSONObject(response);
                    boolean error = jObj.getBoolean("error");

                    // cek error dari json
                    if (!error) {
                        // Getting JSON Array node
                        JSONnilai = jObj.getJSONArray(TAG_JSON_ARRAY);

                        // looping semua soal
                        for (int i = 0; i < JSONnilai.length(); i++) {
                            JSONObject c = JSONnilai.getJSONObject(i);

                            String user = c.getString(TAG_USER);
                            String mapel = c.getString(TAG_MAPEL);
                            String nilai = c.getString(TAG_NILAI);

                            // dara rows
                            TableRow row = new TableRow(context);
                            row.setLayoutParams(new TableLayout.LayoutParams(TableLayout.LayoutParams.WRAP_CONTENT,
                                    TableLayout.LayoutParams.WRAP_CONTENT));
                            String[] colText = {mapel, nilai};
                            for (String text : colText) {
                                TextView tv = new TextView(context);
                                tv.setLayoutParams(new TableRow.LayoutParams(TableRow.LayoutParams.WRAP_CONTENT,
                                        TableRow.LayoutParams.WRAP_CONTENT));
                                tv.setGravity(Gravity.CENTER);
                                tv.setTextSize(16);
                                tv.setPadding(5, 5, 5, 5);
                                tv.setText(text);
                                row.addView(tv);
                            }
                            table.addView(row);
                        }
                    } else {
                        // error pesan login
                        String  errorMsg = jObj.getString("pesan");
                        Toast.makeText(getApplicationContext(), errorMsg, Toast.LENGTH_LONG).show();
                    }
                } catch (JSONException e) {
                    // JSON error
                    e.printStackTrace();
                    Toast.makeText(getApplicationContext(), "Json error: " + e.getMessage(), Toast.LENGTH_LONG).show();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Ambil Nilai Gagal: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();
                hideDialog();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // post parameters ke login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("user", user);

                return params;
            }

        };

        // menambahkan permintaan
        AppController.getInstance().addToRequestQueue(strReq, tag_string_req);
    }

    @Override
    public void onBackPressed() {

        // Launching the login activity
        Intent intent = new Intent(ActivityHasil.this, ActivityMain.class);
        startActivity(intent);
        finish();
    }

    private void showDialog() {
        if (!pDialog.isShowing())
            pDialog.show();
    }

    private void hideDialog() {
        if (pDialog.isShowing())
            pDialog.dismiss();
    }


}



