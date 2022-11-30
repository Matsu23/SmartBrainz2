<?php
include_once('crud.php');

function alterDescription(){
	if (isset($_POST["desc"])){
		$userId=$_SESSION["ID"];
		$desc=$_POST["desc"];
		
		$campos = array("userDescription");
		$tabela="usertbl";
		$valores = array($desc);
		$condition = "WHERE idUser=".$userId;
		$var=update($campos,$valores,$tabela,$condition);
		echo "<script>alert('oi ".$var."');</script>";
		
	}
	
}
	
	
function getProfile(){
	if (isset($_GET["UID"])){
		$uid=$_GET["UID"];
		$tabela='usertbl';
		$condition='WHERE idUser='.$uid;
		
		$profile=read($tabela,$condition);
		if($profile!=false){
			print_r($profile);
		}else{
			echo "usuario não encontrado";
		}
		
	}else{
		echo "especifique um usuario";
		echo $_GET["UID"];
		
	}
	
}


	

?>