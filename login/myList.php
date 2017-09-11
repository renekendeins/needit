<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi lista</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php 

	if(!isset($_COOKIE['username_cookie'])){
		header('location:../index.php');
	}
	require('../php/recover.php');

 ?>
	<div class="w-100 txt-18"><?php echo $myGroups ?><a href="../php/exit.php"><p class="right w-33 d-inline txt-rigth red mt-0">Salir<i class="fa fa-close ml-5"></i></p></a></div>
			
			<?php echo $thisGroup ?>
			<br>
			<br>
			<?php echo $createGroup ?>
			<?php echo $users ?>
			<?php echo $products ?>
		
</body>
</html>