<?php
        


    try {
    	$db_host="localhost"; // direccion base de datos
	$db_user="root"; //nombre de usuario de la bdd
	$db_nombre = "needit_db";
	$db_pass="";

    $base = new PDO("mysql:host = localhost; dbname=needit_db", 'root', '');

    $base ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $base -> exec("SET CHARACTER SET utf8");
    } catch (Exception $e) {
    	// echo 'Error at line: ' . $e -> getLine();
    	// echo 'Error message: ' . $e -> getMessage();
    	echo 'Se ha producido un error. Contacte con el administrador si no puede acceder';
    }

?>