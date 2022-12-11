<?php

include_once('sessionManeger.php');
include_once('crud.php');

load();


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
				echo "<div class='tweet-wrap'>";
				echo "<img src='".$posts[$x]['userImg']."' alt='' class='avator'>";
					echo " <div class='tweet-header-info'>";
					echo "<a href='profile.php?UID=".$posts[$x]['idUser']."'>";
					echo $posts[$x]['userName'];
					echo "</a>";
					echo "<span>Publicou um pensamento</span>. <span class='data' style='font-weight:normal;color:black;'>Data</span>";
					echo "<p>".$posts[$x]['contentPost']."</p>";
					echo "</div>";

				echo "<div class='tweet-info-counts'>";
					echo "<div class='comments'>";
						echo " <svg class='feather feather-message-circle sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z'></path></svg>";
						echo " <div class='comment-count'>"."<a href='post.php?PID=".$posts[$x]['idPost']."'>"."33</a></div>";
					echo "</div>";
					echo "<div class='retweets'>";
						echo " <svg class='feather feather-repeat sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><polyline points='17 1 21 5 17 9'></polyline><path d='M3 11V9a4 4 0 0 1 4-4h14'></path><polyline points='7 23 3 19 7 15'></polyline><path d='M21 13v2a4 4 0 0 1-4 4H3'></path></svg>";
						echo "<div class='retweet-count'>397</div>";
					echo "</div>";
					echo " <div class='likes'>";
						echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";
						echo " <div class='likes-count'>2.6k</div>";
					echo "</div>";
				echo "</div></div>";












				/* echo "<div style='border-style:solid;border-color:red;'>";
				echo ("idpost:".$posts[$x]['idPost']."<br>");
				echo ("<img src='".$posts[$x]['userImg']."' style='width:25%;'/><br>");
				echo ("<a href='profile.php?UID=".$posts[$x]['idUser']."'>username:".$posts[$x]['userName']."</a><br>");
				echo ("conteudo:".$posts[$x]['contentPost']."<br>");
				echo "</div>";*/
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