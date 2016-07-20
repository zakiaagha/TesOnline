package yudi.polibatam.ta.ujian_online.activity;

/**
 * Created by my_Pc on 4/30/2016.
 */

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
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

public class ActivityMateri extends AppCompatActivity {
    private static final String TAG = ActivityMain.class.getSimpleName();
    private Button btnTMesin;
    private Button btnTMultimedia;
    private Button btnTOtomotif;
    private ProgressDialog pDialog;
    private SQLiteHandler db;

    private static final String TAG_JSON_ARRAY = "pertanyaan";
    private static final String TAG_PERTANYAAN = "desk_pertanyaan";
    private static final String TAG_JAWABAN = "jawaban";
    private static final String TAG_PILA = "pilihanA";
    private static final String TAG_PILB = "pilihanB";
    private static final String TAG_PILC = "pilihanC";
    private static final String TAG_PILD = "pilihanD";

    private HashMap<String, String> user;
    // Hashmap for ListView
    ArrayList<HashMap<String, String>> soalList;
    JSONArray pertanyaan = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_materi);

        soalList = new ArrayList<HashMap<String, String>>();
        btnTMesin = (Button) findViewById(R.id.btnTMesin);
        btnTMultimedia = (Button) findViewById(R.id.btnTMultimedia);
        btnTOtomotif = (Button) findViewById(R.id.btnTOtomotif);

        // Progress dialog
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);

        // kontrol SQLite database
        db = new SQLiteHandler(getApplicationContext());
        // ambil data dari SQLite
        user = db.getUserDetails();
        String jurusan = user.get("jurusan");

        if (jurusan.trim().equals("Teknik Mesin")) {
            btnTMesin.setVisibility(View.VISIBLE);
        }
        if (jurusan.trim().equals("Teknik Multimedia")) {
            btnTMultimedia.setVisibility(View.VISIBLE);
        }
        if (jurusan.trim().equals("Teknik Otomotif")) {
            btnTOtomotif.setVisibility(View.VISIBLE);
        }

        btnTMesin.setOnClickListener(new View.OnClickListener() {

            public void onClick(View view) {

                String mapelMesin = btnTMesin.getText().toString().trim();

                // cek isian form data
                if (!mapelMesin.isEmpty()) {
                    // cek tombol materi
                    ambilsoalMesin(mapelMesin);
                } else {
                    // jika form kosong
                    Toast.makeText(getApplicationContext(),
                            "silahkan pilih mata pelajaran", Toast.LENGTH_LONG)
                            .show();
                }
            }
        });

        btnTMultimedia.setOnClickListener(new View.OnClickListener() {

            public void onClick(View view) {

                String mapelMultimedia= btnTMultimedia.getText().toString().trim();

                // cek isian form data
                if (!mapelMultimedia.isEmpty()) {
                    // cek tombol materi
                    ambilsoalMultimedia(mapelMultimedia);
                } else {
                    // jika form kosong
                    Toast.makeText(getApplicationContext(),
                            "silahkan pilih mata pelajaran", Toast.LENGTH_LONG)
                            .show();
                }
            }
        });

        btnTOtomotif.setOnClickListener(new View.OnClickListener() {

            public void onClick(View view) {

                String mapelOtomotif = btnTOtomotif.getText().toString().trim();

                // cek isian form data
                if (!mapelOtomotif.isEmpty()) {
                    // cek tombol materi
                    ambilsoalOtomotif(mapelOtomotif);
                } else {
                    // jika form kosong
                    Toast.makeText(getApplicationContext(),
                            "silahkan pilih mata pelajaran", Toast.LENGTH_LONG)
                            .show();
                }
            }
        });
    }

    /**
     * fungsi fungsi ambil soal
     * */
    private void ambilsoalMesin(final String mapel) {
        String tag_string_req = "req_pertanyaan";

        pDialog.setMessage("Ambil Soal ...");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST,
                AppConfig.URL_AMBIL_SOAL, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.d(TAG, "Ambil Soal Berhasil: " + response);
                hideDialog();


                try {
                    JSONObject jObj = new JSONObject(response);
                    boolean error = jObj.getBoolean("error");

                    // cek error dari json
                    if (!error) {
                        // Getting JSON Array node
                        pertanyaan = jObj.getJSONArray(TAG_JSON_ARRAY);

                        // looping semua soal
                        for (int i = 0; i < pertanyaan.length(); i++) {
                            JSONObject c = pertanyaan.getJSONObject(i);

                            db.addPertanyaan(c.getString(TAG_PERTANYAAN), c.getString(TAG_JAWABAN),
                                    c.getString(TAG_PILA), c.getString(TAG_PILB), c.getString(TAG_PILC), c.getString(TAG_PILD));

                            Intent intent = new Intent(ActivityMateri.this, ActivityTeknikMesin.class);
                            startActivity(intent);
                            finish();
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
                Log.e(TAG, "Ambil Soal Gagal: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();
                hideDialog();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // post parameters ke login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("mapel", mapel);

                return params;
            }

        };

        // menambahkan permintaan
        AppController.getInstance().addToRequestQueue(strReq, tag_string_req);
    }

    /**
     * fungsi fungsi ambil soal
     * */
    private void ambilsoalMultimedia(final String mapel) {
        String tag_string_req = "req_pertanyaan";

        pDialog.setMessage("Ambil Soal ...");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST,
                AppConfig.URL_AMBIL_SOAL, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.d(TAG, "Ambil Soal Berhasil: " + response);
                hideDialog();


                try {
                    JSONObject jObj = new JSONObject(response);
                    boolean error = jObj.getBoolean("error");

                    // cek error dari json
                    if (!error) {
                        // Getting JSON Array node
                        pertanyaan = jObj.getJSONArray(TAG_JSON_ARRAY);

                        // looping semua soal
                        for (int i = 0; i < pertanyaan.length(); i++) {
                            JSONObject c = pertanyaan.getJSONObject(i);

                            db.addPertanyaan(c.getString(TAG_PERTANYAAN), c.getString(TAG_JAWABAN),
                                    c.getString(TAG_PILA), c.getString(TAG_PILB), c.getString(TAG_PILC), c.getString(TAG_PILD));

                            Intent intent = new Intent(ActivityMateri.this, ActivityTeknikMultimedia.class);
                            startActivity(intent);
                            finish();
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
                Log.e(TAG, "Ambil Soal Gagal: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();
                hideDialog();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // post parameters ke login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("mapel", mapel);

                return params;
            }

        };

        // menambahkan permintaan
        AppController.getInstance().addToRequestQueue(strReq, tag_string_req);
    }

    /**
     * fungsi ambil soal
     * */
    private void ambilsoalOtomotif(final String mapel) {
        String tag_string_req = "req_pertanyaan";

        pDialog.setMessage("Ambil Soal ...");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST,
                AppConfig.URL_AMBIL_SOAL, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.d(TAG, "Ambil Soal Berhasil: " + response);
                hideDialog();


                try {
                    JSONObject jObj = new JSONObject(response);
                    boolean error = jObj.getBoolean("error");

                    // cek error dari json
                    if (!error) {
                        // Getting JSON Array node
                        pertanyaan = jObj.getJSONArray(TAG_JSON_ARRAY);

                        // looping semua soal
                        for (int i = 0; i < pertanyaan.length(); i++) {
                            JSONObject c = pertanyaan.getJSONObject(i);

                            db.addPertanyaan(c.getString(TAG_PERTANYAAN), c.getString(TAG_JAWABAN),
                                    c.getString(TAG_PILA), c.getString(TAG_PILB), c.getString(TAG_PILC), c.getString(TAG_PILD));

                            Intent intent = new Intent(ActivityMateri.this, ActivityTeknikOtomotif.class);
                            startActivity(intent);
                            finish();
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
                Log.e(TAG, "Ambil Soal Gagal: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();
                hideDialog();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // post parameters ke login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("mapel", mapel);

                return params;
            }

        };

        // menambahkan permintaan
        AppController.getInstance().addToRequestQueue(strReq, tag_string_req);
    }

    private void showDialog() {
        if (!pDialog.isShowing())
            pDialog.show();
    }

    private void hideDialog() {
        if (pDialog.isShowing())
            pDialog.dismiss();
    }

    @Override
    public void onBackPressed() {
        // your code.
        db.deletePertanyaan();

        // Launching the login activity
        Intent intent = new Intent(ActivityMateri.this, ActivityMain.class);
        startActivity(intent);
        finish();
    }
}
