<?php 

try {
	require('db_conn.php');
	$user = filter_var($_POST['addUserToGroup'], FILTER_SANITIZE_STRING);
	$id = filter_var($_POST['groupId'], FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['groupName'], FILTER_SANITIZE_STRING);

	$query = 'SELECT Reg_User FROM registry WHERE Reg_User = :user';
	$result = $base -> prepare($query);
	$result -> bindValue(':user', $user);
	$result -> execute();
	$users = '<ul>';
	
	$countUser = $result -> rowCount();

	if($countUser){
			$query = 'INSERT INTO mygroups (MyGroup_User, MyGroup_Id, MyGroup_Name) VALUES (:user, :id, :name)';
		$result = $base -> prepare($query);
		$result -> bindValue(':user', $user);
		$result -> bindValue(':id', $id);
		$result -> bindValue(':name', $name);
		$result -> execute();
		header('location:../login/myList.php?group='.$id);
	}else{
		echo 'Este usuario no existe<br><br><a href="javascript:history.back()">Volver</a>';
	}
			





} catch (Exception $e) {
	// echo 'Error at line: ' . $e -> getLine();
	// echo '<br> Error message: ' . $e -> getMessage();
	echo 'Se ha producido un error. Contacte con el administrador si no puede acceder';
	
}



 ?>