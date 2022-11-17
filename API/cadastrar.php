<?php 
include('crud.php');


function cadastro(){
	if (isset($_POST["user"])){
		$name="";
		$mail="";
		$pass="";
		
		$name = ($_POST["user"]);
		$mail= ($_POST["mail"]);
		$pass= ($_POST["pass"]);
		
		$fields = array("userName","userMail", "userPassword");
		$table="usertbl";
		$values = array($name,$mail,$pass);
		Create( $fields, $values, $table);
		
		
	}
	
	
}


	


?>