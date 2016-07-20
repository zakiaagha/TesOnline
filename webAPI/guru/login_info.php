<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<title></title>
</head>
<body>
<?php
$loginSql = "SELECT * FROM user_login WHERE userid='".$_SESSION['SES_LOGIN']."'";
$loginQry = mysql_query($loginSql, $koneksidb)  or die ("Query user salah : ".mysql_error());
$nomor  = 0; 
$loginRow = mysql_fetch_array($loginQry);
$kd_guru = $loginRow['nama'];

$guruSql = "SELECT * FROM tabel_guru WHERE kd_guru='$kd_guru'";
$guruQry = mysql_query($guruSql, $koneksidb)  or die ("Query user salah : ".mysql_error()); 
$guruRow = mysql_fetch_array($guruQry);
$nm_guru = $guruRow['nm_guru'];
?> 
	<table class="table">
		<div class="container">
    	<div class="row">
    	<tr>
    		<td class="success" colspan="3"><strong>Info Login</strong></td>
    	</tr>
    	<tr class="warning">
    		<td >User ID </td>
    		<td ><strong>:</strong></td>
    		<td ><?php echo $loginRow['userid']; ?></td>
  		</tr>
  		<tr class="warning">
    		<td>Nama Anda </td>
    		<td><strong>:</strong></td>
    		<td><?php echo $nm_guru; ?></td>
  		</tr>
  		</div>
  		</div>
	</table>
</body>
</html>
