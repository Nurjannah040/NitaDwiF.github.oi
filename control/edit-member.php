<?php 
session_start(); 
include "../connect.php"; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Member's - Admin Forum</title>

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
          <a class="navbar-brand" href="../home.php">Forum Diskusi FODIMTI</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="charts.php"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
			<li><a href="category.php"><i class="fa fa-wrench"></i> Category</a></li>
            <li class="active"><a href="member.php"><i class="fa fa-table"></i> Member</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Forum <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="member.php">Member</a></li>
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
		  <h1>Members</h1>
<ol class="breadcrumb">
              <li class="active"><i class="fa fa-bar-chart-o"></i> Edit Member</li>
            </ol>
<?php
$idu=$_GET['idu'];
$_SESSION['idu']= $idu;
$sql="SELECT * FROM users WHERE idu = '$idu'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>
<div class="table-responsive">
<form action="edit-member-kirim.php" method="post">
	<table class="table table-bordered table-hover table-striped tablesorter">
	<tr>
		<tr>
			<td colspan="2"><b>Edit Profil</b></td>
		</tr>
		<tr>
			<td><b>Nama</b></td><td> <input type="text" name="nama" size="61" value="<?php echo $rows['nama'];?>"/></td>
		</tr>
		<tr>
			<td><b>Website</b></td><td> <input type="text" name="web" size="61" value="<?php echo $rows['web'];?>"/></td>
		</tr>
		<tr>
			<td><b>E-mail</b></td><td> <input type="text" name="email" size="61" value="<?php echo $rows['email'];?>"/></td>
		</tr>
		<tr>
			<td><b>Jabatan</b></td><td> <select name="jabatan"><option value="admin">Admin</option><option value="user" selected>User</option></select></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" value=" Edit "> <input type="reset" value=" Reset "></center></td>
		</tr>
<form action="edit-member-password.php" method="post">
		<tr>
			<td colspan="2"><b>Edit Password</b></font></td>
		</tr>
		<tr>
			<td><b>Password Baru</b></td><td> <input type="password" name="password_baru" size="40" /></td>
		</tr>
		<tr>
			<td><b>Ketik Ulang</b></td><td> <input type="password" name="ketik_ulang" size="40" /></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" value=" Edit "> <input type="reset" value=" Reset "></center></td>
		</tr>
	</tr>
	</table>
</form>
</div>
<div align="center"><button class="button"><a onClick="self.history.back()"><b>Back</b></a></button></div>
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