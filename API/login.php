<?php 
include_once('crud.php');


function logIn(){
	if (isset($_POST["mail"])){
		$mail="";
		$pass="";
		$mail=$_POST["mail"];
		$pass=$_POST["pass"];
		$where="WHERE userMail = '".$mail."' AND userPassword = '".$pass."';";
		$userTbl=read('userTbl',$where);
		
		if($userTbl==false){
			echo "<script>alert('erro ao realizar login');</script>";
		}else{
			include_once('sessionManeger.php');
			loginSession($userTbl['idUser'],$userTbl['userName']);
			echo "<script>alert('login realizado com sucesso');</script>";
			return true;
		}
		
		
		

	
	

	}
};

	
	

	


?>