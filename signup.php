<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
	if(isset($_COOKIE['username_cookie'])){
		header('location:login/myList.php');
	}
 ?>
<form action="php/access.php" method="post">
	<table id="login" class="center">
		<tr>
			<td>
				<p class="center bold txt-24">Nuevo usuario</p>
			</td>
		</tr>
		<tr>
			<td><input class="inp-def w-90" type="text" placeholder="Nombre" name="name"> </td>
		</tr>
		<tr>
			<td><input class="inp-def w-90" type="text" placeholder="Usuario" name="user"> </td>
		</tr>
		<tr>
			<td><input class="inp-def w-90" type="password" placeholder="Contraseña" name="password"> </td>
		</tr>
		<tr>
			<td><button class="btn-def login-sub w-90 mt-10 shadow p-10" type="submit" name="sub-signup">Aceptar</button> </td>
		</tr>
	</table>
	</form>
	<div class="w-100 margin-10">
		<div class="w-50 center pt-10"><a href="login.php">Ya tengo una cuenta</a> </div>
		<div class="w-50"></div>
	</div>
</body>
</html>