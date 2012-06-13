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
        <h1>Penghapusan</h1>
        <form action="input_barang_hapus_proses.php" method="post">
        <table border="0" align="center">
        	<tr>
            	<td>No.SK</td>
                <td><?php 
					echo koneksi_db();
				   $result = mysql_query("select * from sk");        
				   echo '<select name="kd_SK" ';    
				   echo '<option>--------------------------------</option>';    
				   while ($row = mysql_fetch_array($result)) {    
				   		echo '<option value="' . $row['no_sk'] . '">' . $row['no_sk'] . '</option>';    
						}    
					echo '</select>';    
				?>
                    </td>
            </tr>
        	<tr>
            	<td>Kode Barang</td>
                <td><?php  
					
				   $result = mysql_query("select * from barang where status_brg='T'");    
				   $jsArray = "var Brg = new Array();\n";    
				   echo '<select name="kd_brg" onchange="changeValue(this.value)">';    
				   echo '<option>----------</option>';    
				   while ($row = mysql_fetch_array($result)) {    
				   		echo '<option value="' . $row['kode_brg'] . '">' . $row['kode_brg'] . '</option>';    
				   		$jsArray .= "Brg['" . $row['kode_brg'] . "'] = {name:'" . addslashes($row['nama_brg']) . "'};\n"; 
						}    
					echo '</select>';    
					?> 
                </td>
            </tr>
        	<tr>
            	<td>Nama Barang</td>
                <td><input type="text" name="nmHps" id="Hps_brg" size="30"/>
                <script type="text/javascript">    
					  <?php echo $jsArray; ?>  
					  function changeValue(id){  
					  document.getElementById('Hps_brg').value = Brg[id].name;  
					  };  
					</script>
                </td>
            </tr>
            <tr>
            	<td>Kondisi</td>
                <td>
                	<select name="kondisi">
                    	<option value="unidentified">----Pilih Salah Satu----</option>
                    	<option value="Bagus">Bagus</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                        <option value="_NA_">Kondisi Lain</option>
                    </select>
                </td>
          </tr>
          <tr>
          		<td>Alasan</td>
                <td>
                	<select name="alasan" >
                    	<option value="unidentified">-------------------Pilih Salah Satu---------------------</option>
                    	<option value="Pertimbangan Teknis">Pertimbangan Teknis</option>
                        <option value="Pertimbangan Ekonomi">Pertimbangan Ekonomis</option>
                        <option value="Kekurangan Perbendaharaan atau Kerugian">Kekurangan Perbendaharaan atau Kerugian</option>
                        <option value="_NA_">Alasan Lain</option>
                    </select>
                </td>
          </tr>
          <tr>
          	<td>Keterangan</td>
            <td><textarea rows="3" cols="50" name="ket_hps"></textarea></td>
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