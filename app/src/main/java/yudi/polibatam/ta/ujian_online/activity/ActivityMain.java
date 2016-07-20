package yudi.polibatam.ta.ujian_online.activity;

/**
 * Created by my_Pc on 4/30/2016.
 */

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.HashMap;

import yudi.polibatam.ta.ujian_online.R;
import yudi.polibatam.ta.ujian_online.helper.SQLiteHandler;
import yudi.polibatam.ta.ujian_online.helper.SessionManager;

public class ActivityMain extends AppCompatActivity {
    private ProgressDialog pDialog;

    // Hashmap for ListView
    ArrayList<HashMap<String, String>> daftarNilai;

    private TextView txtNama;
    private Button btnLogout;
    private Button btnMateri;
    private Button btnHasil;
    private Button btnBantuan;
    private String nama;

    private SQLiteHandler db;
    private SessionManager session;
    private HashMap<String, String> user;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        txtNama = (TextView) findViewById(R.id.nama);
        btnLogout = (Button) findViewById(R.id.btnLogout);
        btnMateri = (Button) findViewById(R.id.btnMateri);
        btnHasil = (Button) findViewById(R.id.btnHasil);
        btnBantuan= (Button) findViewById(R.id.btnBantuan);

        // Progress dialog
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);

        // SqLite database handler
        db = new SQLiteHandler(getApplicationContext());

        // pengaturan sesi
        session = new SessionManager(getApplicationContext());

        if (!session.isLoggedIn()) {
            logoutUser();
        }

        // ambil data dari SQLite
        user = db.getUserDetails();
        nama = user.get("nama");
        // menampilkan data
        txtNama.setText(nama);

        // fungsi klik tombol logout
        btnLogout.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                logoutUser();
            }
        });

        // fungsi klik tombol materi
        btnMateri.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {

                // buka materi activity
                Intent intent = new Intent(ActivityMain.this,
                        ActivityMateri.class);
                startActivity(intent);
            }
        });

        // fungsi klik tombol Hasil
        btnHasil.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                // buka materi activity
                Intent intent = new Intent(ActivityMain.this,
                        ActivityHasil.class);
                startActivity(intent);
            }
        });

        // fungsi klik tombol Bantuan
        btnBantuan.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                // buka materi activity
                Intent intent = new Intent(ActivityMain.this,
                        ActivityBantuan.class);
                startActivity(intent);
            }
        });
    }

    private void logoutUser() {
        session.setLogin(false);

        db.deleteUsers();

        // Launching the login activity
        Intent intent = new Intent(ActivityMain.this, ActivityLogin.class);
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

    public void onBackPressed() {
        logoutUser();
    }
}
