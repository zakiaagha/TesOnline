<?php
# Fungsi untuk membuat konversi nilai
function predikat($nilai) {
if($nilai>=96){   
	$predikat = 'A';
	$konversi = 4.00;
	$kriteria = 'SB';

}
elseif($nilai>=91){  
	$predikat = 'A-';
	$konversi = 3.67;
	$kriteria = 'SB';

}
elseif($nilai>=86){ 
	$predikat = 'B+';
	$konversi = 3.33;
	$kriteria = 'B';

}
elseif($nilai>=81){  
	$predikat = 'B';
	$konversi = 3.00;
	$kriteria = 'B';

}
elseif($nilai>=75){  
	$predikat = 'B-';
	$konversi = 2.67;
	$kriteria = 'B';

}
elseif($nilai>=70){ 
	$predikat = 'C+';
	$konversi = 2.33;
	$kriteria = 'B';

}
elseif($nilai>=65){   
	$predikat = 'C';
	$konversi = 2.00;
	$kriteria = 'B';

}
elseif($nilai>=60){  
	$predikat = 'C-';
	$konversi = 1.67;
	$kriteria = 'B';

}
elseif($nilai>=55){  
	$predikat = 'D+';
	$konversi = 1.33;
	$kriteria = 'K';

}
else {  
	$predikat = 'D';
	$konversi = 1.00;
	$kriteria = 'K';
	}
	return $predikat;
}
?>
<?php
# Fungsi untuk membuat konversi nilai
function konversi($nilai) {
if($nilai>=96){   
	$predikat = 'A';
	$konversi = 4.00;
	$kriteria = 'SB';

}
elseif($nilai>=91){  
	$predikat = 'A-';
	$konversi = 3.67;
	$kriteria = 'SB';

}
elseif($nilai>=86){ 
	$predikat = 'B+';
	$konversi = 3.33;
	$kriteria = 'B';

}
elseif($nilai>=81){  
	$predikat = 'B';
	$konversi = 3.00;
	$kriteria = 'B';

}
elseif($nilai>=75){  
	$predikat = 'B-';
	$konversi = 2.67;
	$kriteria = 'B';

}
elseif($nilai>=70){ 
	$predikat = 'C+';
	$konversi = 2.33;
	$kriteria = 'B';

}
elseif($nilai>=65){   
	$predikat = 'C';
	$konversi = 2.00;
	$kriteria = 'B';

}
elseif($nilai>=60){  
	$predikat = 'C-';
	$konversi = 1.67;
	$kriteria = 'B';

}
elseif($nilai>=55){  
	$predikat = 'D+';
	$konversi = 1.33;
	$kriteria = 'K';

}
else {  
	$predikat = 'D';
	$konversi = 1.00;
	$kriteria = 'K';
	}
	return $konversi;
}
?>
<?php
# Fungsi untuk membuat konversi nilai
function kriteria($nilai) {
if($nilai>=96){   
	$predikat = 'A';
	$konversi = 4.00;
	$kriteria = 'SB';

}
elseif($nilai>=91){  
	$predikat = 'A-';
	$konversi = 3.67;
	$kriteria = 'SB';

}
elseif($nilai>=86){ 
	$predikat = 'B+';
	$konversi = 3.33;
	$kriteria = 'B';

}
elseif($nilai>=81){  
	$predikat = 'B';
	$konversi = 3.00;
	$kriteria = 'B';

}
elseif($nilai>=75){  
	$predikat = 'B-';
	$konversi = 2.67;
	$kriteria = 'B';

}
elseif($nilai>=70){ 
	$predikat = 'C+';
	$konversi = 2.33;
	$kriteria = 'B';

}
elseif($nilai>=65){   
	$predikat = 'C';
	$konversi = 2.00;
	$kriteria = 'B';

}
elseif($nilai>=60){  
	$predikat = 'C-';
	$konversi = 1.67;
	$kriteria = 'B';

}
elseif($nilai>=55){  
	$predikat = 'D+';
	$konversi = 1.33;
	$kriteria = 'K';

}
else {  
	$predikat = 'D';
	$konversi = 1.00;
	$kriteria = 'K';
	}
	return $kriteria;
}
?>
<?php
# Fungsi untuk membuat pengetahuan
function pengetahuan($nilai) {
if($nilai>=96){   
	$predikat = 'A';
	$konversi = 4.00;
	$kriteria = 'SB';
	$pengetahuan = 'Memiliki kemampuan merencanakan konsep tentang .....';

}
elseif($nilai>=91){  
	$predikat = 'A-';
	$konversi = 3.67;
	$kriteria = 'SB';
	$pengetahuan = 'Memiliki kemampuan mengkritik konsep tentang .......';

}
elseif($nilai>=86){ 
	$predikat = 'B+';
	$konversi = 3.33;
	$kriteria = 'B';
	$pengetahuan = 'Memiliki kemampuan memeriksa konsep tentang.....';

}
elseif($nilai>=81){  
	$predikat = 'B';
	$konversi = 3.00;
	$kriteria = 'B';
	$pengetahuan = 'Memiliki kemampuan menganalisis konsep tentang.....';

}
elseif($nilai>=75){  
	$predikat = 'B-';
	$konversi = 2.67;
	$kriteria = 'B';
	$pengetahuan = 'Memiliki kemampuan mengaplikasikan konsep tentang.....';

}
elseif($nilai>=70){ 
	$predikat = 'C+';
	$konversi = 2.33;
	$kriteria = 'B';
	$pengetahuan = 'Memiliki kemampuan mengimplementasikan konsep tentang....';

}
elseif($nilai>=65){   
	$predikat = 'C';
	$konversi = 2.00;
	$kriteria = 'B';
	$pengetahuan = 'Memiliki kemampuan memahami konsep tentang......';

}
elseif($nilai>=60){  
	$predikat = 'C-';
	$konversi = 1.67;
	$kriteria = 'B';
	$pengetahuan = 'Memiliki kemampuan menjelaskan konsep tentang.....';

}
elseif($nilai>=55){  
	$predikat = 'D+';
	$konversi = 1.33;
	$kriteria = 'K';
	$pengetahuan = 'Memiliki kemampuan mengingat konsep tentang.....';

}
else {  
	$predikat = 'D';
	$konversi = 1.00;
	$kriteria = 'K';
	$pengetahuan = 'Memiliki kemampuan mengenali konsep tentang.....';
	}
	return $pengetahuan;
}
?>
<?php
# Fungsi untuk membuat pengetahuan
function keterampilan($nilai) {
if($nilai>=96){   
	$predikat = 'A';
	$konversi = 4.00;
	$kriteria = 'SB';
	$keterampilan = 'Memiliki kemampuan menciptakan alat atau konsep terkait dengan kompetensi.....';

}
elseif($nilai>=91){  
	$predikat = 'A-';
	$konversi = 3.67;
	$kriteria = 'SB';
	$keterampilan = 'Memiliki kemampuan dalam mengkombinasikan beberapa gerakan atau konsep terkait dengan  kompetensi....';

}
elseif($nilai>=86){ 
	$predikat = 'B+';
	$konversi = 3.33;
	$kriteria = 'B';
	$keterampilan = 'Memiliki kemampuan melakukan gerakan profesional sesuai dengan kompetensi.....';

}
elseif($nilai>=81){  
	$predikat = 'B';
	$konversi = 3.00;
	$kriteria = 'B';
	$keterampilan = 'Memiliki kemampuan   melakukan gerakan-gerakan kompleks terkait dengan  kompetensi....';

}
elseif($nilai>=75){  
	$predikat = 'B-';
	$konversi = 2.67;
	$kriteria = 'B';
	$keterampilan = 'Memiliki kemampuan  melakukan gerakan yang benar tanpa bimbingan terkait dengan kompetensi....';

}
elseif($nilai>=70){ 
	$predikat = 'C+';
	$konversi = 2.33;
	$kriteria = 'B';
	$keterampilan = 'Memiliki kemampuan menirukan gerakan terkait dengan kompetensi....';

}
elseif($nilai>=65){   
	$predikat = 'C';
	$konversi = 2.00;
	$kriteria = 'B';
	$keterampilan = 'Memiliki kemampuan dalam mempersiapkan gerakan yang baru dipelajari terkait dengan kompetensi....';

}
elseif($nilai>=60){  
	$predikat = 'C-';
	$konversi = 1.67;
	$kriteria = 'B';
	$keterampilan = 'Memiliki kemampuan dalam menunjukkan gerakan yang benar terkait dengan kompetensi....  ';

}
elseif($nilai>=55){  
	$predikat = 'D+';
	$konversi = 1.33;
	$kriteria = 'K';
	$keterampilan = 'Memiliki kemampuan  mempersepsikan objek yang baru terhadap gerakan yang harus dilakukan terkait dengan kompetensi...';

}
else {  
	$predikat = 'D';
	$konversi = 1.00;
	$kriteria = 'K';
	$keterampilan = 'Memiliki kemampuan  menghubungkan objek yang baru terhadap gerakan yang harus dilakukan terkait dengan kompetensi...';
	}
	return $keterampilan;
}
?>



<?php
# Fungsi untuk membuat pengetahuan
function sikapsiswa($nilai) {
if($nilai=='SB'){   
	$keterangan = 'Sudah Menunjukkan Sikap Ketaatan menjalankan agama,
Kreatifitas,
Kejujuran,
Kedisiplinan,
Kecermatan,
Ketekunan,
Tanggung Jawab,
Kerja Sama,
Toleransi,
Kesantunan,
Kerensponsifan dan
Keproaktifan';

}
elseif($nilai=='B'){  
	$keterangan = 'Sudah Menunjukkan Sikap Ketaatan menjalankan agama,
Kreatifitas,
Kejujuran,
Kedisiplinan,
Kecermatan,
Ketekunan,
Tanggung Jawab,
Kerja Sama dan
Toleransi';
}
elseif($nilai=='C'){ 
	$keterangan = 'Sudah Menunjukkan Sikap Ketaatan menjalankan agama,
Kreatifitas,
Kejujuran,
Kedisiplinan,
Kecermatan dan
Ketekunan';

}
else {  
	$keterangan = 'Sudah Menunjukkan Sikap Ketaatan menjalankan agama,
Kreatifitas dan
Kejujuran';
}
	return $keterangan;
}
?>
