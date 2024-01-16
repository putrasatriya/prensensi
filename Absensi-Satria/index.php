<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
 
	<h1>LOGIN APLIKASI <br/>BAGIAN HUKUM SETDA KOTA YOGYAKARTA</h1>
	<img src="https://i0.pngocean.com/files/691/734/573/logo-lambang-daerah-istimewa-yogyakarta-cdr-pemerintah-kota-yogyakarta-others.jpg" width="12%" height="12%" style="display: block; margin: auto;">

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login.php" method="post" autocomplete="off">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
 
			<br/>
			<br/>
			<center>
				<a class="link" href="https://www.kerjonline.my.id">kembali</a>
			</center>
		</form>
		
	</div>
 
 
</body>
</html>