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
?>