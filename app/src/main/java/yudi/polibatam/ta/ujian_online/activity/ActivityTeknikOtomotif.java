package yudi.polibatam.ta.ujian_online.activity;

/**
 * Created by my_Pc on 4/30/2016.
 */

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import yudi.polibatam.ta.ujian_online.R;
import yudi.polibatam.ta.ujian_online.app.AppConfig;
import yudi.polibatam.ta.ujian_online.app.AppController;
import yudi.polibatam.ta.ujian_online.helper.Pertanyaan;
import yudi.polibatam.ta.ujian_online.helper.SQLiteHandler;

public class ActivityTeknikOtomotif extends AppCompatActivity {

    List<Pertanyaan> pList;
    int nilai=0;
    int id=0;
    int urutanSoal = -1;
    String mapel = "Teknik Otomotif";
    String nama;
    String jawaban;
    Pertanyaan currentQ;
    int jawabanYgDiPilih[] = null;
    int jawabanYgBenar[] = null;
    TextView txtPertanyaan;
    TextView txtSoalNo;
    RadioGroup grp;
    RadioButton pilA, pilB, pilC, pilD;
    Button butNext;
    AlertDialog tampilKotakAlert;
    private SQLiteHandler db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_teknik_otomotif);

        db=new SQLiteHandler(this);
        pList = db.ambilPertanyaan();
        currentQ = pList.get(id);
        txtPertanyaan = (TextView)findViewById(R.id.txtOtomotif);
        txtSoalNo = (TextView)findViewById(R.id.soalNoOtomotif);
        grp = (RadioGroup) findViewById(R.id.radioGroup31);
        pilA = (RadioButton)findViewById(R.id.radio30);
        pilB = (RadioButton)findViewById(R.id.radio31);
        pilC = (RadioButton)findViewById(R.id.radio32);
        pilD = (RadioButton)findViewById(R.id.radio33);
        butNext=(Button)findViewById(R.id.button31);

        // ambil data dari SQLite
        HashMap<String, String> user = db.getUserDetails();
        nama = user.get("nama");

        jawabanYgDiPilih = new int[pList.size()];
        jawabanYgBenar = new int[pList.size()];
        tampilPertanyaan();

        butNext.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (grp.getCheckedRadioButtonId() == -1)
                {
                    Toast.makeText(getApplicationContext(),
                            "Silahkan Pilih jawaban", Toast.LENGTH_LONG)
                            .show();
                }
                else
                {
                    urutanSoal++;
                    RadioButton answer = (RadioButton) findViewById(grp.getCheckedRadioButtonId());
                    int idx = grp.indexOfChild(answer);
                    Log.d("Jawaban benar", currentQ.getJAWABAN() + " | Jawaban benar " + answer.getText());
                    jawabanYgBenar[urutanSoal] = Integer.valueOf(currentQ.getJAWABAN());
                    switch (idx){
                        case 0:
                            jawaban = "1";
                            break;
                        case 1:
                            jawaban = "2";
                            break;
                        case 2:
                            jawaban = "3";
                            break;
                        case 3:
                            jawaban = "4";
                            break;
                    }

                    jawabanYgDiPilih[urutanSoal] = Integer.valueOf(jawaban);
                    Log.d("jawaban", "jawaban anda" + Arrays.toString(jawabanYgDiPilih));
                    Log.d("jawaban", "jawaban benar" + Arrays.toString(jawabanYgBenar));
                    if (currentQ.getJAWABAN().equals(jawaban)) {
                        nilai++;
                        Log.d("nilai", "nilai anda " + nilai);
                    }
                    if (id < db.rowcount() ) {
                        currentQ = pList.get(id);
                        tampilPertanyaan();
                    } else {
                        kirimNilai(nama, mapel, "" + nilai * 10);
                        tampilKotakAlert = new AlertDialog.Builder(ActivityTeknikOtomotif.this)
                                .create();
                        tampilKotakAlert.setTitle("Hasil");
                        tampilKotakAlert.setMessage("Nilai Anda : " + nilai * 10);

                        tampilKotakAlert.setButton(AlertDialog.BUTTON_POSITIVE, "Periksa",
                                new DialogInterface.OnClickListener() {

                                    public void onClick(DialogInterface dialog, int which) {
                                        Bundle b = new Bundle();
                                        b.putIntArray("jawabanDipilih", jawabanYgDiPilih);
                                        b.putIntArray("jawabanBenar", jawabanYgBenar);
                                        Intent intent = new Intent(ActivityTeknikOtomotif.this, ActivityReview.class);
                                        intent.putExtras(b); //kirim nilai ke intent berikutnya
                                        startActivity(intent);
                                        finish();
                                    }
                                });

                        tampilKotakAlert.setButton(AlertDialog.BUTTON_NEGATIVE, "Keluar",
                                new DialogInterface.OnClickListener() {

                                    public void onClick(DialogInterface dialog, int which) {
                                        //hapus pertanyaan
                                        db = new SQLiteHandler(getApplicationContext());
                                        db.deletePertanyaan();

                                        //start intent
                                        Intent intent = new Intent(ActivityTeknikOtomotif.this, ActivityMain.class);
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
                        Intent intent = new Intent(ActivityTeknikOtomotif.this, ActivityMain.class);
                        startActivity(intent);
                        finish();
                    }
                }).setNegativeButton("Tidak", null).show();
    }

    private void tampilPertanyaan()
    {

        grp.clearCheck();
        txtPertanyaan.setText(currentQ.getPERTANYAAN());
        pilA.setText(currentQ.getPILA());
        pilB.setText(currentQ.getPILB());
        pilC.setText(currentQ.getPILC());
        pilD.setText(currentQ.getPILD());
        id++;
        txtSoalNo.setText("No. " + id + " dari " + db.rowcount() + " soal");
    }

    /**
     * fungsi verifikasi login ke mysql database
     * */
    private void kirimNilai(final String username, final String mapel, final String nilai) {
        // digunakan ketika membatalkan login
        String tag_string_req = "kirim_nilai";

        StringRequest strReq = new StringRequest(Request.Method.POST,
                AppConfig.URL_KIRIM_NILAI, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {

                try {

                } catch (Exception e) {
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // post parameters ke login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("username", username);
                params.put("mapel", mapel);
                params.put("nilai", nilai);

                return params;
            }

        };

        // menambahkan permintaan
        AppController.getInstance().addToRequestQueue(strReq, tag_string_req);
    }

}
