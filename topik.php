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
					<h2><center>TOPIK</center></h2>
				<?php 
if(isset($_SESSION['id_user'])){ ?> 
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped tablesorter">	
			  <tr>
				<td>No</td>
				<td colspan="2"><b>List Topik</b></td>
				<td>Dilihat</font></strong></td>
				<td>Dibalas</font></strong></td>
				<td>Update</font></strong></td>
				<?php
				
				$baselink=$_SERVER['PHP_SELF'];
				// jumlah data perhalaman 
				$rowsPerPage = 10; 
				//nilai halaman awal 
				$pageNum = 1; if(!empty($_GET['page'])) {     
				$pageNum = $_GET['page']; } 
				$offset = ($pageNum - 1) * $rowsPerPage; 
	
				/* =================================mulai */
				$id_kategori = $_GET['id_kategori'];
				/*---------lihat------------ */
				$lihat = mysql_query("UPDATE kategori SET lihat=lihat+1 WHERE id_kategori='$id_kategori'");
				/* ---------akhir lihat------ */
				$_SESSION['id_kategori'] = $id_kategori;
				$no=1;
				$sql2="SELECT * FROM post,users WHERE '$id_kategori' = id_kategori AND post.idu = users.idu ORDER BY id DESC LIMIT $offset, $rowsPerPage";
				$result2=mysql_query($sql2) or die('Error');


				while($rows2=mysql_fetch_array($result2)){

				/* =================================akhir */ ?>
				
				<tr>
				
				<td><?php echo"".$no.""?></td>
				<td><img src="css/images/topik.png"></td>
				<td> 
				<a href="posts.php?id=<?php echo $rows2['id'];?>"><?php echo "<b>".$rows2['judul']."</b>"; ?></a>
				<?php echo "<p margin='-200px 0 0 0';><font size='1em' color='#ff0000'><b>Oleh: ".$rows2['nama']."</b></font></p>"; ?>
				</td>
				<td><?php echo $rows2['lihat2']; ?></td>
				<?php 
				$id=$rows2['id'];
				$replay=mysql_query("SELECT * FROM balas WHERE '$id'=id");
				$jml=mysql_num_rows($replay); 
				?>
				<td><?php echo $jml; ?></td>
				<td><?php echo $rows2['date']; ?></td>
				</tr>
				<?php
				$no++;
				 $nomer = $rows2['id_kategori'];
				}?>
				<tr>
				<td colspan="6"><a href="buat-topik.php" class="button add" style="float : right;">Add New Topic</a></td>
				</tr>
	</tr>
</table>
</div>
<?php 

//menghitung jumlah data, silahkan disesuaikan nama field dalam COUNT     
$query   = "SELECT COUNT(*) AS numrows FROM post,users WHERE '$id_kategori' = id_kategori AND post.idu = users.idu ORDER BY id DESC";    
 $result  = mysql_query($query) or die('Error, query failed. ' . mysql_error());     
 $row     = mysql_fetch_array($result, MYSQL_ASSOC);     
 $numrows = $row['numrows'];    
 $maxPage  = ceil($numrows/$rowsPerPage);     
 $nextLink = '&nbsp;';    
 if($maxPage >1)     {         
 $nextLink = array();        
 for($page = 1; $page <= $maxPage; $page++) 
 {             
 $nextLink[] =  "<a href=\"".$baselink."?id_kategori=$nomer&page=$page\">$page</a>";        
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
<?php 
}else{ ?>
<script language="JavaScript"> document.location='login.php'</script><?php
}					
?>