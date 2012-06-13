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
<div>
    	<div> 
        <p>&nbsp;</p>
        <center>
        <div class="nav">
         	<font color="#FFFFFF" size="+1">
         	<?php
				echo koneksi_db();
				$kode=$_POST['kd_brg'];
				$nama=$_POST['nmBrg'];
				$tgl=$_POST['Tgl'];
				$id=$_POST['no'];
				$sql="DELETE FROM rawat WHERE kd_brg='$kode' AND id_rawat=$id";
				$res=mysql_query($sql);
				echo "Data Berhasil Di delete";				
			?>
         	</font>
         </div>
        </center>
  </div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>