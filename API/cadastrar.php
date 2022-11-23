<?php 
include_once('crud.php');


function cadastro(){
	if (isset($_POST["userCadastro"])){
		$name="";
		$mail="";
		$pass="";
		
		$name = ($_POST["userCadastro"]);
		$mail= ($_POST["mailCadastro"]);
		$pass= ($_POST["passCadastro"]);
		
		$fields = array("userName","userMail", "userPassword");
		$table="usertbl";
		$values = array($name,$mail,$pass);
		if((Create( $fields, $values, $table))==false){
				echo "<script>alert('erro realizado com sucesso');</script>";
			
		}else{
			echo "<script>alert('cadastro realizado com sucesso');</script>";
		}
		
		
	}
	
	



	

}
?>