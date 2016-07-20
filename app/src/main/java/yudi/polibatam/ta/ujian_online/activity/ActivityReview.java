package yudi.polibatam.ta.ujian_online.activity;

import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

import java.util.Arrays;
import java.util.HashMap;
import java.util.List;

import yudi.polibatam.ta.ujian_online.R;
import yudi.polibatam.ta.ujian_online.helper.Pertanyaan;
import yudi.polibatam.ta.ujian_online.helper.SQLiteHandler;

public class ActivityReview extends AppCompatActivity {
    List<Pertanyaan> pList;
    int nilai=0;
    int id=0;
    int urutanSoal = -1;
    String nama;
    Pertanyaan currentQ;
    TextView txtPertanyaan;
    TextView txtSoalNo;
    int jawabanYgDiPilih[] = null;
    int jawabanYgBenar[] = null;
    RadioGroup grp;
    RadioButton pilA, pilB, pilC, pilD;
    Button butNext;
    AlertDialog tampilKotakAlert;
    private SQLiteHandler db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_review);

        Bundle b=this.getIntent().getExtras();
        jawabanYgDiPilih = b.getIntArray("jawabanDipilih");
        jawabanYgBenar= b.getIntArray("jawabanBenar");

        db=new SQLiteHandler(this);
        pList = db.ambilPertanyaan();
        currentQ = pList.get(id);
        txtPertanyaan = (TextView)findViewById(R.id.rtxtSoal);
        txtSoalNo = (TextView)findViewById(R.id.rsoalNo);
        grp = (RadioGroup) findViewById(R.id.rradioGroup11);
        grp.clearCheck();
        pilA = (RadioButton)findViewById(R.id.rradio10);
        pilB = (RadioButton)findViewById(R.id.rradio11);
        pilC = (RadioButton)findViewById(R.id.rradio12);
        pilD = (RadioButton)findViewById(R.id.rradio13);
        butNext=(Button)findViewById(R.id.rbutton11);

        // ambil data dari SQLite
        HashMap<String, String> user = db.getUserDetails();
        nama = user.get("nama");

        tampilPertanyaan();

        butNext.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                    if (id < db.rowcount() ) {
                        currentQ = pList.get(id);
                        Log.d("jawaban", "jawaban dipilih" + Arrays.toString(jawabanYgDiPilih));
                        Log.d("jawaban", "jawaban benar" + Arrays.toString(jawabanYgBenar));
                        tampilPertanyaan();
                    } else {
                        tampilKotakAlert = new AlertDialog.Builder(ActivityReview.this)
                                .create();
                        tampilKotakAlert.setMessage("Review Selesai");

                        tampilKotakAlert.setButton(AlertDialog.BUTTON_NEGATIVE, "Keluar",
                                new DialogInterface.OnClickListener() {

                                    public void onClick(DialogInterface dialog, int which) {
                                        //hapus pertanyaan
                                        db = new SQLiteHandler(getApplicationContext());
                                        db.deletePertanyaan();

                                        //start intent
                                        Intent intent = new Intent(ActivityReview.this, ActivityMain.class);
                                        Bundle b = new Bundle();
                                        b.putInt("nilai", nilai); //nilai
                                        intent.putExtras(b); //kirim nilai ke intent berikutnya
                                        startActivity(intent);
                                        finish();
                                    }
                                });

                        tampilKotakAlert.show();
                    }
            }
        });
    }

    public void onBackPressed() {

        new AlertDialog.Builder(this).setMessage("Anda yakin, semua jawaban akan hilang?")
                .setPositiveButton("Iya", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        // kontrol SQLite database
                        db = new SQLiteHandler(getApplicationContext());
                        // your code.
                        db.deletePertanyaan();

                        // Launching the login activity
                        Intent intent = new Intent(ActivityReview.this, ActivityMain.class);
                        startActivity(intent);
                        finish();
                    }
                }).setNegativeButton("Tidak", null).show();
    }

    private void tampilPertanyaan()
    {
        urutanSoal++;

        pilA.setTextColor(Color.BLACK);
        pilB.setTextColor(Color.BLACK);
        pilC.setTextColor(Color.BLACK);
        pilD.setTextColor(Color.BLACK);

        if (jawabanYgDiPilih[urutanSoal] != jawabanYgBenar[urutanSoal]) {
            if (jawabanYgDiPilih[urutanSoal] == 1)
                pilA.setTextColor(Color.RED);
            if (jawabanYgDiPilih[urutanSoal] == 2)
                pilB.setTextColor(Color.RED);
            if (jawabanYgDiPilih[urutanSoal] == 3)
                pilC.setTextColor(Color.RED);
            if (jawabanYgDiPilih[urutanSoal] == 4)
                pilD.setTextColor(Color.RED);
        }
        if (jawabanYgBenar[urutanSoal] == 1)
            pilA.setTextColor(Color.GREEN);
        if (jawabanYgBenar[urutanSoal] == 2)
            pilB.setTextColor(Color.GREEN);
        if (jawabanYgBenar[urutanSoal] == 3)
            pilC.setTextColor(Color.GREEN);
        if(jawabanYgBenar[urutanSoal] == 4)
            pilD.setTextColor(Color.GREEN);

        grp.clearCheck();
        grp.clearAnimation();
        pilA.setEnabled(false);
        pilB.setEnabled(false);
        pilC.setEnabled(false);
        pilD.setEnabled(false);
        txtPertanyaan.setText(currentQ.getPERTANYAAN());
        pilA.setText(currentQ.getPILA());
        pilB.setText(currentQ.getPILB());
        pilC.setText(currentQ.getPILC());
        pilD.setText(currentQ.getPILD());
        id++;
        txtSoalNo.setText("No. " + id + " dari " + db.rowcount() + " soal");

    }

}
