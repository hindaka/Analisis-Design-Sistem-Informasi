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
        <font size="+2">
        
        <form action="edit_ruang_proses.php" method="post">
        	<table border="0">
            	<tr class="nav">
                	<td>Masukan Kode Barang</td>
                    <td>  <?php  
							echo koneksi_db();
						   $result = mysql_query("select * from ruangan");    
						   $jsArray = "var Rg = new Array();\n";    
						   echo '<select name="kd_Rg" onchange="changeValue(this.value)">';    
						   echo '<option>-------</option>';    
						   while ($row = mysql_fetch_array($result)) {    
								echo '<option value="' . $row['kd_ruang'] . '">' . $row['kd_ruang'] . '</option>';    
								$jsArray .= "Rg['" . $row['kd_ruang'] . "'] = {name:'" . addslashes($row['nm_ruang']) . "',uraian:'".addslashes($row['keterangan_rg'])."'};\n";    
						   }    
						  echo '</select>';    
						  ?>  
                    </td>
                 </tr>
                 <tr>
                 	<td colspan="2"></td>
                 </tr>
                 <tr>
                 	<td>Nama Ruangan</td><td><input type="text" name="nmRg"  id="nmRg" /></td>
                 </tr>
                 <tr>
                 	<td>Keterangan</td><td><input type="text" name="ket" id="ket"/></td>
                    <script type="text/javascript">    
					  <?php echo $jsArray; ?>  
					  function changeValue(id){  
					  document.getElementById('nmRg').value = Rg[id].name;  
					  document.getElementById('ket').value = Rg[id].uraian;
					  };  
					</script>
                 </tr>
                 <tr>
                    <td colspan="2"><input type="submit" name="submit" value="update" /></td>
                </tr>
                </table>	
         <p>&nbsp;</p>
         </form>
        </center>
  </div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>