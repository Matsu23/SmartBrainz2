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
		$posts=read('posttbl','',1,[ 'usertbl.idUser','posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser'],5);
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
	}
	
function loadMore($counter){
	
		
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
		print_r($posts);
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
			
			
			
			
		}else{
			echo "post não encontrado";
		}
		
	}else{
		echo "especifique um post";
		
		
	}
	
}

		
		
		
		
		

	
	
	


	

	

	
	
	






?>