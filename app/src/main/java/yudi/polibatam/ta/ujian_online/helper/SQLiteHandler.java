package yudi.polibatam.ta.ujian_online.helper;

/**
 * Created by my_Pc on 4/30/2016.
 */

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class SQLiteHandler extends SQLiteOpenHelper {

	private static final String TAG = SQLiteHandler.class.getSimpleName();

	// variable statis
	// versi Database
	private static final int DATABASE_VERSION = 1;

	// Nama Database
	private static final String DATABASE_NAME = "android_api";

	// Nama tabel user login
	private static final String TABEL_USER = "user";
    // Nama tabel pertanyaan
    private static final String TABEL_PERTANYAAN = "pertanyaan";

	// Nama Kolom user login
	private static final String KEY_ID = "id";
	private static final String KEY_USERNAME= "username";
	private static final String KEY_NAMA = "nama";
	private static final String KEY_STATUS = "status";
	private static final String KEY_JURUSAN = "jurusan";

    // Nama Kolom pertanyaan
    private static final String KEY_PID = "id";
    private static final String KEY_PERTANYAAN = "pertanyaan";
    private static final String KEY_JAWABAN = "jawaban"; //jawaban benar
    private static final String KEY_PILA = "pila"; //Pilihan a
    private static final String KEY_PILB = "pilb"; //Pilihan b
    private static final String KEY_PILC = "pilc"; //Pilihan c
    private static final String KEY_PILD = "pild"; //Pilihan d

	public SQLiteHandler(Context context) {
		super(context, DATABASE_NAME, null, DATABASE_VERSION);
	}

	// buat tabel
	@Override
	public void onCreate(SQLiteDatabase db) {
		String BUAT_TABEL_USER = "CREATE TABLE " + TABEL_USER + "("
				+ KEY_ID + " INTEGER PRIMARY KEY AUTOINCREMENT," + KEY_USERNAME + " TEXT,"
				+ KEY_NAMA + " TEXT UNIQUE," + KEY_STATUS + " TEXT,"
				+ KEY_JURUSAN + " TEXT" + ")";

        String BUAT_TABEL_PERTANYAAN = "CREATE TABLE IF NOT EXISTS " + TABEL_PERTANYAAN + " ( "
                + KEY_PID + " INTEGER PRIMARY KEY AUTOINCREMENT, " + KEY_PERTANYAAN
                + " TEXT, " + KEY_JAWABAN + " TEXT, "+ KEY_PILA +" TEXT, "
                + KEY_PILB + " TEXT, " + KEY_PILC +" TEXT, "+ KEY_PILD +" TEXT)";

		db.execSQL(BUAT_TABEL_USER);
		db.execSQL(BUAT_TABEL_PERTANYAAN);

		Log.d(TAG, "Membuat tabel database");
	}

	// database
	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		// hapus tabel jika sudah ada
		db.execSQL("DROP TABLE IF EXISTS " + TABEL_USER);
		db.execSQL("DROP TABLE IF EXISTS " + TABEL_PERTANYAAN);
		// Buat tabel lagi
		onCreate(db);
	}

	/**
	 * Simpan user login detail di database
	 * */
	public void addUser(String username,  String nama, String status, String jurusan) {
		SQLiteDatabase db = this.getWritableDatabase();

		ContentValues values = new ContentValues();
		values.put(KEY_USERNAME, username); // username
		values.put(KEY_NAMA, nama); // Nama
		values.put(KEY_STATUS, status); // status
		values.put(KEY_JURUSAN, jurusan); // status

		// tambahkan baris
		long id = db.insert(TABEL_USER, null, values);
		db.close(); // tutup koneksi

		Log.d(TAG, "Penambahan user baru ke sqlite: " + id);
	}

	/**
	 * Ambil informasi data user dari database
	 * */
	public HashMap<String, String> getUserDetails() {
		HashMap<String, String> user = new HashMap<String, String>();
		String selectQuery = "SELECT  * FROM " + TABEL_USER;

		SQLiteDatabase db = this.getReadableDatabase();
		Cursor cursor = db.rawQuery(selectQuery, null);
		// pindahkan ke baris pertama
		cursor.moveToFirst();
		if (cursor.getCount() > 0) {
			user.put("username", cursor.getString(1));
			user.put("nama", cursor.getString(2));
			user.put("status", cursor.getString(3));
			user.put("jurusan", cursor.getString(4));
		}
		cursor.close();
		db.close();
		// return user
		Log.d(TAG, "Mengambil data user dari sqlite: " + user.toString());

		return user;
	}

	/**
	 * buat ulang database hapus semua tabel dan buat ulang lagi semuanya
	 * */
	public void deleteUsers() {
		SQLiteDatabase db = this.getWritableDatabase();
		// Delete All Rows
		db.delete(TABEL_USER, null, null);
        db.delete("SQLITE_SEQUENCE","NAME = ?",new String[]{TABEL_USER});
		db.close();

		Log.d(TAG, "Hapus semua informasi user dari sqlite");
	}

    /**
     * Simpan pertanyaan di database
     * */
    public void addPertanyaan(String pertanyaan,  String jawaban, String pila, String pilb, String pilc, String pild) {
        SQLiteDatabase db = this.getWritableDatabase();

        ContentValues values = new ContentValues();
        values.put(KEY_PERTANYAAN, pertanyaan); // pertanyaan
        values.put(KEY_PILA, pila); // pilihan a
        values.put(KEY_PILB, pilb); // pilihan b
		values.put(KEY_PILC, pilc); // pilihan c
        values.put(KEY_PILD, pild); // pilihan d
        values.put(KEY_JAWABAN, jawaban); // Jawaban

        // tambahkan baris
        long id = db.insert(TABEL_PERTANYAAN, null, values);
        db.close(); // tutup koneksi

        Log.d(TAG, "Penambahan pertanyaan baru ke sqlite: " + id);
    }

    /**
     * Ambil informasi data user dari databasex
     * */
    public HashMap<String, String> getPertanyaanDetails() {
        HashMap<String, String> pertanyaan = new HashMap<String, String>();
        String selectQuery = "SELECT  * FROM " + TABEL_PERTANYAAN;

        SQLiteDatabase db = this.getReadableDatabase();
        Cursor cursor = db.rawQuery(selectQuery, null);
        // pindahkan ke baris pertama
        cursor.moveToFirst();
        if (cursor.getCount() > 0) {
            pertanyaan.put("pertanyaan", cursor.getString(1));
            pertanyaan.put("jawaban", cursor.getString(2));
            pertanyaan.put("pila", cursor.getString(3));
            pertanyaan.put("pilb", cursor.getString(4));
            pertanyaan.put("pilc", cursor.getString(5));
            pertanyaan.put("pild", cursor.getString(6));
        }
        cursor.close();
        db.close();
        // return pertanyaan
        Log.d(TAG, "Mengambil pertanyaan dari sqlite: " + pertanyaan.toString());

        return pertanyaan;
    }

    /**
     * buat ulang database hapus semua tabel dan buat ulang lagi semuanya
     * */
    public void deletePertanyaan() {
        SQLiteDatabase db = this.getWritableDatabase();
        // Delete All Rows
        db.delete(TABEL_PERTANYAAN, null, null);
		db.delete("SQLITE_SEQUENCE","NAME = ?",new String[]{TABEL_PERTANYAAN});
        db.close();

        Log.d(TAG, "Hapus semua pertanyaan dari sqlite");
    }

	public List<Pertanyaan> ambilPertanyaan() {
		List<Pertanyaan> pList = new ArrayList<Pertanyaan>();
		// Select All Query
		String selectQuery = "SELECT  * FROM " + TABEL_PERTANYAAN;
		SQLiteDatabase db =this.getReadableDatabase();
		Cursor cursor = db.rawQuery(selectQuery, null);
		// looping through all rows and adding to list
		if (cursor.moveToFirst()) {
			do {
				Pertanyaan p = new Pertanyaan();
				p.setID(cursor.getInt(0));
				p.setPERTANYAAN(cursor.getString(1));
				p.setJAWABAN(cursor.getString(2));
				p.setPILA(cursor.getString(3));
				p.setPILB(cursor.getString(4));
				p.setPILC(cursor.getString(5));
				p.setPILD(cursor.getString(6));
				pList.add(p);
			} while (cursor.moveToNext());
		}
		// return quest list
		return pList;
	}

	public int rowcount()	{
		int row=0;
		String selectQuery = "SELECT  * FROM " + TABEL_PERTANYAAN;
		SQLiteDatabase db = this.getWritableDatabase();
		Cursor cursor = db.rawQuery(selectQuery, null);
		row=cursor.getCount();
		return row;
	}
}
