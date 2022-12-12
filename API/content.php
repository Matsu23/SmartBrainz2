<?php
include_once('crud.php');
include_once('sessionManeger.php');
like();
function like(){
	include_once('perfil.php');

	if (isset($_POST["like"])){
		$userId=$_SESSION["ID"];
		$id=$_POST["like"];
		$table="liketbl";
		
		
		if($_POST["tipo"]=='post'){
			$fields = array("idUser","idPost");
			$tipo='post';
			$values = array($userId,$id);
			if(getLikes($id,$tipo)==0){
				if((Create( $fields, $values, $table))==false){
				
				
				}else{
				
				}

			}else{
				echo "voce ja likou e agr vai deslikar";
				delete( $table,"WHERE idUser='".$userId."' AND idPost='".$id."'");

			}
			
			
		}else if($_POST["tipo"]=='com'){
			$fields = array("idUser","idCom");
			$tipo='com';
			$values = array($userId,$id);
			if(getLikes($id,$tipo)==0){
				if((Create( $fields, $values, $table))==false){
					
				
				}else{
				
				}

			}else{
				echo "voce ja likou e agr vai deslikar";
				delete( $table,"WHERE idUser='".$userId."' AND idCom='".$id."'");

			}

		}

			

	}
		


}





function createPost(){
	if (isset($_POST["post"])){
		$userId=$_SESSION["ID"];
		$post=$_POST["post"];
		$topic=$_POST["topico"];
		
		$fields = array("idUser","contentPost","topicPost");
		$table="posttbl";
		$values = array($userId,$post,$topic);
		if((Create( $fields, $values, $table))==false){
			
				
			
		}else{
			
			
		
		
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
		$PID=$_POST["postID"];;
		$values = array($userId,$comment,$idpost);
		if((Create( $fields, $values, $table))==false){
			
		}else{
			
			echo "<script>window.location.href = 'post.php?PID=".$PID."';</script>";
		}
		
	
	}
}

function createSubcomment(){
	if (isset($_POST["subcomment"])){
		$userId=$_SESSION["ID"];
		$subcomment=$_POST["subcomment"];
		$idcoment=$_POST["idsubcomment"];
		$fields = array("idUser","contentCom",'idTopCom');
		$table="comtbl";
		$PIDSC=$_POST["subcompostID"];
		$values = array($userId,$subcomment,$idcoment);
		if((Create( $fields, $values, $table))==false){
			
		}else{
			$_SESSION['lvl']=$_SESSION['lvl']+100;
			$_SESSION['exp']=$_SESSION['lvl']+1;
			
			echo "<script>window.location.href = 'post.php?PID=".$PIDSC."';</script>";
			
		}

	}
}



?>