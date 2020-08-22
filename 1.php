<!DOCTYPE html>

<html>
<head>
	<title>Soal No 1.</title>
</head>
<style type="text/css">
	.main{
		padding:2px;
		width: 500px;
		text-align: justify;;

	
	}
	#lp{
		display: none;
	}
</style>
<script type="text/javascript">
	function showw(){
		  var x =  document.getElementById('Password');
		  var b =  document.getElementById('show');
		   if (x.type === "password") {
   			 x.type = "text";
   			 b.innerHTML ='Hide';

  			} else {
  			 x.type = "password";
  			  b.innerHTML ='Show';
  			}
 

	}
	function show2(){
		document.getElementById("lp").style.display='inline';
	}
</script>
<body>
<div class="main">
	<h1>Soal Nomor 1.</h1>
	<p>Keamanan user merupakan hal yang penting,  sebagai seorang programmer kamu ditugaskan untuk membuat enskripsi sederhana untuk menyembunyikan password user, buatlah 2 function, untuk mengekripsi password dan deskripsi password</p>
	<br>
	<form action="" method="post">
	<label for='Username'>Username :</label> 
	<input type="text" name="Username" id="Username">
	<br><br>
	<label for='Password'>Password &nbsp;:</label> 
	<input type="password" name="Password" id="Password">
	<button type="button" class="btn" onclick="showw()" id="show">Show</button><br><br>
	<input type="submit" name="submit" value="Submit">
	</form>
</div>
<?php 
if (isset($_POST['Password'])) {
 	$base64= base64_encode($_POST['Password']);
 	echo "<br> Password rahasia : ".$base64."<br>";
 	echo "<br><button onclick=\"show2()\">Look True Password</button>";
 	echo "<div id=\"lp\">";
 	echo "<form action='' method='post'>";
 	echo "<br>Copy atau Tulis Password rahasia di atas <input type='text' name='ist' value=''>";
 	echo "<br><input type='submit' value='Submit'  >";
 	echo "</form>";
 	echo "</div>";

 } 
  	if (isset($_POST['ist'])) {
	$base64= base64_decode($_POST['ist']);
 	echo"<br> Password Sebenarnya adalah :" .$base64;
	# code...
}
 ?>

</body>
</html>