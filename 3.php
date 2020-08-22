<!DOCTYPE html>
<html>
<head>
	<title>Soal No 3.</title>
</head>
<style type="text/css">
	.main{
		padding:2px;
		width: 500px;
		text-align: justify;;

	
	}
</style>
<body>
		<?php 
		$html1='';
		$n=0;
		$eto=0;
		$gambar='';
		
	if (isset($_POST['inputs'])) {
		$in=$_POST['inputs'];
		$out=$in*$in;
		$as=$_POST['inputs']%2;
		if($as!=0){
			for ($i=0; $i <$out ; $i++) { 
				$n++;
				$gambar.='&nbsp;&nbsp;&nbsp;';
				if ($i%2!=0) {
				$gambar.= "*";
		}
				else{
				$gambar.= "=";
		}
			if ($n==$_POST['inputs']) {
				$n=0;
				if ($eto==2) {
					if ($i%2!=0) {
					$gambar.= "=";
					}
					else{
					$gambar.= "*";
					}
					$eto=-1;
				}
				$gambar.='<br>';
				$eto++;
			}
				
		}
	}
		else{
			$html1= "<p style='color:red;'>Input haurus merupakan bilangan Ganjil</p>";
		}
	}
	 ?>
<div class="main">
	<h1>Soal Nomor 3.</h1>
	<p>Buatlah function untuk mencetak gambar seperti pada soal, yang mempunyai sebuah parameter sebagai panjang lebar/tinggi gambar. Parameter harus merupakan bilangan ganjil:

	</p>
	<br>
	<form action="" method="post">
	<label for='inputs'>Input panjang :</label> 
	<input type="text" name="inputs" id="inputs"><br>
	<?php echo $html1; ?>
	<br>
	<input type="submit" name="submit" value="Submit">
	<br><br>
	
	</form>
	<?php echo $gambar; ?>

</div>
</body>
</html>