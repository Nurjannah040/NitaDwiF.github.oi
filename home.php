<?php 
/* --------------------- */ 
session_start(); 
include "connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	<title>Forum Diskusi FODIMTI</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Jura:400,500,600,300' rel='stylesheet' type='text/css' />

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
					<h1 id="logo"><a href="#">Digy</a></h1>
			
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
				<div class="slider">
					<div id="bg"></div>
					<div id="carousel">
						<div>
							<h5>Selamat Datang Di Forum Diskusi</h5>
							<h3>FODIMTI</h3>
							<p>Media Diskusi dan Knowledge Sharing FODIMTI</p>
							
						</div>
						
						<div>
							<h5>Forum Diskusi</h5>
							<h3>FODIMTI</h3>
							<p>Media Diskusi dan Knowledge Sharing FODIMTI</p>
							
						</div>
						
					</div>

					<a id="prev" href="#"></a>
					<a id="next" href="#"></a>
				</div>

			</div>
		</header>
		<!-- end of header -->
		<!-- shell -->
		<div class="shell">
			<!-- main -->
			<div class="main">
				<!-- cols -->
				<section class="cols">
<?php
					if(!isset($_SESSION['id_user'])){
					?>
					<div class="col">
						<img src="css/images/col-img1.png" alt="" />
						<div class="col-cnt">
							<h2>DAFTAR</h2>
							<p>Daftar ke forum diskusi FODIMTI</p>
							<a href="daftar.php" class="more">Daftar</a>
						</div>
					</div>
					<div class="col">
						<img src="css/images/col-img2.png" alt="" />
						<div class="col-cnt">
							<h2>LOGIN</h2>
							<p>Setelah Daftar Login</p>
							<a href="login.php" class="more">Login</a>
						</div>
					</div>
					<div class="col">
						<img src="css/images/col-img3.png" alt="" />
						<div class="col-cnt">
							<h2>Happy Discussion</h2>
							<p>Selamat Berdiskusi , Semoga bermanfaat :)</p>
							<a href="category.php" class="more">category</a>
						</div>
					</div>
					<div class="cl">&nbsp;</div>
<?php }else{ ?>
<div class="col">
						<img src="css/images/kategori.png" width="70px" height="70px" style="border-radius : 5px;" />
						<div class="col-cnt">
							<h2>Pilih Kategori</h2>
							<p>Pilih Kategori diskusi</p>
							<a href="category.php" class="more">Kategori</a>
						</div>
					</div>
					<div class="col">
					<?php 
				$kenal = $_SESSION['id_user'];
				$sql="SELECT * FROM users WHERE '$kenal' = idu";
				$sql=mysql_query($sql);
				while($rows=mysql_fetch_array($sql)){ 
				$avatar=$rows['avatar'];
				?>
						<img src="<?php echo $avatar; ?>" width="70px" height="70px" style="border-radius : 5px;">
						<?php }
?>
						<div class="col-cnt">
							<h2>Profile</h2>
							<p>Edit Profile Anda</p>
							<a href="profil.php" class="more">Profile</a>
						</div>
					</div>
					<div class="col">
						<img src="css/images/member.png" width="70px" height="70px" style="border-radius : 5px;"/>
						<div class="col-cnt">
							<h2>Member</h2>
							<p>Lihat Siapa saja yang tergabung dalam Forum ini </p>
							<a href="member.php" class="more">Member</a>
						</div>
					</div>
					<div class="cl">&nbsp;</div>
<?php } ?>
				</section>
				<!-- end of cols -->
				<section class="post">
					<img src="css/images/logo.png" style="border-radius : 5px; box-shadow:0px 0px 20px black;"/>
					<div class="post-cnt">
						<h2 style="margin-top : -3%;">Sekilas tentang FODIMTI</h2>
						<p align="justify"> 
						Perkembangan teknologi memudahkan dalam berkomunikasi sehingga sering ditemukan Forum yang bertujuan sebagai Media berbagai ilmu dan pengetahuan di dalam berbagai bidang Ilmu,seperti Aplikasi yang akan dibangun ini FODIMTI merupakan Aplikasi komunikasi dimana dikhususkan untuk setiap mahasiswa Teknik Informatika dapat berkomunikasi dan berdiskusi untuk memecahkan suatu permasalahan.
Aplikasi ini dirancang untuk mempermudah Mahasiswa teknik Informatika untuk berinteraksi.
Dengan adanya pembuatan aplikasi FODIMTI ini diharapkan mempermudah penggunaanya. Banyak dari mahasiswa melupakan materi-materi kuliah yang telah diajarkan, baik itu secara disengaja ataupun tidak. Meskipun mahasiswa tersebut mendapatkan nilai sempurna dalam mata kuliah, belum tentu di kemudian hari ia masih mengingat materi yang telah diajarkan atau yang telah dipelajari.
</p>
					</div>
					<div class="cl">&nbsp;</div>
				</section>

				<section class="content">
					<h2>SEKILAS TENTANG FORUM DISKUSI FODIMTI</h2>
					<p>Forum Diskusi FODIMTI adalah sebuah media / wadah untuk berdiskusi seputar Pembelajaran TI, Forum diskusi ini diharapkan dapat membantu anda untuk berdiskusi ataupun mencari informasi yang tentunya bermanfaat pagi anda.<br> Selamat Bergabung ! :) </p>
				</section>
<section class="partners">
					
					<div id="partners-slider">
						<div class="slider-holder2">
						    <img src="css/images/g1.png" width="236" height="52" />
						    <img src="css/images/g2.png" width="236" height="52" />
						    <img src="css/images/g3.png" width="236" height="52" />
						    <img src="css/images/g4.png" width="236" height="52" />
						    <img src="css/images/g1.png" width="236" height="52" />
						    <img src="css/images/g2.png" width="236" height="52" />
						    <img src="css/images/g3.png" width="236" height="52" />
						    <img src="css/images/g4.png" width="236" height="52" />
						</div>
					</div>
					<div class="slider-arr">
						<a class="prev-arr arr-btn" href="#"></a>
						<a class="next-arr arr-btn" href="#"></a>
					</div>
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
					<div class="col" style="float : right;">
						<h2>CONTACT us</h2>

						<p>Email: <a href="#">nitadwifitriani.12ra@gmail.com</a></p>
						<p>Phone: 08783456767</p>
						<p>Address: Padalarang,</p>
						<p>Bandung Barat, INDONESIA</p>
					</div>
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
					<p class="copy">Copyright &copy; 2012 FODIMTI<span>|</span>Design by: <a href="http://chocotemplates.com" target="_blank">www.ChocoTemplates.com</a></p>
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