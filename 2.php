<!DOCTYPE html>

<html>
<head>
	<title>Soal No 2.</title>
</head>
<style type="text/css">
	.main{
		padding:2px;
		width: 500px;
		text-align: justify;;

	
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
</script>
<body>
<?php 
$html1='';
$html2='';
if (isset($_POST["Username"])) {

	  $depan=preg_match('/^[a-zA-Z]{1}/', $_POST["Username"]);
	  if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z]{5,9}$/', $_POST["Username"]) || !$depan){

      $html1= "<p style='color:red;'> username:​ merupakan kombinasi dari huruf kecil, huruf besar dan angka dengan panjang 5-9 karakter. Username tidak boleh diawali dengan angka / karakter special. Contoh:a12B4<p>";
            }  
            else{
            	$html1="<p style='color:green;'> Succes</p>";
            }
	}

	if (isset($_POST["Password"])) {

	  if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[@])[0-9A-Za-z!@#$%]{1,8}$/', $_POST["Password"])){

      $html2= "<p style='color:red;'> password:​ merupakan kombinasi dari huruf kecil, huruf besar minimal satu karakter, angka minimal satu karakter, dan karakter spesial minimal satu karakter dan harus memiliki karakter simbol ‘@’ dan panjang minimal 8 karakter.
		  <p>";
            }  
            else{
            	$html2="<p style='color:green;'> Succes</p>";
            }
	}
 ?>
<div class="main">
	<h1>Soal Nomor 2.</h1>
	<p>Pada sebuah form, terdapat 2 buah field yaitu: username dan password. Buatlah ​method/function untuk memvalidasi field-field tersebut, dengan requirement sebagai berikut:
	</p>
	<br>
	<form action="" method="post">
	<label for='Username'>Username :</label> 
	<input type="text" name="Username" id="Username">
	<br><?php 
	echo "<br>";
	echo $html1; ?>
	<label for='Password'>Password &nbsp;:</label> 
	<input type="password" name="Password" id="Password">
	<button type="button" class="btn" onclick="showw()" id="show">Show</button>
	<br><?php echo $html2; ?>
	<br>
	<input type="submit" name="submit" value="Submit">
	</form>


</div>


</body>
</html>