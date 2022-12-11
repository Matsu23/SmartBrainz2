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

function alterImg(){
	include_once('sessionManeger.php');
	if (isset($_POST["upload"])){
		$target_dir = "./UserData/".$_SESSION["User"]."/avatar.png";
		 if (move_uploaded_file($_FILES["imgUp"]["tmp_name"], $target_dir)){
			 echo "<script>alert('arquivo uploadado');</script>";
			 $_SESSION['avatar']="./UserData/".$_SESSION["User"]."/avatar.png";
		 }else{
			 echo "<script>alert('arquivo não uploado');</script>";
		 }
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

function cadastro(){
	
		$name="";
		$mail="";
		$pass="";
		
		$name = ($_POST["userCadastro"]);
		$mail= ($_POST["mailCadastro"]);
		$pass= ($_POST["passCadastro"]);
		
		$fields = array("userName","userMail", "userPassword",'userImg');
		$table="usertbl";
		$values = array($name,$mail,$pass,'UserData/'.$name.'/avatar.png');
		if((Create( $fields, $values, $table))==false){
			
				echo "<script>alert('erro realizado com sucesso');</script>";
			
		}else{
			if(mkdir('./UserData/'.$name)) {
				copy('./UserData/Default/avatar.png','UserData/'.$name.'/avatar.png' );
			}
			echo "<script>alert('cadastro realizado com sucesso');</script>";
			$data = array($mail,$pass);
			return $data;
		}
		
		
	
}

function setTopicos(){
	include_once('sessionManeger.php');
	if (isset($_POST["topicos"])){
		print_r($_POST["topicos"]);
		$topicos=$_POST["topicos"];
		$topicos=json_encode($topicos);
		if(fopen('UserData/'.$_SESSION["User"].'/topicos.json' , "w")){
			$arquivo=fopen('UserData/'.$_SESSION["User"].'/topicos.json' , "w");
			fwrite($arquivo, $topicos);
			$topicos=file_get_contents('UserData/'.$_SESSION["User"].'/topicos.json' );
			$_SESSION['topics']=$topicos;
		}else{
			echo "erro";
		}
		
	}
	
	
}


function getTopicos(){
	include_once('sessionManeger.php');
	$topicos=file_get_contents('UserData/'.$_SESSION["User"].'/topicos.json' );
	return $topicos;
	
}

function logIn(){
		if (isset($_POST["mail"]) && !isset($_POST["userCadastro"])){
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
				loginSession($userTbl[0]['idUser'],$userTbl[0]['userName'],$userTbl[0]['userComplete'],$userTbl[0]['userImg']);
				$_SESSION['topics']=getTopicos();
				}
		}
		if (isset($_POST["userCadastro"]) && !isset($_POST["mail"])){
			$info=cadastro();
			print_r($info);
			$where2="WHERE userMail = '".$info[0]."' AND userPassword = '".$info[1]."';";
			$userTbl2=read('userTbl',$where2);
			include_once('sessionManeger.php');
			if($userTbl2==false){
				echo "<script>alert('erro ao realizar login');</script>";
			}else{
				loginSession($userTbl2[0]['idUser'],$userTbl2[0]['userName'],$userTbl2[0]['userComplete']);
				echo "<script>window.location.href = 'creatingAccount.php';</script>";
			}
			
			
			
		}
	
}

function finishCadastro(){

	if (isset($_POST["finalizar"])){
		$userId=$_SESSION["ID"];
		$campos = array("userComplete");
		$tabela="usertbl";
		$valores = array('1');
		$condition = "WHERE idUser=".$userId;
		$var=update($campos,$valores,$tabela,$condition);
		echo "<script>alert('finaloi ".$var."');</script>";
		loginSession($_SESSION["ID"],$_SESSION["User"],1);
		echo "<script>window.location.href = 'home.php';</script>";
	}
}




	

?>