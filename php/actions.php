<?php 

	
try {
	require('db_conn.php');
	require('foo.php');
	$user = $_COOKIE['username_cookie'];
	if(isset($_POST['group'])){
		$group = filter_var($_POST['group'], FILTER_SANITIZE_STRING);
	}else{
		header('location:../login/myList.php');
	}
	

	do{
		$id = getNewId();
		$checkIdQuery = 'SELECT Prod_Id FROM products WHERE Prod_Id = :checkId';
		$resultCheck = $base -> prepare($checkIdQuery);
		$resultCheck -> bindValue(':checkId', $id);
		$resultCheck -> execute();
		$isIdValid = $resultCheck -> rowCount();
	}while($isIdValid);

	if(isset($_POST['addProduct'])){
		if(isset($_POST['newProduct'])){
			$product = filter_var($_POST['newProduct'], FILTER_SANITIZE_STRING);
		}else{
			// exit
		}
		$query = 'INSERT INTO products (Prod_Id, Prod_User, Prod_Name, Prod_Group) VALUES (:id, :user, :name, :group)';
		$result = $base -> prepare($query);
		$result -> bindValue(':id', $id);
		$result -> bindValue(':user', $user);
		$result -> bindValue(':name', $product);
		$result -> bindValue(':group', $group);
		$result -> execute();
		header('location:../login/myList.php?group='.$group);
	}
	
} catch (Exception $e) {
	// echo 'Error at line: ' . $e -> getLine();
	// echo '<br> Error message: ' . $e -> getMessage();
	echo 'Se ha producido un error. Contacte con el administrador si no puede acceder';

}




?>