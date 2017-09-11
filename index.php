<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Needit</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="center">
<?php 
	if(isset($_COOKIE['username_cookie'])){
		header('location:login/myList.php');
	}
 ?>
<div id="header">
	<img src="img/needit.png" alt="Needit logo" style="max-width: 300px;">
	<br><br>
	<a href="login.php">
		<button class="btn-def center w-90 margin-10">Iniciar sesión</button>
	</a>
	
	<a href="signup.php">
		<button class="btn-def center w-90 margin-10">Registrarse</button>
	</a>
</div>
</body>
</html>