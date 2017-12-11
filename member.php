<?php 
/* --------------------- */ 
session_start(); 
include "connect.php"; 
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	<title>Forum Diskusi FODIMTI</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Jura:400,500,600,300' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
	
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
							<li><a href="logout.php">Ebook</a></li>
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
					&nbsp;
<font color="#000" size="5px" ><center><b>MEMBER FORUM DISKUSI FODIMTI</b></center></font>
&nbsp;
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped tablesorter">	
<tr>
			<tr>
				<td align="center"><b>Avatar</b></font></td>
				<td align="center">Nama</td>
				<td align="center">email</td>
				<td align="center">Jabatan</td>
				<td align="center">Bergabung</td>
				<td align="center">Website</td>
			</tr>
			<tr>
<?php
				$baselink=$_SERVER['PHP_SELF'];
				// jumlah data perhalaman 
				$rowsPerPage = 50; 
				//nilai halaman awal 
				$pageNum = 1; if(!empty($_GET['page'])) {     
				$pageNum = $_GET['page']; } 
				$offset = ($pageNum - 1) * $rowsPerPage; 
				
			    $sql=mysql_query("SELECT * FROM users LIMIT $offset, $rowsPerPage");
				while($list = mysql_fetch_array($sql)){
				$avatar=$list['avatar'];
				$web = $list['web']; ?>
				<tr>
				<td><div style="text-align : center;"/><img src="<?php echo $avatar; ?>" width="70px" height="70px" style="border-radius : 5px;"></td>
				<td ><?php echo $list['nama']; ?></td>
				<td ><?php echo $list['email']; ?></td>
				<td ><?php echo $list['jabat']; ?></td>
				<td ><?php echo $list['tanggal']; ?></td>
				<td ><strong><font color="#000"><a href="<?php echo $web; ?>"><?php echo $list['web']; ?></td>
				</tr>
				
			</tr>
</tr>
<?php }
?>
</table>
&nbsp;
</div>
<?php 

//menghitung jumlah data, silahkan disesuaikan nama field dalam COUNT     
$query   = "SELECT COUNT(*) AS numrows FROM users";    
 $result  = mysql_query($query) or die('Error, query failed. ' . mysql_error());     
 $row     = mysql_fetch_array($result, MYSQL_ASSOC);     
 $numrows = $row['numrows'];    
 $maxPage  = ceil($numrows/$rowsPerPage);     
 $nextLink = '&nbsp;';    
 if($maxPage >1)     {         
 $nextLink = array();        
 for($page = 1; $page <= $maxPage; $page++) 
 {             
$nextLink[] =  "<a href=\"".$baselink."?page=$page\">$page</a>";    
 }        
 $nextLink = "<p>Halaman : </p>" . implode(' ', $nextLink); 
 }     
 echo '<div id="navpage">'.$nextLink.'</div>';    
 mysql_free_result($result);
 ?> 
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