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
		}
		function brand(){
			document.getElementById('pro').style.display='none';
			document.getElementById('brand').style.display='inline';
			document.getElementById('cus').style.display='none';
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
<div class="container">
	<div class="head"><h1>RMP MOTORCYCLE</h1>
		<div class="side">
			<button onclick="cus()">Add Customer</button> <button onclick="pro()">Add Product</button> <button onclick="brand()">Add Brand</button>
		</div>
	</div>
	<div class="body">
		<div id='cus' class="costumer" style="display: none;">
			<h1>ADD CUSTOMER</h1>
			<form action="" method="post">
			<label for='name'>name &nbsp;&nbsp;&nbsp;:</label> 
			<input type="text" name="name" id="name">
			<br>
			<label for='address'>address :</label> 
			<input type="text" name="address" id="address">
			<br>
			<label for='phone'>phone &nbsp;&nbsp;:</label> 
			<input type="text" name="phone" id="phone">
			<br><br>
			<input type="submit" name="submit">
			</form>
		</div>
		<div id='pro' class="product">
			<?php 
			echo "<table>";
			$sql="SELECT *  from motorcycle_tb";
			$query=mysqli_query($koneksi,$sql);
			while($row=mysqli_fetch_assoc($query))
			{
			
				echo "<tr><td>Nama :".$row['name']."</td>";
				echo "	<td>Color :".$row['Color']."</td></tr>";
				echo "<tr><td> <img style='height:200px;' src='motor/".$row['Image']."'></td></tr>";
			
				
			}
			echo "</table>";
			 ?>
		</div>
		<div id='brand' class="brand">
			<h1>ADD Brand</h1>
			<form action="" method="post">
			<label for='name'>name &nbsp;&nbsp;&nbsp;:</label> 
			<input type="text" name="name" id="name">
			<br>
			<br>
			<input type="submit" name="submit">
			</form>
		</div>
	</div>

</div>

</body>
</html>