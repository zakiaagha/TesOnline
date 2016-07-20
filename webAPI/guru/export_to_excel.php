<?php
require_once '../library/inc.connection.php';
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=Data Nilai.xls");
?>

<center><h2>Rekap Data Nilai</h2></center>
<table border='1'>
<h3>
<thead><tr>
<td align="center" width=50 style="background-color:#3B4752; color:white; border-color:#3B4752;"><b>No</b></td>
<td align="left" width=150 style="background-color:#3B4752; color:white; border-color:#3B4752;"><b>Nama</b></td>
<td align="left" width=180 style="background-color:#3B4752; color:white; border-color:#3B4752;"><b>Jurusan</b></td>
<td align="center" width=200 style="background-color:#3B4752; color:white; border-color:#3B4752;"><b>Tanggal Tes</b></td>
<td align="center" width=150 style="background-color:#3B4752; color:white; border-color:#3B4752;"><b>Nilai</b></td>
</tr></thead>
<h3><tbody>

<?php
$d = mysql_query("select * from tb_hasil ORDER BY mapel ASC ");
$ni=1;
while($kesenian=mysql_fetch_array($d)){
	$no=$ni++;	
?>

<tr>
    <td align="center" style="border-color:#3B4752;"><?php echo $no; ?></td>
    <td align="left" style="border-color:#3B4752;"><?php echo $kesenian['user']; ?></td>
    <td align="left" style="border-color:#3B4752;"><?php echo $kesenian['mapel']; ?></td>
    <td align="center" style="border-color:#3B4752;"><?php echo $kesenian['tgl_tes']; ?></td>
    <td align="center" style="border-color:#3B4752;"><?php echo $kesenian['nilai']; ?></td>
    </tr>
<?php
echo "<script>location.replace('?page=Data-Mapel')</script>";}
?>
</tbody></h3></table>