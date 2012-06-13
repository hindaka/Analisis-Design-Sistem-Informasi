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
        <h1 align="center">Data Penghapusan Barang</h1>
         <?php 
			echo koneksi_db();
			$sql="select * from pembukuan order by id_pembukuan";
			$res=mysql_query($sql);
			$banyakrecord=mysql_num_rows($res);
			if($banyakrecord>0){
		?>
        <table border="1" bordercolor="#0000CC" align="center">
        	<tr bgcolor="#CCCC00">
            	<td>No</td>
                <td>No SK</td>
            	<td>Kode Barang</td>
                <td>Kondisi</td>
				<td>Alasan</td>
                <td>Keterangan</td>                       
            </tr>
            <?php 
			 $i=0;
			 while($data=mysql_fetch_array($res)){
				 $i++;
			 ?>
            <tr align="center">
            	<td><?php echo $i; ?></td>
				<td><?php echo $data['no_sk']; ?></td>
            	<td><?php echo $data['kd_brg']; ?></td>
                <td><?php echo $data['kondisi']; ?></td>
                <td><?php echo $data['alasan']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
            </tr>
            <?php
		 } 
		 ?>
        </table>
        <?php
			}
			?>
     <p>&nbsp;</p>
  </div>
</div>
<div class="footer"><?php echo footer(); ?></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>