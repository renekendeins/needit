<?php 

try {
	require('db_conn.php');
	$user = $_COOKIE['username_cookie'];
	if(!isset($_GET['group'])){
		$query = 'SELECT * FROM mygroups WHERE MyGroup_User = :user';
		$result = $base -> prepare($query);
		$result -> bindValue(':user', $user);
		$result -> execute();

		$groupCounter = $result -> rowCount();
		$users = '';
		if($groupCounter < 1){
			$createGroup = '<form method="post" action="../php/createGroup.php"><div> <input type="text" name="newGroup" placeholder="Nombre del grupo..." class="inp-def"> <input type="submit" value="Crear" name="createGroup" class="btn-def"> </div></form>';
			$products = '';
		}else{
			$createGroup = '<form method="post" action="../php/createGroup.php" class="center"><div> <input type="text" name="newGroup" placeholder="Nombre del grupo..." class="inp-def w-66"> <button type="submit" name="createGroup" class="btn-def w-33">Crear</button></div></form>';
			$products = '<div class="margin--8 mt-10"><table class="w-100 txt-left">';
			while($row = $result -> fetch(PDO::FETCH_ASSOC)){
				$products .= '<tr><th class="b-white"><a href="myList.php?group='.$row['MyGroup_Id'].'" class="noUnderline"><p class="b-white">'.$row['MyGroup_Name'].'</p></a></th></tr>';
			}
			$products .= '</table></div>';
			
		}
		$thisGroup = '';
		$myGroups = '<!-- <p class="left w-66 d-inline mt-0">Mis grupos</p> -->';
		$close = '<a href="../php/exit.php" class="center noUnderline"><button class="red mt-0 w-100 btn-def white" style="background-color: red">Cerrar sesión<i class="fa fa-close ml-5" style="background-color: red"></i></button></a>';
	}else{
		$group = filter_var($_GET['group'], FILTER_SANITIZE_STRING);
		$query = 'SELECT * FROM mygroups WHERE MyGroup_User = :user AND MyGroup_Id = :group';
		$result = $base -> prepare($query);
		$result -> bindValue(':user', $user);
		$result -> bindValue(':group', $group);
		$result -> execute();
		while($row = $result -> fetch(PDO::FETCH_ASSOC)){
			$groupName = $row['MyGroup_Name'];
			$groupId = $row['MyGroup_Id'];
		}
		$thisGroup = '<h2 style="min-width:200px; font-size:150% " class="center mt-0">Grupo: ' . $groupName . '</h2><br><hr>';
		$myGroups = '<a href="myList.php" class="mt-0 noUnderline"><button class="center w-100 btn-def d-inline mt-0"><i class="fa fa-angle-double-left mr-5" style="background-color:rgb(43,178,221)"></i>Mis grupos</button></a>';
		$createGroup = '<form method="post" action="../php/addUserToGroup.php"><div class="center"> <input type="text" name="addUserToGroup" placeholder="Nombre del usuario..." class="inp-def w-66"><input type="text" name="groupId" value="'.$group.'" style="display:none"><input type="text" name="groupName" value="'.$groupName.'" style="display:none"> <button type="submit"  name="addUser" class="btn-def w-33">Invitar</button> </div></form>';



		$query = 'SELECT * FROM products WHERE Prod_Group = :group ORDER BY Prod_Status DESC';
		$result = $base -> prepare($query);
		$result -> bindValue(':group', $group);
		$result -> execute();

		$products = '	<div class="w-100 center mb-20">
		<form action="../php/actions.php" method="post">
			<input type="text" style="display:none" name="group" value="'.$groupId.'">
			<input type="text" class="w-66 inp-def left" placeholder="Nombre del producto" name="newProduct" >
			<button class="w-33 btn-def right" type="submit" name="addProduct"><i class="fa fa-plus" style="font-size:48px;background-color: rgb(43,178,221);"></i></button>

		</form>
	</div>
	<br>
	<br>
	<div class="margin-10 mt-70">
	
		<table class="w-100 txt-left">';
		while($row = $result -> fetch(PDO::FETCH_ASSOC)){

			if($row['Prod_Status'] == 1){
				$products .= '<tr class="blue" ><th><form method="post" action="../php/removeProduct.php"><input type="checkbox" style="transform:scale(4); vertical-align:super; margin-right:20px" name="product" id="'.$row['Prod_Id'].'" value="'.$row['Prod_Id'].'" onclick="removeProduct(this.id)"><label style="font-size:45px; padding-left:10px" for="prod_1">'.$row['Prod_Name'].'</label><label class="noBold black ml-15">('.$row['Prod_User'].')</label></th><input type="text" style="display:none" name="group" value="'.$groupId.'"></form></tr>';
			}else if($row['Prod_Status'] == 0){
				$products .= '<tr class="red" ><th><input type="checkbox" checked disabled style="transform:scale(4); vertical-align:super; margin-right:20px" name="product" id="'.$row['Prod_Id'].'" value="'.$row['Prod_Id'].'" onclick="removeProduct(this.id)"><label style="font-size:45px; padding-left:10px" for="prod_1">'.$row['Prod_Name'].'</label><label class="noBold black ml-15">('.$row['Prod_User'].')</label></th></tr>';
			}else{

			}




			
		}
		$products .= '</table></div>';

		$query = 'SELECT MyGroup_User FROM mygroups WHERE MyGroup_Id = :id';
		$result = $base -> prepare($query);
		$result -> bindValue(':id', $group);
		$result -> execute();
		$users = '<p class="center txt-48 w-100">Usuarios</p><ul>';
		while($row = $result -> fetch(PDO::FETCH_ASSOC)){
			if($row['MyGroup_User'] == $user){
				$users .= '<li class="blue bold">'.$row['MyGroup_User'].'</li>';
			}else{
				$users .= '<li>'.$row['MyGroup_User'].'</li>';
			}
			
		}
		$users .= '</ul>';
		
	}



} catch (Exception $e) {
	// echo '(recover.php) Error at line: ' . $e -> getLine();
	// echo '<br> Error message: ' . $e -> getMessage();
	echo 'Se ha producido un error. Contacte con el administrador si no puede acceder';
}





 ?>