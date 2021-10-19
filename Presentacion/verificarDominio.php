<?php 
$buscaweb='facebook';
$dominio[1]=".com";
$dominio[2]=".net";
$dominio[3]=".org";
$dominio[4]=".biz";
$dominio[5]=".es";

for ($x=1; $x<6; $x++)

{

$pagina = 'http://www.'.$buscaweb.$dominio[$x];

if (@fopen($pagina,»r»)){
echo "la pagina con el dominio ".$pagina." esta ocupado<br>";
}else{
echo "El Dominio ".$pagina."  esta disponible<br>";
}
}

?>