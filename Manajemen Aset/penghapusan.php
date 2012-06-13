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
<script src="calendar/date_picker.js" type="text/javascript"></script>
<link href="calendar/date.css" rel="stylesheet" type="text/css" />
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
        <h1>Surat Keputusan</h1>
        <form action="penghapusan_step1.php" method="post">
        <table border="0" align="center">
        	<tr>
            	<td>No.SK</td>
                <td><input type="text" name="no_sk" size="30" value="NO/SK.HPS/KDH/TAHUN" /></td>
            </tr>
            <tr>
            	<td>Tanggal SK</td>
                <td><input type="text" name="tglSK"  /><input type=button value="Lihat Kalender" onclick="displayDatePicker('tglSK');"></td>
          </tr>
          <tr>
          	<td>Keterangan</td>
            <td><textarea rows="3" cols="50" name="ket_sk"></textarea></td>
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