package yudi.polibatam.ta.ujian_online.helper;

/**
 * Created by my_Pc on 4/30/2016.
 */

public class Pertanyaan {
	private int ID;
	private String PERTANYAAN;
	private String PILA;
	private String PILB;
	private String PILC;
	private String PILD;
	private String JAWABAN;

	public Pertanyaan()	{
		ID=0;
		PERTANYAAN="";
		PILA="";
		PILB="";
		PILC="";
		PILD="";
		JAWABAN="";
	}

	public Pertanyaan(String Pertanyaan, String pilA, String pilB, String pilC, String pilD,
					  String jawaban) {
		
		PERTANYAAN = Pertanyaan;
		PILA = pilA;
		PILB = pilB;
		PILC = pilC;
		PILD = pilD;
		JAWABAN = jawaban;
	}

	public int getID(){
		return ID;
	}

	public String getPERTANYAAN() {
		return PERTANYAAN;
	}

	public String getPILA() {
		return PILA;
	}

	public String getPILB() {
		return PILB;
	}

	public String getPILC() {
		return PILC;
	}

	public String getPILD() {
		return PILD;
	}

	public String getJAWABAN() {
		return JAWABAN;
	}

	public void setID(int id) {
		ID=id;
	}

	public void setPERTANYAAN(String Pertanyaan) {
		PERTANYAAN = Pertanyaan;
	}

	public void setPILA(String pilA) {
		PILA = pilA;
	}

	public void setPILB(String pilB) {
		PILB = pilB;
	}

	public void setPILC(String pilC) {
		PILC = pilC;
	}

    public void setPILD(String pilD) {
        PILD = pilD;
    }

	public void setJAWABAN(String Jawaban) {
		JAWABAN = Jawaban;
	}
}
