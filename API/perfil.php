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
		
		
	}
	
}

function alterImg(){
	include_once('sessionManeger.php');
	if (isset($_POST["upload"])){
		$target_dir = "./UserData/".$_SESSION["User"]."/avatar.png";
		 if (move_uploaded_file($_FILES["imgUp"]["tmp_name"], $target_dir)){
			 
			 $_SESSION['avatar']="./UserData/".$_SESSION["User"]."/avatar.png";
		 }else{
			
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
			return $profile;
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
			
				
			
		}else{
			if(mkdir('./UserData/'.$name)) {
				copy('./UserData/Default/avatar.png','UserData/'.$name.'/avatar.png' );
			

				
			}
		
			
			$data = array($mail,$pass,'UserData/'.$name.'/avatar.png');
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
				
			}else{
				include_once('sessionManeger.php');
				loginSession($userTbl[0]['idUser'],$userTbl[0]['userName'],$userTbl[0]['userComplete'],$userTbl[0]['userImg'],$userTbl[0]['userLevel'],$userTbl[0]['userExp']);
				$_SESSION['topics']=getTopicos();
				$_SESSION['likes']=getLikes();
				}
		}
		if (isset($_POST["userCadastro"]) && !isset($_POST["mail"])){
			$info=cadastro();
			print_r($info);
			$where2="WHERE userMail = '".$info[0]."' AND userPassword = '".$info[1]."';";
			$userTbl2=read('userTbl',$where2);
			include_once('sessionManeger.php');
			if($userTbl2==false){
				
			}else{
				loginSession($userTbl2[0]['idUser'],$userTbl2[0]['userName'],$userTbl2[0]['userComplete'],$userTbl2[0]['userImg'],$userTbl2[0]['userLevel'],$userTbl2[0]['userExp']);
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
		
		$avataradress= "/UserData/".$_SESSION["User"]."/avatar.png";
		loginSession($_SESSION["ID"],$_SESSION["User"],1,$avataradress);
		echo "<script>window.location.href = 'home.php';</script>";
	}
}

function getLikes($id=null,$tipo=null){
	$userid = $_SESSION["ID"];
	$tabela='liketbl';
	if($id==null){
		$condition = "WHERE idUser='".$userid."'";

	}else{
		if($tipo=='post'){
			$condition = "WHERE idUser='".$userid."' AND idPost='".$id."'";

		}
		if($tipo=='com'){
			$condition = "WHERE idUser='".$userid."' AND idCom='".$id."'";
		}

	}
	$likes=read($tabela,$condition,0,null,null,null,null,null);
	if($likes!=false){
		return $likes;

	}else{
		return false;

	}
	
}

function getProfileActivity($id){
	$condition="WHERE usertbl.idUser='".$id."'";
	$posts=read('posttbl',$condition,1,[ 'usertbl.idUser','posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser']);
	
		if(is_array($posts)){
			for ($x = 0; $x <= count($posts)-1; $x++){
				
				echo "<a href='post.php?PID=".$posts[$x]['idPost']."'>";
				echo "<div class='tweet-wrap'>";
				echo "<img src='".$posts[$x]['userImg']."' alt='' class='avator'>";
					echo " <div class='tweet-header-info'>";
					echo "<a href='profile.php?UID=".$posts[$x]['idUser']."'>";
					echo $posts[$x]['userName'];
					echo "</a>";
					echo "<span>Publicou um pensamento</span>.   ";
					echo "<p>".$posts[$x]['contentPost']."</p>";
					echo "</div>";

				echo "<div class='tweet-info-counts'>";
					echo "<div class='comments'>";
						echo " <svg class='feather feather-message-circle sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z'></path></svg>";
						echo " <div class='comment-count'>"."<a href='post.php?PID=".$posts[$x]['idPost']."'>".getCommentNumber($posts[$x]['idPost'])."</a></div>";
					echo "</div>";
					
					echo " <div class='likes' onclick=\"like('".$posts[$x]['idPost']."','post','".$_SERVER['PHP_SELF']."?UID=".$_GET["UID"]."')\">";
						if(getLikes($posts[$x]['idPost'],'post')>0){
							echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='red' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";

						}else{
							echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";

						}
						
						
						echo " <div class='likes-count'>" .getPostLikes($posts[$x]['idPost'])."</div>";
					echo "</div>";
				echo "</div></div>";
				echo "</a>";
			}


}}






	

?>