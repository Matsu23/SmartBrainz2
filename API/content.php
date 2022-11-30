<?php
include_once('crud.php');

function createPost(){
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

function createComment(){
	if (isset($_POST["comment"])){
		$userId=$_SESSION["ID"];
		$comment=$_POST["comment"];
		$idpost=$_GET["PID"];
		$fields = array("idUser","contentCom",'idPost');
		$table="comtbl";
		$values = array($userId,$comment,$idpost);
		if((Create( $fields, $values, $table))==false){
			echo "<script>alert('erro realizado com sucesso');</script>";
		}else{
			echo "<script>alert('cadastro realizado com sucesso');</script>";
			
		}
		
	
	}
	
}


?>