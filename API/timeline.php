<?php

include_once('API/sessionManeger.php');
include_once('API/crud.php');



function load(){
	
	
	
	if(!(isset($_POST["counter"]))){
		initialLoad();
		
	}
	
	if(isset($_POST["counter"])){
			loadMore($_POST["counter"]);
		}
		
}

function initialLoad(){
		$topicos=json_decode($_SESSION['topics']);;
		$condition=' WHERE ';
		for($x = 0; $x <= count($topicos)-1; $x++){
			if($x<(count($topicos)-1)){
				$condition.="posttbl.topicPost='".$topicos[$x]."' OR ";
			}else{
				$condition.="posttbl.topicPost='".$topicos[$x]."' ";
			}
			
		}
		
		$posts=read('posttbl',$condition,1,[ 'usertbl.idUser','posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser'],5);
		if(is_array($posts)){
			for ($x = 0; $x <= count($posts)-1; $x++){
				echo "<a href='post.php?PID=".$posts[$x]['idPost']."'>";
				echo "<div style='border-style:solid;border-color:red;'>";
				echo ("idpost:".$posts[$x]['idPost']."<br>");
				echo ("<img src='".$posts[$x]['userImg']."' style='width:25%;'/><br>");
				echo ("<a href='profile.php?UID=".$posts[$x]['idUser']."'>username:".$posts[$x]['userName']."</a><br>");
				echo ("conteudo:".$posts[$x]['contentPost']."<br>");
				echo "</div>";
				echo "</a>";
			}
			return 5;
		}else{
			echo "não há nada para mostrar";

		}
	}
		
		
	
	
function loadMore($counter){
	
		$topicos=json_decode($_SESSION['topics']);;
		$condition=' WHERE ';
		for($x = 0; $x <= count($topicos)-1; $x++){
			if($x<(count($topicos)-1)){
				$condition.="posttbl.topicPost='".$topicos[$x]."' OR ";
			}else{
				$condition.="posttbl.topicPost='".$topicos[$x]."' ";
			}
			
		}
		$limit=5;
		$offset=$counter;
		$posts=read('posttbl','',1,[ 'usertbl.idUser', 'posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser'],$limit,$offset);
		if(is_array($posts)){
			for ($x = 0; $x <= count($posts)-1; $x++){
				echo "<a href='post.php?PID=".$posts[$x]['idPost']."'>";
				echo "<div style='border-style:solid;border-color:red;'>";
				echo ("idpost:".$posts[$x]['idPost']."<br>");
				echo ("<img src='".$posts[$x]['userImg']."' style='width:25%;'/><br>");
				echo ("<a href='profile.php?UID=".$posts[$x]['idUser']."'>username:".$posts[$x]['userName']."</a><br>");
				echo ("conteudo:".$posts[$x]['contentPost']."<br>");
				echo "</div>";
				echo "</a>";
			}
		
		}else{
			echo "cabo";
		}
		
		$offset+=$limit;
		
	
}	

function getPost(){
	if (isset($_GET["PID"])){
		$pid=$_GET["PID"];
		$tabela='posttbl';
		$condition='WHERE idPost='.$pid;
		
		$posts=read('posttbl',$condition,1,[ 'usertbl.idUser', 'posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser']);
		if($posts!=false){
			
			for ($x = 0; $x <= count($posts)-1; $x++){
				echo "<div style='border-style:solid;border-color:red;'>";
				echo ("idpost:".$posts[$x]['idPost']."<br>");
				echo ("<img src='".$posts[$x]['userImg']."' style='width:25%;'/><br>");
				echo ("<a href='profile.php?UID=".$posts[$x]['idUser']."'>username:".$posts[$x]['userName']."</a><br>");
				echo ("conteudo:".$posts[$x]['contentPost']."<br>");
				echo "</div>";
				
				echo ("<form  action='".$_SERVER['PHP_SELF']."?PID=".$_GET["PID"]."' method='post'>");
				echo "<textarea name='comment' id='comment'></textarea>";
				echo "<input type='submit' value='postar'/>";
				echo "</form>";
			}
			 getComentario($pid);
			
			
			{
			
			
			
			
			
			
			
			
		}
			
			
		}else{
			echo "post não encontrado";
		}
		
	}else{
		echo "especifique um post";
		
		
	}
	
}


function getComentario($postId){
	$condition='WHERE idPost='.$postId;
	$coment=read('comtbl',$condition,1,[ 'usertbl.idUser' ,'comtbl.idCom','usertbl.userImg','usertbl.userName','comtbl.contentCom'],['usertbl','usertbl.idUser','comtbl.idUser']);
	if(is_array($coment)){
		for ($x = 0; $x <= count($coment)-1; $x++){
			echo "<div style='border-style:solid;border-color:yellow;'>";
			echo ("idcom:".$coment[$x]['idCom']."<br>");
			echo ("<img src='".$coment[$x]['userImg']."' style='width:25%;'/><br>");
			echo ("<a href='profile.php?UID=".$coment[$x]['idUser']."'>username:".$coment[$x]['userName']."</a><br>");
			echo ("conteudo:".$coment[$x]['contentCom']."<br>");
			getSubComentario($coment[$x]['idCom']);
			echo "</div>";

			
			
		}
	}
	
}

function getSubComentario($comId){
	$condition='WHERE idTopCom='.$comId;
	$subcom=read('comtbl',$condition,1,[ 'usertbl.idUser' ,'comtbl.idCom','usertbl.userImg','usertbl.userName','comtbl.contentCom'],['usertbl','usertbl.idUser','comtbl.idUser']);
	if(is_array($subcom)){
		for ($x = 0; $x <= count($subcom)-1; $x++){
			echo "<div style='border-style:solid;border-color:yellow;background-color:green;'>";
			echo ("idsubcom:".$subcom[$x]['idCom']."<br>");
			echo ("<img src='".$subcom[$x]['userImg']."' style='width:25%;'/><br>");
			echo ("<a href='profile.php?UID=".$subcom[$x]['idUser']."'>username:".$subcom[$x]['userName']."</a><br>");
			echo ("conteudo:".$subcom[$x]['contentCom']."<br>");
			$formid=$comId;
			$btn = "<button onclick=\"showHiddenForm('subcom".$formid."')\">subcomentar</button>";
			echo $btn;
			echo ("<form style='display:none;' id=subcom".$comId." action='".$_SERVER['PHP_SELF']."?PID=".$_GET["PID"]."' method='post'>");
			echo "<input type='hidden' name='idsubcomment' value='".$comId."'></input>";
			echo "<textarea name='subcomment' id='comment'></textarea>";
			echo "<input type='submit' value='postar'/>";
			echo "</form>";
			echo "</div>";
			
		}
	}	


}

?>