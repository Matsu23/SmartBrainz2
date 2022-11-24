<?php
include_once('crud.php');

function postDiscussion(){
	if (isset($_POST["post"])){
		$userId=$_SESSION["ID"];
		$post=$_POST["post"];
		
		$fields = array("idUser","contentPost");
		$table="posttbl";
		$values = array($userId,$post);
		if((Create( $fields, $values, $table))==false){
				echo "<script>alert('erro realizado com sucesso');</script>";
			
		}else{
			echo "<script>alert('cadastro realizado com sucesso');</script>";
		}
		
		
	}
	
	



	

}

?>