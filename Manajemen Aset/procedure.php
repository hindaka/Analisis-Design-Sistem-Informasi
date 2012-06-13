<?php

	function menu_navigasi(){
		?>
          <ul id="MenuBar1" class="MenuBarHorizontal">
          <li><a class="MenuBarItemSubmenu" href="#">Pengadaan</a>
            <ul>
              <li><a href="input_barang.php">Input data Barang</a></li>
              <li><a href="input_ruang.php">Input data Ruangan</a></li>
            </ul>
          </li>
          <li><a href="pemeliharaan.php">Pemeliharaan</a></li>
          <li><a class="MenuBarItemSubmenu" href="#">Penghapusan</a>
          		<ul>
                	<li><a  class="MenuBarItemSubMenu" href="penghapusan.php">Surat Keputusan</a>
                    	<ul>
                        	<li><a href="input_barang_hapus.php">Data Hapus</a></li>
                        </ul>
                    </li>
                </ul>
          </li>
          <li><a class="MenuBarItemSubmenu" href="#">lihat Data</a>
          	<ul>
            	<li><a href="lihat_ruang.php">Data Ruangan</a></li>
                <li><a href="lihat_data_barang.php">Data Barang</a></li>
                <li><a href="lihat_data_pemeliharaan_barang.php">Data Pemeliharaan</a></li>
                <li><a href="lihat_pembukuan.php">Data Penghapusan</a></li>
            </ul>
          </li>
        </ul>
<?php
	}
	
	
	function footer(){
	?>
    	<center>hak cipta@2012 by hindaka</center>
     <?php
	}
	
	function koneksi_db(){
		
	$hostname = 'localhost';        /* isi dengan nama host */
	$dbname   = 'aset_db'; 			/* nama database yang digunakan */
	$username = 'root';             /* username DB */
	$password = '';                 /* password DB, jika tidak ada maka biarkan kosong '' */
	
	/* koneksi ke Mysql>>DB */
	mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
	
	/* pemilihan DB */
	mysql_select_db($dbname) or DIE('Database name is not available!');
}

?>



