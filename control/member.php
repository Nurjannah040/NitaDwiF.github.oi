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
<h1>Members</h1>
<ol class="breadcrumb">
              <li class="active"><i class="fa fa-wrench"></i> Member Forum Diskusi FODIMTI</li>
            </ol>
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped tablesorter">	
	<tr>
	<tr>		<tr align="center">
				<td><b>AVATAR</b></td>
				<td><b>NAMA</b></td>
				<td><b>POSTINGAN</b></td>
				<td><b>JABATAN</b></td>
				<td><b>BERGABUNG</b></td>
				<td><b>WEBSITE</b></td>
				<td><b>EMAIL</b></td>
				<td COLSPAN="2"><b>ACTION</b></td>
				</tr>
				<?php 
				
				$baselink=$_SERVER['PHP_SELF'];
				// jumlah data perhalaman 
				$rowsPerPage = 10; 
				//nilai halaman awal 
				$pageNum = 1; if(!empty($_GET['page'])) {     
				$pageNum = $_GET['page']; } 
				$offset = ($pageNum - 1) * $rowsPerPage; 
				
			    $sql=mysql_query("SELECT * FROM users LIMIT $offset, $rowsPerPage");
				while($rows=mysql_fetch_array($sql)){ 
				$avatar=$rows['avatar'];
				?>
				<tr align="center" valign="middle">
				<td ><img src="<?php echo '../',$avatar;?>" width="70" height="70" style="border-radius : 5px;"></td>
				<td ><?php echo "".$rows['nama'].""; ?></td>
				<td ><?php echo "".$rows['jml_posting'].""; ?></td>
				<td ><?php echo "".$rows['jabat'].""; ?></td>
				<td ><?php echo "".$rows['tanggal'].""; ?></td>
				<td ><?php echo "".$rows['web'].""; ?></td>
				<td ><?php echo "".$rows['email'].""; ?></td>
				<td align="center" ><a href="edit-member.php?idu=<?php echo $rows['idu'];?>"><img src="../css/images/edit.png" title="edit"/></a></td>
				<td align="center" ><a href="delete.php?idu=<?php echo $rows['idu'];?>"><img src="../css/images/delete.png" title="hapus" onclick='return confirm("Anda yakin akan menghapus data tersebut ?")'/></a></td>
				</tr>

				<?php
				}?>	
	</tr>
</table>
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