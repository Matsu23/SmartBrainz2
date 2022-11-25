<?php
include_once('API/sessionManeger.php');
include_once('crud.php');
$post=read('posttbl','');




echo "<br>";


for ($x = 0; $x <= count($post)-1; $x++) {
	foreach ($post[$x] as $value){
		echo "$value <br>";
	}
}


/*foreach ($post[0] as $value) {
  echo "$value <br>";
  
}*/


?>