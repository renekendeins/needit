<?php 


function getNewId(){
  
    $letra1 = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
    $num1 = ["0","1","2","3","4","5","6","7","8","9"];
    $i =0;
    $id = "";
    $mn = 0;
    $mx = 51;
    $mx2 = 9;
    $id = "";
    for($i=0; $i<10; $i++){
        $rndm = rand ( $mn , $mx );
        $letra = ($letra1[$rndm]);
        $rndm2 = rand ( $mn , $mx2 );
        $numero = ($num1[$rndm2]);
        $id .=  $letra . $numero;
    }
    return $id;
}


 ?>