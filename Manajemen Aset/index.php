<?php //halaman login

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
header('Location: securedpage.php');
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
            	<td width="150" height="162"><img src="image/main.png" width="150" height="150" alt="login" /></td>
                <td width="394">
                <form method="post" action="error_page.php">
                	<table align="center" border="0">
                    	<tr>
                        	<td colspan="2" align="center"> silahkan login terlebih dahulu </td>
                        </tr>
                    	<tr>
                        	<td>username</td>
                            <td><input type="text" name="username"  maxlength="20" size="25"/></td>
                        </tr>
                        <tr>
                        	<td>password</td>
                            <td><input type="password" name="password" maxlength="20" size="25"/></td>
                        </tr>
                        <tr>
                        	<td colspan="2" align="right"><input type="submit" value="Login" /></td>
                        </tr>
             		</table>
                </form>
                </td>
            </tr>
        </table>
     <p>&nbsp;</p>
  </div>
</div>
<div class="footer"><?php echo footer(); ?></div>


</body>
</html>