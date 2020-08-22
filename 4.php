<!DOCTYPE html>
<html>
<head>
	<title>RMP MOTOR CYCLE</title>
</head>
<body>
	<script type="text/javascript">
		function cus(){
			document.getElementById('pro').style.display='none';
			document.getElementById('cus').style.display='inline';
			document.getElementById('brand').style.display='none';
		}
		function pro(){
			document.getElementById('cus').style.display='none';
			document.getElementById('pro').style.display='inline';
			document.getElementById('brand').style.display='none';
			document.getElementById('isi').style.display='inline';

		}
		function brand(){
			document.getElementById('pro').style.display='none';
			document.getElementById('brand').style.display='inline';
			document.getElementById('cus').style.display='none';
		}
		function ambil(ids){
		document.getElementById('ids').value=ids;
		document.getElementById('mod').submit();
		}
		function beli(ids){
			document.getElementById('cus').style.display='none';
			document.getElementById('pro').style.display='inline';
			document.getElementById('brand').style.display='none';
		}
	</script>
<style type="text/css">
	.side{
		float: right;
		margin-right: 100px;
	}
</style>
<?php 
	$server = "localhost";
	$user = "root"; 
	$pass = ""; 
	$dbase = "dumbways"; 
 

	$koneksi = mysqli_connect($server, $user, $pass, $dbase);
 ?>
 
 <form action="" method="post" id="mod">
 	<input type="hidden" id="ids" name="ids">

 </form>
 <?php if (isset($_POST['ids'])) {
 $sql="SELECT *  from motorcycle_tb where id='".$_POST['ids']."'";
	$query=mysqli_query($koneksi,$sql);	
	$row=mysqli_fetch_assoc($query);
	$kur=$row['stock']-1;
	echo $row['stock'];
 $sql="UPDATE  motorcycle_tb  set stock='".$kur."' where id='".$_POST['ids']."'";
 $query=mysqli_query($koneksi,$sql);	
 } ?>

<div class="container">
	<div class="head"><h1>RMP MOTORCYCLE</h1>
		<div class="side">
			<button onclick="cus()">Add Customer</button>
			 <button onclick="pro()">Add Product</button>
			  <button onclick="brand()">Add Brand</button>
			    <button onclick="beli()">Beli</button>
		</div>
	</div>
	<div class="body">
		<div id='cus' class="costumer" style="display: none;">
			<h1>ADD CUSTOMER</h1>
			<form action="" method="post">
			<label for='name'>name &nbsp;&nbsp;&nbsp;:</label> 
			<input type="text" name="namec" id="name">
			<br>
			<label for='address'>address :</label> 
			<input type="text" name="address" id="address">
			<br>
			<label for='phone'>phone &nbsp;&nbsp;:</label> 
			<input type="text" name="phone" id="phone">
			<br><br>
			<input type="submit" name="submit" >
			</form>
			<br>
			<?php 
				if (isset($_POST['namec'])) {
			$sql="insert into customer_tb(name,address,phone) values('".$_POST['namec']."','".$_POST['address']."','".$_POST['phone']."')";
			$query=mysqli_query($koneksi,$sql);
			
		
			}
			
			$sql="SELECT *  from customer_tb";
			$query=mysqli_query($koneksi,$sql);
			echo "<table border='solid'>";
				echo "<tr>
				<td><strong>id<strong></td>
				<td><strong>name<strong></td>
				<td><strong>address<strong></td>
				<td><strong>phone<strong></td>
				</tr>";
			while($row=mysqli_fetch_assoc($query))
				
			{
			
				echo "<tr><td>".$row['id']."</td>";
				echo "	<td>".$row['name']."</td>
						<td>".$row['address']."</td>
						<td>".$row['phone']."</td>

				</tr>";
				
				
			}
			echo "</table>";

			 ?>
		</div>


		<div id='pro' class="product">
			<div class="isi" id="isi" style="display: none;">
				<h1>ADD MOTOR</h1>
			<form action="" enctype="multipart/form-data" method="post">
				<label for='nama'>Motor Name  &nbsp;&nbsp;&nbsp;:</label> 
				<input type="text" name="namep">
				<br>
					<label for='brand'>Brand  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label> 
				<select name="brand">
					<?php 
						$sql2="SELECT name as nameb ,id as bid from brand_tb";
			$query2=mysqli_query($koneksi,$sql2);
			while($row2=mysqli_fetch_assoc($query2))
			{

				echo "

				<option  value='".$row2['bid']."'>".$row2['nameb']."</option>";
			}
					 ?>
					
				</select>

				<br><label for='Image'>Image &nbsp;&nbsp;&nbsp;:</label>
				<input type="file" name="Image">
				<br><label for='color'>color &nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="color">
				<br><label for='specification'>specification  &nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="specification">
				<br><label for='stock'>stock:  &nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="stock">
				<br>
				<input type="submit" name="submit" value="Submit">
			</form>
			<?php 
			if (isset($_POST['namep'])) {
				$nama_gambar=$_FILES['Image']['name'];
				$tmp_gambar=$_FILES['Image']['tmp_name'];
				$dir_gambar="motor/$nama_gambar";

				$sql="insert into motorcycle_tb(name,brand_id,Color,specification,stock,image) values('".$_POST['namep']."','".$_POST['brand']."','".$_POST['color']."','".$_POST['specification']."','".$_POST['stock']."','".$nama_gambar."')";
				echo $sql;
			$query=mysqli_query($koneksi,$sql);
			move_uploaded_file($tmp_gambar, $dir_gambar);
			 	# code...
			 } ?>
			<br>
			</div>
			<?php 
			echo "<table>";
			$sql="SELECT *  from motorcycle_tb";
			$query=mysqli_query($koneksi,$sql);
			while($row=mysqli_fetch_assoc($query))
			{
			
				echo "<tr><td>Nama :".$row['name']."</td>";
				echo "	<td>Color :".$row['Color']."</td></tr>";
				echo "<td><input type='button' id='buy' value='Beli' onclick='ambil(".$row['id'].");'></td>";
				echo "<tr><td> <img style='height:200px;' src='motor/".$row['Image']."'></td></tr>";
			
			
				
			}
			echo "</table>";
			 ?>
		</div>




		<div id='brand' class="brand" style="display: none;">
			<h1>ADD Brand</h1>
			<form action="" method="post">
			<label for='name'>name &nbsp;&nbsp;&nbsp;:</label> 
			<input type="text" name="nameb" id="name">
			<br>
			<br>
			<input type="submit" name="submit">
			</form>
			<h1>List</h1>
			<?php 
				if (isset($_POST['nameb'])) {
			$sql="insert into brand_tb(name) values('".$_POST['nameb']."')";
			$query=mysqli_query($koneksi,$sql);
			
			
			}

			$sql="SELECT *  from brand_tb";
			$query=mysqli_query($koneksi,$sql);
			echo "<table border='solid'>";
				echo "<tr>
				<td><strong>id<strong></td>
				<td><strong>name<strong></td>
				</tr>";
			while($row=mysqli_fetch_assoc($query))
				
			{
			
				echo "<tr><td>".$row['id']."</td>";
				echo "	<td>".$row['name']."</td></tr>";
				
				
			}
			echo "</table>";

			 ?>
		</div>
	</div>

</div>

</body>
</html>