<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
</head>

<body>
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped tablesorter">	
	<tr>
			  	<tr>
					<td>No</td>
					<td colspan="2">WEB PROGRAMING</font></td>
					<td>Dilihat</font></strong></td>
					<td>Topik</font></strong></td>
					<td>Tanggal</font></strong></td>
				</tr>
				<?php 
				$sql="SELECT * FROM kategori WHERE type='WEB_PROGRAMING'";
				$result=mysql_query($sql);
				$no=1;
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td><?php echo"".$no.""?></td>
				<td><img src="css/images/kategori.png"></td>
				<td>
				<a href="topik.php?id_kategori=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				<?php echo "<p><font size='1em'color='#515152'>".$rows['detail']."</font></p>"; ?>
				</td>
				<td><?php echo $rows['lihat']; ?></td>
				<?php
				$id_kategori=$rows['id_kategori'];
				$replay=mysql_query("SELECT * FROM post WHERE '$id_kategori'=id_kategori");
				$jml=mysql_num_rows($replay); 
				?>
				<td><?php echo $jml; ?></td>
				<td><?php echo $rows['datetime']; ?></td>
				</tr>

				<?php
				$no++;
				}?>	
				
	</tr>
</table>
<br><br>
<table class="table table-bordered table-hover table-striped tablesorter">
	<tr>
			  	<tr>
					<td>No</td>
					<td colspan="2">JAVA PROGRAMING</font></td>
					<td >Dilihat</td>
					<td >Topik</td>
					<td >Tanggal</font></strong></td>
				</tr>
			  	<?php 
				$sql="SELECT * FROM kategori WHERE type='JAVA_PROGRAMING'";
				$result=mysql_query($sql);
				$no=1;
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td ><?php echo"".$no.""?></td>
				<td ><img src="css/images/kategori.png"></td>
				<td >
				<a href="topik.php?id_kategori=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				<?php echo "<p><font size='1em'color='#515152'>".$rows['detail']."</font></p>"; ?>
				</td>
				<td><?php echo $rows['lihat']; ?></td>
				<?php
				$id_kategori=$rows['id_kategori'];
				$replay=mysql_query("SELECT * FROM post WHERE '$id_kategori'=id_kategori");
				$jml=mysql_num_rows($replay); 
				?>
				<td ><?php echo $jml; ?></td>
				<td ><?php echo $rows['datetime']; ?></td>
				</tr>

				<?php
				$no++;
				}?>	
	</tr>
</table>
<br>
<br>
<table class="table table-bordered table-hover table-striped tablesorter">
	<tr>
			  	<tr>
					<td>No</td>
					<td colspan="2">ANROID PROGRAMING</font></td>
					<td >Dilihat</td>
					<td >Topik</td>
					<td >Tanggal</td>
				</tr>
			  	<?php 
				$sql="SELECT * FROM kategori WHERE type='ANROID_PROGRAMING'";
				$result=mysql_query($sql);
				$no=1;
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td><?php echo"".$no.""?></td>
				<td><img src="css/images/kategori.png"></td>
				<td>
				<a href="topik.php?id_kategori=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				<?php echo "<p><font size='1em'color='#515152'>".$rows['detail']."</font></p>"; ?>
				</td>
				<td><?php echo $rows['lihat']; ?></td>
				<?php
				$id_kategori=$rows['id_kategori'];
				$replay=mysql_query("SELECT * FROM post WHERE '$id_kategori'=id_kategori");
				$jml=mysql_num_rows($replay); 
				?>
				<td><?php echo $jml; ?></td>
				<td><?php echo $rows['datetime']; ?></td>
				</tr>
				<?php
				$no++;
				}?>	
	</tr>
</table>
<br>
<br>
<table class="table table-bordered table-hover table-striped tablesorter">
	<tr>
			  	<tr>
					<td>No</td>
					<td colspan="2">JARINGAN KOMPUTER</font></td>
					<td >Dilihat</td>
					<td >Topik</td>
					<td >Tanggal</font></strong></td>
				</tr>
			  	<?php 
				$sql="SELECT * FROM kategori WHERE type='JARINGAN_KOMPUTER'";
				$result=mysql_query($sql);
				$no=1;
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td ><?php echo"".$no.""?></td>
				<td ><img src="css/images/kategori.png"></td>
				<td >
				<a href="topik.php?id_kategori=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				<?php echo "<p><font size='1em'color='#515152'>".$rows['detail']."</font></p>"; ?>
				</td>
				<td><?php echo $rows['lihat']; ?></td>
				<?php
				$id_kategori=$rows['id_kategori'];
				$replay=mysql_query("SELECT * FROM post WHERE '$id_kategori'=id_kategori");
				$jml=mysql_num_rows($replay); 
				?>
				<td ><?php echo $jml; ?></td>
				<td ><?php echo $rows['datetime']; ?></td>
				</tr>

				<?php
				$no++;
				}?>	
	</tr>
</table>
<br>
<br>
<table class="table table-bordered table-hover table-striped tablesorter">
	<tr>
			  	<tr>
					<td>No</td>
					<td colspan="2">Umum</font></td>
					<td >Dilihat</td>
					<td >Topik</td>
					<td >Tanggal</td>
				</tr>
			  	<?php 
				$sql="SELECT * FROM kategori WHERE type='UMUM'";
				$result=mysql_query($sql);
				$no=1;
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td><?php echo"".$no.""?></td>
				<td><img src="css/images/kategori.png"></td>
				<td>
				<a href="topik.php?id_kategori=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				<?php echo "<p><font size='1em'color='#515152'>".$rows['detail']."</font></p>"; ?>
				</td>
				<td><?php echo $rows['lihat']; ?></td>
				<?php
				$id_kategori=$rows['id_kategori'];
				$replay=mysql_query("SELECT * FROM post WHERE '$id_kategori'=id_kategori");
				$jml=mysql_num_rows($replay); 
				?>
				<td><?php echo $jml; ?></td>
				<td><?php echo $rows['datetime']; ?></td>
				</tr>
				<?php
				$no++;
				}?>	
	</tr>
</table>
</div>
</body>
</html>