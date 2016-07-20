package yudi.polibatam.ta.ujian_online.activity;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import yudi.polibatam.ta.ujian_online.R;
import yudi.polibatam.ta.ujian_online.helper.SQLiteHandler;

public class ActivityDaftarHasilTes extends AppCompatActivity {

    private SQLiteHandler db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_daftar_hasil_tes);

        //get text view
        Button btnKembali = (Button) findViewById(R.id.btnKembali);
        //get text view
        TextView t=(TextView)findViewById(R.id.txtHasil);
        //get score
        Bundle b = getIntent().getExtras();
        int nilai= b.getInt("nilai");
        //display score
        t.setText(""+ nilai);

        btnKembali.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // kontrol SQLite database
                db = new SQLiteHandler(getApplicationContext());
                // your code.
                db.deletePertanyaan();

                Intent kembali = new Intent(ActivityDaftarHasilTes.this, ActivityMain.class);
                startActivity(kembali);
                finish();
            }
        });
    }

    public void onBackPressed() {

        // kontrol SQLite database
        db = new SQLiteHandler(getApplicationContext());
        // your code.
        db.deletePertanyaan();

        // Launching the login activity
        Intent intent = new Intent(ActivityDaftarHasilTes.this, ActivityMain.class);
        startActivity(intent);
        finish();
    }
}
