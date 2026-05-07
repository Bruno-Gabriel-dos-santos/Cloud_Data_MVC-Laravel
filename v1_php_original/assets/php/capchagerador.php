<?php
include("conecxao.php");



$textoAleatorio="0123456789abcdefghijlmnopqrstuvxyz";
$senha="";




for($l=0;$l!=1000;$l++){

for($i=0;$i!=8;$i++){$senha=$senha.$textoAleatorio[rand(0,33)];}

$sql="INSERT INTO `captcha`(`numero`, `valor`) VALUES ('[value-1]','$senha')";

if(mysqli_query($conecxao,$sql)){
    echo "1";
}else{
    echo"0";
}
$senha="";
}
mysqli_close($conecxao);


?>