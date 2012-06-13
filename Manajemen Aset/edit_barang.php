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
        
        <form action="edit_barang_proses.php" method="post">
        	<table border="0">
            	<tr class="nav">
                	<td>Masukan Kode Barang</td>
                    <td>  <?php  
							echo koneksi_db();
						   $result = mysql_query("select * from barang where status_brg='T'");    
						   $jsArray = "var Brg = new Array();\n";    
						   echo '<select name="kd_brg" onchange="changeValue(this.value)">';    
						   echo '<option>-------</option>';    
						   while ($row = mysql_fetch_array($result)) {    
								echo '<option value="' . $row['kode_brg'] . '">' . $row['kode_brg'] . '</option>';    
								$jsArray .= "Brg['" . $row['kode_brg'] . "'] = {name:'" . addslashes($row['nama_brg']) . "',desc:'".addslashes($row['merk'])."',size:'".addslashes($row['ukuran'])."',jumlah:'".addslashes($row['jumlah'])."',cost:'".addslashes($row['harga_satuan'])."',uraian:'".addslashes($row['keterangan_brg'])."'};\n";    
						   }    
						  echo '</select>';    
						  ?>  
                    </td>
                 </tr>
                 <tr>
                 	<td colspan="2"></td>
                 </tr>
                 <tr>
                 	<td>Nama Barang</td><td><input type="text" name="nmBrg"  id="nmBrg" /></td>
                 </tr>
                 <tr>
                 	<td>Merk</td><td><input type="text" name="merk" id="merk" /></td>
                 </tr>
                 <tr>
                 	<td>Ukuran</td><td><input type="text" name="Sz" id="Sz" /></td>
                 </tr>
                 <tr>
                 	<td>Jumlah</td><td><input type="text" name="Jml" id="Jml"  /></td>
                 </tr>
                 <tr>
                 	<td>Harga Satuan</td><td><input type="text" name="hrg" id="hrg" /></td>
                 </tr>
                 <tr>
                 	<td>Keterangan</td><td><input type="text" name="ket" id="ket"/></td>
                    <script type="text/javascript">    
					  <?php echo $jsArray; ?>  
					  function changeValue(id){  
					  document.getElementById('nmBrg').value = Brg[id].name;  
					  document.getElementById('merk').value = Brg[id].desc;  
					  document.getElementById('Sz').value = Brg[id].size;
					  document.getElementById('Jml').value = Brg[id].jumlah;
					  document.getElementById('hrg').value = Brg[id].cost;
					  document.getElementById('ket').value = Brg[id].uraian;
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