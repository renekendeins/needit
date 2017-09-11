<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi lista</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php 

	if(!isset($_COOKIE['username_cookie'])){
		header('location:../index.php');
	}
	require('../php/recover.php');

 ?> <div>
 	
	<p class="w-45 left"><i onclick="displayMenu()" class="fa fa-navicon" style="font-size:75px; position: absolute; top: 50px;left:0;margin:10px;cursor: pointer"></i></p>
 	<p class="w-45 rigth"  style="font-size: 80px"><?php echo $thisGroup ?></p>
 </div>
	<?php echo $products ?>
			
			
			
			<br>
			
			
			


			<div id="menu" class="menu">
				<p onclick="closeMenu()" class="red center"><i class="fa fa-close pointer" style="font-size:48px;color:red"></i>CERRAR</p>
				<br>
				
				<?php echo $createGroup ?>
				<br>
				<div class="w-100 txt-48 center"><?php echo $myGroups ?></div> 
				<br>
				
				<?php if(isset($close)){echo $close;} ?>
				
				
				
				<?php echo $users ?>
			</div>
		<script src="../javascript/script.js"></script>
</body>
</html>