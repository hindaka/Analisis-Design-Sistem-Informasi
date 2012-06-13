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
        <h1>Input Data Barang</h1>
        
        <form action="input_barang_proses.php" method="post">
        <table border="0" align="center">
        	<tr>
            	<td>Kode Ruangan</td>
                <td> <?php  
					echo koneksi_db();
				   $result = mysql_query("select * from ruangan");    
				   $jsArray = "var Rg = new Array();\n";    
				   echo '<select name="kd_ruang" onchange="changeValue(this.value)">';    
				   echo '<option>-------</option>';    
				   while ($row = mysql_fetch_array($result)) {    
				   		echo '<option value="' . $row['kd_ruang'] . '">' . $row['kd_ruang'] . '</option>';    
				   		$jsArray .= "Rg['" . $row['kd_ruang'] . "'] = {name:'" . addslashes($row['nm_ruang']) . "'};\n"; 
						}    
					echo '</select>';    
					?> 
                    <input type="text" name="nama_ruang" id="nmRg" size="30"/>
                    <script type="text/javascript">    
					  <?php echo $jsArray; ?>  
					  function changeValue(id){  
					  document.getElementById('nmRg').value = Rg[id].name;  
					  };  
					</script> 
                </td>
            </tr>
			<tr>
            	<td>Kode Barang</td>
                <td><input type="text" name="kode_barang" size="10" /></td>
            </tr>        
        	<tr>
            	<td>Nama Barang</td>
                <td><input type="text" name="nama_barang" size="30" /></td>
            </tr>
            <tr>
            	<td>Merk</td>
                <td><input type="text" name="merk" size="30" /></td>
          </tr>
          <tr>
          	<td>Ukuran</td>
            <td><input type="text" name="ukuran" size="15" /></td>
          </tr>
          <tr>
          	<td>jumlah</td>
            <td><input type="text" name="jml" size="5" /> Unit</td>
          </tr>
          <tr>
          	<td>Harga Satuan</td>
            <td><input type="text" name="cost"  /></td>
          </tr>
          <tr>
          	<td>Keterangan</td>
            <td><textarea name="ket_brg" rows="3" cols="40"></textarea></td>
          </tr>
          <tr align="right">
                <td colspan="2"><input type="submit" value="Simpan" /> &nbsp;<input type="reset" value="Reset" /></td>
          </tr>
        </table>
        </form>
     <p>&nbsp;</p>
  </div>
</div>
<div class="footer"><?php echo footer(); ?></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>