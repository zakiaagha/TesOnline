package yudi.polibatam.ta.ujian_online.activity;

/**
 * Created by my_Pc on 4/30/2016.
 */

import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request.Method;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import yudi.polibatam.ta.ujian_online.R;
import yudi.polibatam.ta.ujian_online.app.AppConfig;
import yudi.polibatam.ta.ujian_online.app.AppController;
import yudi.polibatam.ta.ujian_online.helper.SQLiteHandler;
import yudi.polibatam.ta.ujian_online.helper.SessionManager;

public class ActivityLogin extends AppCompatActivity {
    private static final String TAG = ActivityMain.class.getSimpleName();
    private Button btnLogin;
    private EditText inputUsername;
    private EditText inputPassword;
    private ProgressDialog pDialog;
    private SessionManager session;
    private SQLiteHandler db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        inputUsername = (EditText) findViewById(R.id.username);
        inputPassword = (EditText) findViewById(R.id.password);
        btnLogin = (Button) findViewById(R.id.btnLogin);

        // Progress dialog
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);

        // kontrol SQLite database
        db = new SQLiteHandler(getApplicationContext());

        // pengaturan sesi
        session = new SessionManager(getApplicationContext());

        // cek login user sudah login atau belum
        if (session.isLoggedIn()) {
            // jika sudah login. buka activity main
            Intent intent = new Intent(ActivityLogin.this, ActivityMain.class);
            startActivity(intent);
            finish();
        }

        // fungsi klik tombol login
        btnLogin.setOnClickListener(new View.OnClickListener() {

            public void onClick(View view) {
                String username = inputUsername.getText().toString().trim();
                String password = inputPassword.getText().toString().trim();

                // cek isian form data
                if (!username.isEmpty() && !password.isEmpty()) {
                    // login user
                    checkLogin(username, password);
                } else {
                    // jika form kosong
                    Toast.makeText(getApplicationContext(),
                            "Username dan password harus diisi", Toast.LENGTH_LONG)
                            .show();
                }
            }
        });
    }

    /**
     * fungsi verifikasi login ke mysql database
     * */
    private void checkLogin(final String username, final String password) {
        // digunakan ketika membatalkan login
        String tag_string_req = "req_login";

        pDialog.setMessage("Logging in ...");
        showDialog();

        StringRequest strReq = new StringRequest(Method.POST,
                AppConfig.URL_LOGIN, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.d(TAG, "Login Response: " + response.toString());
                hideDialog();

                try {
                    JSONObject jObj = new JSONObject(response);
                    boolean error = jObj.getBoolean("error");

                    // cek error dari json
                    if (!error) {
                        // jika user sukses login
                        // buat sesi login
                        session.setLogin(true);

                        // simpan user ke SQLite
                        JSONObject user = jObj.getJSONObject("user");
                        String username = user.getString("username");
                        String nama = user.getString("nama");
                        String status = user.getString("status");
                        String jurusan = user.getString("jurusan");

                        // menambahkan row ke tabel
                        db.addUser(username, nama, status, jurusan);

                        // buka main activity
                        Intent intent = new Intent(ActivityLogin.this,
                                ActivityMain.class);
                        startActivity(intent);
                        finish();
                    } else {
                        // error pesan login
                        String errorMsg = jObj.getString("error_msg");
                        Toast.makeText(getApplicationContext(),
                                errorMsg, Toast.LENGTH_LONG).show();
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
                Log.e(TAG, "Login Error: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();
                hideDialog();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // post parameters ke login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("username", username);
                params.put("password", password);

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

    public void onBackPressed() {
        new AlertDialog.Builder(this).setMessage("Anda yakin akan keluar?")
                .setPositiveButton("Iya", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        finish();
                        System.exit(0);
                    }
                }).setNegativeButton("Tidak", null).show();
    }
}
