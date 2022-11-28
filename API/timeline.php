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
	
	/*if($_POST["counter"]){
		loadMore($_POST["counter"]);
	}*/
	





/*function loadMore(){
	if(isset($_POST["teste"])){
		echo "fetch enviado";
		echo $_POST["teste"];
		
	}
	
}*/

function initialLoad(){
		$posts=read('posttbl','',1,[ 'posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser'],5);
		for ($x = 0; $x <= count($posts)-1; $x++){
			echo "<div style='border-style:solid';border-color:red;>";
			echo ("idpost:".$posts[$x]['idPost']."<br>");
			echo ("<img src='".$posts[$x]['userImg']."' style='width:25%;'/><br>");
			echo ("username:".$posts[$x]['userName']."<br>");
			echo ("conteudo:".$posts[$x]['contentPost']."<br>");
			echo "</div>";
			
		}
		return 5;
	}
	
function loadMore($counter){
	
		
		$limit=5;
		$offset=$counter;
		$posts=read('posttbl','',1,[ 'posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser'],$limit,$offset);
		if(is_array($posts)){
			for ($x = 0; $x <= count($posts)-1; $x++){
				echo "<div style='border-style:solid';border-color:red;>";
				echo ("idpost:".$posts[$x]['idPost']."<br>");
				echo ("<img src='".$posts[$x]['userImg']."' style='width:25%;'/><br>");
				echo ("username:".$posts[$x]['userName']."<br>");
				echo ("conteudo:".$posts[$x]['contentPost']."<br>");
				echo "</div>";
			
			}
		
		}else{
			echo "cabo";
		}
		
		$offset+=$limit;
		
	
}	

/*
function load(){
	
	$offset=initialLoad();
	if($offset==5){
		$posts=read('posttbl','',1,[ 'posttbl.idPost','usertbl.userImg','usertbl.userName','posttbl.contentPost'],['usertbl','usertbl.idUser','posttbl.idUser'],5,$offset);
		for ($x = 0; $x <= count($posts)-1; $x++){
			echo "<div style='border-style:solid';border-color:red;>";
			echo ("idpost:".$posts[$x]['idPost']."<br>");
			echo ("<img src='".$posts[$x]['userImg']."' style='width:25%;'/><br>");
			echo ("username:".$posts[$x]['userName']."<br>");
			echo ("conteudo:".$posts[$x]['contentPost']."<br>");
			echo "</div>";
			
		}
	
	
	}
	
}
	
	
*/	
		
		
		
		
		

	
	
	


	

	

	
	
	






?>