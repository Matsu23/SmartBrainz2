<?php
include_once('API/sessionManeger.php');
include_once('crud.php');
$post=read('posttbl');
echo "<br>";



echo "<br>";


for ($x = 0; $x <= count($post)-1; $x++) {
	foreach ($post[$x] as $value){
		echo "$value <br>";
	}
	echo "<br>";
}
echo "<br>";
$teste=read('posttbl','',1,[ 'posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser'],5);




for ($x = 0; $x <= count($teste)-1; $x++){
	echo "<div style='border-style:solid';border-color:red;>";
	echo ("idpost:".$teste[$x]['idPost']."<br>");
	echo ("<img src='".$teste[$x]['userImg']."' style='width:25%;'/><br>");
	echo ("username:".$teste[$x]['userName']."<br>");
	echo ("conteudo:".$teste[$x]['contentPost']."<br>");
	echo "</div>";
}


/*foreach ($post[0] as $value) {
  echo "$value <br>";
  
}*/


?>