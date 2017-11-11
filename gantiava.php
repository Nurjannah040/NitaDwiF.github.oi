<?php 
/* --------------------- */ 
session_start(); 
include "connect.php"; 
?>
<?php if(isset($_SESSION['id_user'])){ ?>
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
					<h2>GANTI AVATAR</h2>
Silahkan pilih avatar yang anda inginkan :)<br> Note : dilarang mengandung unsur pornografi,sara dan unsur kekerasan, avatar yang melanggar akan di ganti oleh admin .
<form method="post" action="gantiavakirim.php" enctype="multipart/form-data">
<?php 
	include "connect.php";
	$kenal = $_SESSION['id_user'];
	$sql="SELECT * FROM users where idu=$kenal";
	$result=mysql_query($sql);
	$rows=mysql_fetch_array($result);
?>
				&nbsp;
				&nbsp;
<?php /* ----------------------------------------awal awak----------------------------------- */ ?>
<center>
<table>
<tr>
	<td></td>
	<td><input type="file" name="avatar" id="avatar" size="50" value="<?php echo $rows['avatar']; ?>" /></td>
</tr>
<tr>
	<td></td>
	<td><br><br>
		<input type="submit" name="submit" class="button" id="submit_btn" value=" ganti "/>
		<input type="reset" name="reset" class="button" id="submit_btn" value="reset" />
	</td>
</tr>
</table>
</center>
<?php /*----------------------------------------akhir awak----------------------------------- */ ?>
</form><br><br>
<center><button class="button"><a onClick="self.history.back()"><b>Kembali</b></a></button></center>
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
<?php 
}else{ ?>
<script language="JavaScript"> document.location='login.php'</script><?php
}					
?>
