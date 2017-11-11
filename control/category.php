<?php 
session_start(); 
include "../connect.php"; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Category - Admin FODIMTI</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	<?php
if(isset($_SESSION['id_user'])){ 
	if($_SESSION['jabat'] == "admin"){

	$tipe = "Pilihan Kategori Forum";
	$_SESSION['type']= $tipe;
?>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../home.php">FODIMTI</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="charts.php"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
			<li class="active"><a href="category.php"><i class="fa fa-wrench"></i> Category</a></li>
            <li><a href="member.php"><i class="fa fa-table"></i> Member</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Forum <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../home.php">Home</a></li>
                <li><a href="../category.php">Category</a></li>
                <li><a href="../member.php">Member</a></li>
              </ul>
            </li>
			<li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../profil.php">Profile</a></li>
                <li><a href="../logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
		  <?php
           //============================================================
?>
<h1>Category</h1>
<ol class="breadcrumb">
              <li class="active"><i class="fa fa-wrench"></i> Edit Category</li>
            </ol>
			<ol class="breadcrumb">
<form action="" method="post"> 
<select name="tipe"> 
<option>Pilihan Kategori FODIMTI</option>
<option value="JAVA_PROGRAMING">JAVA PROGRAMING</option>
<option value="ANROID_PROGRAMING">ANROID PROGRAMING</option>
<option value="JARINGAN_KOMPUTER">JARINGAN KOMPUTER</option>
<option value="WEB_PROGRAMING">WEB PROGRAMING</option>

<option value="UMUM">UMUM</option>
</select>
<input type="submit" name="submit" value="Pilih"/>
</form>
<?php
include "editcategory.php";
?>
<div style="text-align:left;">
<form action="tambah.php" method="post">
<font>Tambah Sub Kategori</font><p/>
<input type="text" name="tambah" size="40" required/>
<input type="submit" name="tbl-tambah" value="Tambah"/>
</form>
</div>
</ol>
<?php
//============================================================	?>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
<?php
	}else{
		echo "Bukan Area Newbie";
	}
}
else {
	echo "Anda tidak memiliki akun";
}
?>