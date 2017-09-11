<?php 
try {
	require('db_conn.php');
	$authenticaded = false;
/////////////////////////////////////////////////////////////////////////////////
	if(isset($_POST['sub-login'])){
		if(isset($_POST['user']) && isset($_POST['password'])){
			$user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			$query = "SELECT * FROM registry WHERE Reg_User= :user";
			$result = $base -> prepare($query);
			$result -> bindValue(':user', $user);
			// $result -> bindValue(':password', $password);
			$result -> execute();
			$result_count = $result ->  rowCount();
			if($result_count){
				$authenticaded = true;
			}else{
				header("location:../index.php");
			}
			$counter = 0;
			while($row = $result -> fetch(PDO::FETCH_ASSOC)){
				if(password_verify($password, $row['Reg_Pass'])){
					$counter = $counter + 1;
				}
			}
			if($counter > 0){
				$query = "SELECT Reg_User FROM registry WHERE Reg_User = :user ";
				$result = $base -> prepare($query);
				$result -> bindValue(':user', $user);
				$result -> execute();
				while($row = $result -> fetch(PDO::FETCH_ASSOC)){
					$username = $row['Reg_User'];
				}
				setcookie('username_cookie', $username, time()+(86400*30), "/");
				echo 'login ok';
				header("location:../login/myList.php");
			}else{
				header("location:../index.php");
			}
		}else{
			header("location:../index.php");
		}
////////////////////////////////////////////////////////////////////////////////
	}else if(isset($_POST['sub-signup'])){
		if(isset($_POST['user']) && isset($_POST['password'])){
			$user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
			$name = filter_var(strtolower($_POST['name']), FILTER_SANITIZE_STRING);
			$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			$passwordEnc = password_hash($password, PASSWORD_DEFAULT, array("cost" => 12));
			$query = "INSERT INTO registry (Reg_User, Reg_Pass, Reg_Name) VALUES (:user, :password, :name); ";
			echo $query;
			$result = $base -> prepare($query);
			$result -> bindValue(':user', $user);
			$result -> bindValue(':password', $passwordEnc);
			$result -> bindValue(':name', $name);
			$result -> execute();

			if($result == false){
				header("location:../index.php");
			}else{
				setcookie('username_cookie', $user, time()+(86400*30), "/");
				header("location:../login/myList.php");
			}
		}

	}else if(isset($_POST['sub-close'])){
		$username_cookie = $_COOKIR['username_cookie'];
		setcookie('username_cookie', $username_cookie, time()-(86400*30), "/");

	}else{
		header("location:../index.php");
		echo 'error';
	}
} catch (Exception $e) {
	echo 'Error at line -> ' . $e -> getLine();
	echo '<br> Error message -> ' . $e -> getMessage();
}









 ?>