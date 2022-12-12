<?php

include_once('sessionManeger.php');
include_once('crud.php');
include_once('perfil.php');


	load();




function load(){

	if(isset($_POST["load"])){
		if(!(isset($_POST["counter"]))){
			initialLoad();
			
		}
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
						echo " <div class='comment-count'>"."<a href='post.php?PID=".$posts[$x]['idPost']."'>".getCommentNumber($posts[$x]['idPost'])."</a></div>";
					echo "</div>";
					 
					echo " <div class='likes' onclick=\"like('".$posts[$x]['idPost']."','post','home.php')\">";
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
						echo " <div class='comment-count'>"."<a href='post.php?PID=".$posts[$x]['idPost']."'>".getCommentNumber($posts[$x]['idPost'])."</a></div>";
					echo "</div>";
					 
					echo " <div class='likes' onclick=\"like('".$posts[$x]['idPost']."','post','home.php')\">";
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
						echo " <div class='comment-count'>".getCommentNumber($pid)."</div>";
					echo "</div>";
					 
					echo " <div class='likes' onclick=\"like('".$posts[$x]['idPost']."','post','".$_SERVER['PHP_SELF']."?PID=".$pid."')\">";
						if(getLikes($posts[$x]['idPost'],'post')>0){
							echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='red' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";

						}else{
							echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";

						}
						echo " <div class='likes-count'>" .getPostLikes($pid)."</div>";
					echo "</div>";
				echo "</div>";
				echo ("<form class='text-center'  action='".$_SERVER['PHP_SELF']."?PID=".$pid."' method='post'>");
				echo "<textarea name='comment' id='comment' style='width:100%;border-style:none;background-color:rgb(230, 230, 230);resize:none'  placeholder='digite um comentário...'></textarea>";
				echo "<input type='hidden' name='postID' value='".$pid."'/>";
				echo "<input type='submit' value='postar'/>";
				echo "</form>";
				getComentario($pid);
				echo "</div>";
				
				
				
			}
			 
			
			
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
	$pid=$_GET["PID"];
	
	$condition='WHERE idPost='.$postId;
	$coment=read('comtbl',$condition,1,[ 'usertbl.idUser' ,'comtbl.idCom','usertbl.userImg','usertbl.userName','comtbl.contentCom'],['usertbl','usertbl.idUser','comtbl.idUser']);
	if(is_array($coment)){
		for ($x = 0; $x <= count($coment)-1; $x++){
			$formid=$coment[$x]['idCom'];
			echo "<div style='border-style:solid;border-color:gray;border-width:1px;' class='tweet-wrap' >";
					echo "<img src='".$coment[$x]['userImg']."' alt='' class='avator'>";
					echo " <div class='tweet-header-info'>";
						echo "<a href='profile.php?UID=".$coment[$x]['idUser']."'>";
						echo $coment[$x]['userName'];
						echo "</a>";
						echo "<span>Publicou um pensamento</span>. <span class='data' style='font-weight:normal;color:black;'>Data</span>";
						echo "<p>".$coment[$x]['contentCom']."</p>";
					echo "</div>";

				echo "<div class='tweet-info-counts'>";
					echo "<div class='comments' onclick=\"showHiddenForm('subcom".$formid."')\">";
						echo " <svg class='feather feather-message-circle sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z'></path></svg>";
						echo " <div class='comment-count'>".getSubCommentNumber($coment[$x]['idCom'])."</div>";
					echo "</div>";
					 
					echo " <div class='likes' onclick=\"like('".$coment[$x]['idCom']."','com','".$_SERVER['PHP_SELF']."?PID=".$pid."')\">";
					if(getLikes($coment[$x]['idCom'],'com')>0){
						echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='red' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";

					}else{
						echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";
					}
						echo " <div class='likes-count'>" .getComLikes($coment[$x]['idCom'])."</div>";
					echo "</div>";
				echo "</div>";
				echo ("<form style='display:none;' class='text-center' id=subcom".$formid." action='".$_SERVER['PHP_SELF']."?PID=".$pid."' method='post'>");
			echo "<input type='hidden' name='idsubcomment' value='".$formid."'></input>";
			echo "<textarea name='subcomment' id='comment' style='resize:none;background-color:rgb(230, 230, 230);width:100%;border-style:none;' placeholder='digite um comentario' class='w-100'></textarea>";
			echo "<input type='hidden' name='subcompostID' value='".$pid."'/>";
			echo "<input type='submit' value='postar'/>";
			echo "</form>";
					getSubComentario($coment[$x]['idCom']);
				echo "</div>";
						
			

			
			
		}
	}
	
}

function getSubComentario($comId){
	$pid=$_GET["PID"];
	$formid=$comId;
	$condition='WHERE idTopCom='.$comId;
	$subcom=read('comtbl',$condition,1,[ 'usertbl.idUser' ,'comtbl.idCom','usertbl.userImg','usertbl.userName','comtbl.contentCom'],['usertbl','usertbl.idUser','comtbl.idUser']);
	echo "<div class='tweet-wrap'>";
	if(is_array($subcom)){
		for ($x = 0; $x <= count($subcom)-1; $x++){
			
					echo "<img src='".$subcom[$x]['userImg']."' alt='' class='avator'>";
					echo " <div class='tweet-header-info'style='border-style:solid;border-color:gray;border-width:1px;'>";
						echo "<a href='profile.php?UID=".$subcom[$x]['idUser']."'>";
						echo $subcom[$x]['userName'];
						echo "</a>";
						echo "<span>Publicou um pensamento</span>. <span class='data' style='font-weight:normal;color:black;'>Data</span>";
						echo "<p>".$subcom[$x]['contentCom']."</p>";
					echo "</div>";

				echo "<div class='tweet-info-counts'>";
					
					 
					echo " <div class='likes' onclick=\"like('".$subcom[$x]['idCom']."','com','".$_SERVER['PHP_SELF']."?PID=".$pid."')\">";
					if(getLikes($subcom[$x]['idCom'],'com')>0){
						echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='red' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";

					}else{
						echo "<svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>";
					}
						echo " <div class='likes-count'>" .getComLikes($subcom[$x]['idCom'])."</div>";
					echo "</div>";
				echo "</div>";
		}
	}
			
		
			
			echo "</div>";
			
			
		}

		function getCommentNumber($postId){
			$group=$postId;
			$tabela="comtbl";
			$condition="WHERE idPost='".$postId."' ";
			$join=null;
			$select = ["COUNT(*)"];
			$group='idPost';
			$ComNumbers=read($tabela,$condition,$join,$select,null,null,null,$group);
			if($ComNumbers!=false){
				return $ComNumbers['0']['COUNT(*)']."+";

			}else{
				return "0";
			}
			

			/* */

		}

		function getSubCommentNumber($comId){
			$group=$comId;
			$tabela="comtbl";
			$condition="WHERE idTopCom='".$comId."' ";
			$join=null;
			$select = ["COUNT(*)"];
			$group='idTopCom';
			$ComNumbers=read($tabela,$condition,$join,$select,null,null,null,$group);
			if($ComNumbers!=false){
				return $ComNumbers['0']['COUNT(*)']."+";

			}else{
				return "0";
			}
			

			/* */

		}


		function getPostLikes($Id){
			$group=$Id;
			$tabela="liketbl";
			$condition="WHERE idPost='".$Id."' ";
			$join=null;
			$select = ["COUNT(*)"];
			$group='idPost';
			$ComNumbers=read($tabela,$condition,$join,$select,null,null,null,$group);
			if($ComNumbers!=false){
				return $ComNumbers['0']['COUNT(*)']."+";

			}else{
				return "0";
			}
			

			/* */

		}


		function getComLikes($Id){
			$group=$Id;
			$tabela="liketbl";
			$condition="WHERE idCom='".$Id."' ";
			$join=null;
			$select = ["COUNT(*)"];
			$group='idCom';
			$ComNumbers=read($tabela,$condition,$join,$select,null,null,null,$group);
			if($ComNumbers!=false){
				return $ComNumbers['0']['COUNT(*)']."+";

			}else{
				return "0";
			}
			

			/* */

		}
	




?>