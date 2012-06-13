<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: index.php');
}

include('procedure.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Pengelolaan Aset</title>
<link rel="shortcut icon" href="image/favicon.ico" />
<link href="style/Level3_3.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">


</head>

<body>
<div class="header">
	<div id="logo">
    	<div id="tulis"></div>    
    </div>
</div>
<div class="nav">
    	<table border="0" width="100%">
        	<tr>
           	  <td><?php echo menu_navigasi(); ?></td>
   			  <td align="right">Login as <font color="#FF0000"><?php echo $_SESSION['username']; ?></font> || <a href="logout.php">Logout</a></td>
            </tr>
        </table>
</div>
<div>
    	<div> 
        <p>&nbsp;</p>
        <center>
        <font size="+2">
        <?php
			$tgl=$_POST['tglPL'];
			$kode=$_POST['kd_brg'];
			$nama=$_POST['nama_barang'];
			$lokasi=$_POST['lokasi'];
			$jml=$_POST['jml'];
			$cost=$_POST['cost'];
			$paid=$jml * $cost;
			$ket=$_POST['ket_pelihara'];
			echo koneksi_db();
			$cari_id="SELECT IFNULL(MAX(id_rawat),0)+1 NO FROM rawat";
			$hasil=mysql_query($cari_id);
			$rows=mysql_fetch_array($hasil);
			$id_baru=$rows['NO'];
			$sql="insert into rawat values($id_baru,'$tgl','$kode','$nama','$lokasi',$jml,$cost,$paid,'$ket')";
			$res=mysql_query($sql);
			if($res){
				$id=mysql_insert_id();
				?>
                <div> Data Pemeliharaan dengan kode barang <b><?php echo $kode; ?></b> telah berhasil disimpan.</b></div>
                <?php
			}
			else{
				?>
                <div>Terjadi kesalahan dalam penyimpanan data pemeliharaan baru. silahkan diulangi</div>
                <?php
			}
			?>
            </font>
          </center>
         <p>&nbsp;</p>
  </div>
</div>
<div class="footer"><?php echo footer(); ?></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>