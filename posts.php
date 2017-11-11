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
	<link rel="stylesheet" href="css/bootstrappost.css" type="text/css"/>
	
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
									<h2><center>POSTING</center></h2>
				<?php
if(isset($_SESSION['id_user'])){ ?>
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped tablesorter">	
	<tr>
			 <tr>
				<th colspan="2" style="color : #fff;">Post</th>
				<?php
				/* =================================mulai */
				$id = $_GET['id'];
				$_SESSION['id'] = $id;
				/* ---------lihat------------ */
				$lihat = mysql_query("UPDATE post SET lihat2=lihat2+1 WHERE id='$id'");
				/* ---------akhir lihat------ */
				$sql2="SELECT * FROM post,users where '$id'=id && post.idu = users.idu";
				$result2=mysql_query($sql2);
				$rows2=mysql_fetch_array($result2);
				/* =================================akhir */ ?>
				<tr>
				<td><center><img src="<?php echo $rows2['avatar']; ?>" width="80px" height="80px" style="border-radius : 5px;"><center><br>
				<?php $mail= $rows2['email']; ?>
					<?php echo "".$rows2['nama']."<br><a href='mailto:$mail'/>".$rows2['email']."</a><hr>"; ?>
					<?php $link = $rows2['web']; ?>
					<?php echo "Website: <a href='$link' target='blank'>".$rows2['web'];"</a>" ?>
				</td>

				<td> 
<?php /* =================Mulai Posting======================== */
				/* ------------sirah posting------------ */ ?>
				<?php
				if($_SESSION['id_user'] == $rows2['idu'] || $_SESSION['jabat'] == "admin"){
				?><br><div style="float:right; "><a href="<?php echo "edit-post.php?post=".$rows2['id']; ?>"><img src="css/images/edit.png" width="20px" height="20px" title="Edit Topik ini"/></a><span style="margin-left:10px;"><a href="<?php echo "hapus-post.php?post=".$rows2['id']; ?>" onclick='return confirm("Anda yakin akan menghapus data tersebut ?")'><img src="css/images/delete.png" width="20px" height="20px" title="Hapus Topik ini"/></a></div><?php
				}
				/* ------------sirah posting------------ */
				 echo "<div style='text-align : center;'><p><b><font color='#ff0000' size='4px'>".$rows2['judul']."</font></b></p></div><Hr>"; ?>
				
				<?php echo "<font color=#000000>".$rows2['posting']."</font>"; 
/* =================akhir Posting======================== */ ?>	
				<a href="balas-post.php" class="button add" style="float : right;">Add Quote</a>	
				</td>
				</tr>
				<tr>
				<th Colspan="2" style="color : #fff;">Replies :</th>
				</tr>
				<?php 
				$baselink=$_SERVER['PHP_SELF'];
				// jumlah data perhalaman 
				$rowsPerPage = 15; 
				//nilai halaman awal 
				$pageNum = 1; if(!empty($_GET['page'])) {     
				$pageNum = $_GET['page']; } 
				$offset = ($pageNum - 1) * $rowsPerPage; 
	
				$id = $_GET['id'];
				$sql3="SELECT * FROM users,balas where '$id'= id && balas.idu = users.idu order by id_balas ASC LIMIT $offset, $rowsPerPage";
				$result3=mysql_query($sql3);
				while($rows3=mysql_fetch_array($result3)){ ?>
				<tr>
				<td><center><img src="<?php echo $rows3['avatar']; ?>" width="80px" height="80px" style="border-radius : 5px;"></center><BR>
				<?php $mail= $rows3['email']; ?>
				<b><?php echo "".$rows3['nama']."</font> <a href='mailto:$mail'/>".$rows3['email']."</a><hr>"; ?>
					<?php $link = $rows3['web']; ?>
					<?php echo "Website: <a href='$link' target='blank'>".$rows3['web'];"</a>" ?>
				</td>
				<td> 
<?php /* =================Mulai Posting======================== */
				/* ------------sirah posting------------ */ ?>
				<?php
				/* ------------sirah posting------------ */
				 if($_SESSION['id_user'] == $rows3['idu'] || $_SESSION['jabat'] == "admin"){
				?><br><div style="float:right;"><a href="<?php echo "edit-balas.php?balas=".$rows3['id_balas']; ?>"><img src="css/images/edit.png" width="20px" height="20px" title="Edit Balasan ini"/></a><span style="margin-left:10px;"><a href="<?php echo "hapus-balas.php?balas=".$rows3['id_balas']; ?>" onclick='return confirm("Anda yakin akan menghapus data tersebut ?")'><img src="css/images/delete.png" width="20px" height="20px" title="Hapus Balasan ini"/></a></div><?php
				}
				echo "<font color=#000000>".$rows3['komentar']."</font>"; ?>
				&nbsp;<?php
/* =================akhir Posting======================== */ ?>				
				</td>
				</tr>
				<tr>
				<th colspan="2"></th>
				</tr>
				<?php } ?>
	</tr>
</table>
<?php 

//menghitung jumlah data, silahkan disesuaikan nama field dalam COUNT     
$query   = "SELECT COUNT(*) AS numrows FROM users,balas where '$id'= id && balas.idu = users.idu order by id_balas ASC";    
 $result  = mysql_query($query) or die('Error, query failed. ' . mysql_error());     
 $row     = mysql_fetch_array($result, MYSQL_ASSOC);     
 $numrows = $row['numrows'];    
 $maxPage  = ceil($numrows/$rowsPerPage);     
 $nextLink = '&nbsp;';    
 if($maxPage >1)     {         
 $nextLink = array();        
 for($page = 1; $page <= $maxPage; $page++) 
 {             
 $nextLink[] =  "<a href=\"".$baselink."?id=$id&page=$page\">$page</a>";        
 }        
 $nextLink = "<p>Halaman : </p>" . implode(' ', $nextLink); 
 }     
 echo '<div id="navpage">'.$nextLink.'</div>';    
 mysql_free_result($result);
 ?> 
<a href="balas-post.php" class="button add" style="float : right;">Add Quote</a>
</div>
<br><br>
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