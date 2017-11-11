<?php 
/* --------------------- */ 
session_start(); 
include "connect.php"; 
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	<title>FODIMTI</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Jura:400,500,600,300' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
	
	<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.touchwipe.1.1.1.js" type="text/javascript"></script>
	<script src="js/jquery.carouFredSel-5.5.0-packed.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/functions.js" type="text/javascript"></script>
</head>
<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!-- header -->
		<header class="header">
			<div class="shell">
				<div class="header-top">
					
					<nav id="navigation">
					<?php
					if(!isset($_SESSION['id_user'])){
					?>
						<a href="#" class="nav-btn">Home<span></span></a>
						<ul>
							<li class="active home"><a href="home.php">Home</a></li>
							<li><a href="category.php">CategoryForum</a></li>
							<li><a href="about.php">Abouts</a></li>
							<li><a href="member.php">Member</a></li>
							<li><a href="login.php">Login</a></li>
						</ul>
						<?php }else{ ?>
						<a href="#" class="nav-btn">Home<span></span></a>
						<ul>
							<li class="active home"><a href="home.php">Home</a></li>
							<li><a href="category.php">CategoryForum</a></li>
							<li><a href="profil.php">Profile</a></li>
							<li><a href="member.php">Member</a></li>
							<?php if($_SESSION['jabat'] == "admin"){ echo "<li><a href='control/index.php'>Dashboard Admin</a></li>";} ?>
							<li><a href="logout.php">Logout</a></li>
						</ul>
						<?php } ?>
					</nav>
					<div class="cl">&nbsp;</div>
				</div>
			</div>
		</header>
		<!-- end of header -->
		<!-- shell -->
		<div class="shell">
			<!-- main -->
			<div class="main">
				<section class="content">
					<h2>DAFTAR USER BARU FORUM DISKUSI FODIMTI</h2>
					<p>Silahkan input data sesuai dengan data diri anda, dilarang memalsukan identitas diri ! nama dilarang mengandung unsur sara!</p>
				<body>
<script>
    function validasi(){
        var namaValid    = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
        var emailValid   = /^.+@.+\..+$/;
        var nama         = daftar.nama.value;
		var password     = daftar.password.value;
        var email        = daftar.email.value;
        var pesan = '';
        
        if (nama == '') {
            pesan = '-Nama tidak boleh kosong\n';
        }
        
        if (nama != '' && !nama.match(namaValid)) {
            pesan += '-Nama tidak valid\n Nama tidak boleh mengandung karakter spesial / nomor!\n';
        }
		
		if (password == '') {
            pesan = '-Password tidak boleh kosong\n';
        }
		
        if (email == '') {
            pesan += '-Email tidak boleh kosong\n';
        }
        
        if (email !=''  && !email.match(emailValid)) {
            pesan += '-Alamat email tidak valid\n Contoh E-MAIL Valid : FODIMTI@gmail.com';
        }
		
        if (pesan != '') {
            alert('Maaf, ada kesalahan pengisian Data : \n'+pesan);
            return false;
        }
    return true
    }
</script>
<form name="daftar" action="kirim.php" method="post" onSubmit="return validasi()">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped tablesorter">
<tr>
<td colspan="2"><h2>FORM PENDAFTARAN</h2></td>
</tr>
<tr>
<td>        Nama Lengkap : </td>
<td>        <input type="text" name="nama" placeholder="Nama ... " STYLE="BORDER : 0; WIDTH :100%; HEIGHT : 100%;"/></td>
</tr>
<tr>    
<td>        Email Anda : </td>
<td>        <input type="text" name="email" placeholder="Email ..." STYLE="BORDER : 0; WIDTH :100%; HEIGHT : 100%;"/></td>
</tr>  
<tr>    
<td>        Password : </td>
<td>        <input type="password" name="password" placeholder="Password ..." STYLE="BORDER : 0; WIDTH :100%; HEIGHT : 100%;"/></td>
</tr> 
<tr>    
<td>        Nomer Handphone Anda : </td>
<td>        <input type="text" name="nope" placeholder="Nomer HP ..." STYLE="BORDER : 0; WIDTH :100%; HEIGHT : 100%;"/></td>
</tr>
<tr>    
<td>        Website Anda : </td>
<td>        <input type="text" name="web" placeholder="http://" STYLE="BORDER : 0; WIDTH :100%; HEIGHT : 100%;"/></td>
</tr>
<tr>
<td colspan="2">
<CENTER>
        <input type="submit" value="Simpan Data" name="submit" class="button"/>
        <input type="reset" value="Reset Form" name="reset" class="button"/>
		</CENTER>
		</td>
</tr>			
</table>
</div>
</form>
				</section>

				<div class="socials">
					<p>Temui Kami di :</p>

					<ul>
						<li><a href="" class="facebook-ico">facebook-ico</a></li>
						<li><a href="" class="twitter-ico">twitter-ico</a></li>
					</ul>
				</div>
			</div>
			<!-- end of main -->
		</div>
		<!-- end of shell -->	
		<!-- footer -->
		<div id="footer">
			<!-- shell -->
			<div class="shell">
				<!-- footer-cols -->
				<div class="footer-cols">
					<div class="col"style="float : right;">
						<h2>CONTACT us</h2>

						<p>Email: <a href="#">nitadwifitriani.12ra@gmail.com</a></p>
						<p>Phone: 08783456767</p>
						<p>Address: Padalarang,</p>
						<p>Bandung Barat, INDONESIA</p>	</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- end of footer-cols -->
				<div class="footer-bottom">
					<div class="footer-nav">
						<ul>
							<?php
					if(!isset($_SESSION['id_user'])){
					?>
							<li class="active home"><a href="home.php">Home</a></li>
							<li><a href="category.php">CategoryForum</a></li>
							<li><a href="about.php">Abouts</a></li>
							<li><a href="member.php">Member</a></li>
							<li><a href="login.php">Login</a></li>
						<?php }else{ ?>
							<li class="active home"><a href="home.php">Home</a></li>
							<li><a href="category.php">CategoryForum</a></li>
							<li><a href="profil.php">Profile</a></li>
							<li><a href="member.php">Member</a></li>
							<?php if($_SESSION['jabat'] == "admin"){ echo "<li><a href='control/index.php'>Dashboard Admin</a></li>";} ?>
							<li><a href="logout.php">Logout</a></li>
						<?php } ?>
						</ul>
					</div>
					<p class="copy">Copyright &copy; 2017 FODIMTI<span>|</span>Design by: <a href="http://chocotemplates.com" target="_blank">www.ChocoTemplates.com</a></p>
					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- end of shell -->
		</div>
		<!-- footer -->
	</div>
	<!-- end of wrapper -->
</body>
</html>