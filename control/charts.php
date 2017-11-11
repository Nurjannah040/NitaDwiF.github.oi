<?php 
session_start(); 
include "../connect.php"; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Charts - Admin FODIMTI</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="css/style-table-diagram.css" rel="stylesheet" type="text/css" media="screen" />
		
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	<script type="text/javascript" src="js/diagram/jquery.js"></script>
<script type="text/javascript" src="js/diagram/highcharts.js"></script>
<script type="text/javascript">
		
			/**
			 * Visualize an HTML table using Highcharts. The top (horizontal) header 
			 * is used for series names, and the left (vertical) header is used 
			 * for category names. This function is based on jQuery.
			 * @param {Object} table The reference to the HTML table to visualize
			 * @param {Object} options Highcharts options
			 */
			Highcharts.visualize = function(table, options) {
				// the categories
				options.xAxis.categories = [];
				$('tbody th', table).each( function(i) {
					options.xAxis.categories.push(this.innerHTML);
				});
				
				// the data series
				options.series = [];
				$('tr', table).each( function(i) {
					var tr = this;
					$('th, td', tr).each( function(j) {
						if (j > 0) { // skip first column
							if (i == 0) { // get the name and init the series
								options.series[j - 1] = { 
									name: this.innerHTML,
									data: []
								};
							} else { // add values
								options.series[j - 1].data.push(parseFloat(this.innerHTML));
							}
						}
					});
				});
				
				var chart = new Highcharts.Chart(options);
			}
				
			// On document ready, call visualize on the datatable.
			$(document).ready(function() {			
				var table = document.getElementById('datatable'),
				options = {
					   chart: {
					      renderTo: 'container',
					      defaultSeriesType: 'column'
					   },
					   title: {
					      text: 'STATISTIK PENGUNJUNG PER-KATEGORI FODIMTI'
					   },
					   xAxis: {
					   },
					   yAxis: {
					      title: {
					         text: 'View'
					      }
					   },
					   tooltip: {
					      formatter: function() {
					         return '<b>'+ this.series.name +'</b><br/>'+
					            this.y +' '+ this.x.toLowerCase();
					      }
					   }
					};
				
			      					
				Highcharts.visualize(table, options);
			});
				
		</script>
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
          <a class="navbar-brand" href="../home.php">FODIMTI</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="charts.php"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
			<li><a href="category.php"><i class="fa fa-wrench"></i> Category</a></li>
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
<h1>Charts</h1>
<ol class="breadcrumb">
              <li class="active"><i class="fa fa-bar-chart-o"></i> Charts</li>
            </ol>
			<ol class="breadcrumb"><br>
<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
		        <?php
		$query=mysql_query("select * from kategori order by lihat desc limit 0,5");
		?>
        <p>&nbsp;</p>
		<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped tablesorter">
		<thead>
        <tr>
            <th width="28%">Category Name</th>
          	<th width="24%">View</th>
    	</tr>
		</thead>
		<tbody>
            
            <?php
			while($row=mysql_fetch_array($query)){
				?>
				<tr>
					<th><div align="left"><?php echo $row['nama_kategori'];?></div></th>
					<td><?php echo $row['lihat'];?></td>
			</tr>
                <?php
			}
			?>
            
		</tbody>
		</table>
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