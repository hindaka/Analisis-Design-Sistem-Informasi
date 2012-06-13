<?php

// Inialize session
session_start();

// Include database connection settings
include('lib_func.php');

// mencari username dan password berdasarkan inputan user
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string(MD5($_POST['password']));
$login = mysql_query("SELECT * FROM user WHERE (username = '$username') and (password = '$password')");

// cek username dan password
if (mysql_num_rows($login) == 1) {
	
	// Set username session variable
	session_register('username','password');
	
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
	echo "<h3>Login Gagal dikarenakan </h3>
	<p>$error.<br>
	<a href=index.php >Coba Lagi</a></p>";
	
	
}

?>