<?php
function koneksi_db(){
	$hostname = 'localhost';        /* isi dengan nama host */
	$dbname   = 'aset_db'; 			/* nama database yang digunakan */
	$username = 'root';             /* username DB */
	$password = '';                 /* password DB, jika tidak ada maka biarkan kosong '' */
	
	/* koneksi ke Mysql>>DB */
	$link=mysql_connect($hostname, $username, $password);
	
	/* pemilihan DB */
	mysql_select_db($dbname,$link);
	
	if(!$link)
		echo "error : ".mysql_error();
	return $link;

?>