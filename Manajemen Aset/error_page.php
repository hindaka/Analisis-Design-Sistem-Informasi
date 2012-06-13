<?php
		// Inialize session
		session_start();
						
		// Include database connection settings
		include('procedure.php'); ?>
		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Pengelolaan Aset</title>
<link rel="shortcut icon" href="image/favicon.ico" />
<link href="style/Level3_3.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="header">
	<div id="logo">
    	<div id="tulis"></div>
    </div>
</div>
<div class="nav"></div>
<div>
    	<div> 
        <p>&nbsp;</p>
        <table border="0" align="center">
        	<tr>
            	<td>
                	<?php
						echo koneksi_db();
						// mencari username dan password berdasarkan inputan user
						$username = mysql_real_escape_string($_POST['username']);
						$password = mysql_real_escape_string(MD5($_POST['password']));
						$login = mysql_query("SELECT * FROM user WHERE (username = '$username') and (password = '$password')");
						
						// cek username dan password
						if (mysql_num_rows($login) == 1) {
							
							// Set username session variable
							session_register('username');
							
							// Jump to secured page
							header('Location: securedpage.php');
						}
						else {
							//penanganan error
							$error ="";
							if(empty($username) and empty($_POST['password'])){
								$error ="<b>Username</b> dan <b>Password</b> kosong";
							}else if(empty($username)){
								$error ="<b>Username</b> kosong";
							}else if(empty($_POST['password'])){
								$error ="<b>Password</b> kosong";
							}else{
								$error ="<b>Username</b> dan <b>Password</b> tidak sesuai";
							}
							echo "<h3>Login Gagal  </h3>
							<p>$error.<br>
							<a href=index.php >Coba Lagi</a></p>";
							
							
						}
						
						?>
                </td>
            </tr>
        </table>
     <p>&nbsp;</p>
  </div>
</div>
<div class="footer"></div>


</body>
</html>