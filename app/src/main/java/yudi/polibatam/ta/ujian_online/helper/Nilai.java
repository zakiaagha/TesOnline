package yudi.polibatam.ta.ujian_online.helper;

/**
 * Created by my_Pc on 4/30/2016.
 */

public class Nilai {
	private int ID;
	private String USER;
	private String MAPEL;
	private String NILAI;

	public Nilai()	{
		ID=0;
		USER="";
		MAPEL="";
		NILAI="";
	}

	public Nilai(String user, String mapel, String nilai) {
		
		USER = user;
		MAPEL = mapel;
		NILAI = nilai;
	}

	public int getID(){
		return ID;
	}

	public String getUSER() {
		return USER;
	}

	public String getMAPEL() {
		return MAPEL;
	}

	public String getNILAI() {
		return NILAI;
	}


	public void setID(int id) {
		ID=id;
	}

	public void setUSER(String User) {
		USER = User;
	}

	public void setMAPEL(String mapel) {
		MAPEL = mapel;
	}

	public void setNILAI(String nilai) {
		NILAI = nilai;
	}
}
