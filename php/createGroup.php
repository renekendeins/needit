<?php 
	require('db_conn.php');
	require('foo.php');

	try {
		if(isset($_POST['newGroup'])){
			$newGroup = filter_var($_POST['newGroup'], FILTER_SANITIZE_STRING);
		}else{
			// exit
		}
		$user = $_COOKIE['username_cookie'];
		do{
			$id = getNewId();
			$checkIdQuery = 'SELECT Prod_Id FROM products WHERE Prod_Id = :checkId';
			$resultCheck = $base -> prepare($checkIdQuery);
			$resultCheck -> bindValue(':checkId', $id);
			$resultCheck -> execute();
			$isIdValid = $resultCheck -> rowCount();
		}while($isIdValid);

		$query = 'INSERT INTO groups (Group_Name, Group_User, Group_Id) VALUES (:name, :user, :id)';
		$result = $base -> prepare($query);
		$result -> bindValue(':name', $newGroup);
		$result -> bindValue(':user', $user);
		$result -> bindValue(':id', $id);
		$result -> execute();

		$query = 'INSERT INTO mygroups (MyGroup_User, MyGroup_Id, MyGroup_Name) VALUES (:user, :id, :name)';
		$result = $base -> prepare($query);
		$result -> bindValue(':user', $user);
		$result -> bindValue(':id', $id);
		$result -> bindValue(':name', $newGroup);
		$result -> execute();

		header('location:../login/myList.php');
		
	} catch (Exception $e) {
		// echo 'Error at line: ' . $e -> getLine();
		// echo '<br> Error message: ' . $e -> getMessage();
		echo 'Se ha producido un error. Contacte con el administrador si no puede acceder';

	}







 ?>