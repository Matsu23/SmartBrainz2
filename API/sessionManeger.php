
<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function testLogin(){	
	if(isset($_SESSION["User"]) && $_SESSION["creationComplete"]==1){
			 return "finished";
			 
		}else if(isset($_SESSION["User"]) && $_SESSION["creationComplete"]==0){
			return "creating";
		}else if(!(isset($_SESSION["User"]))){
			return false;

		}
};

function loginSession($sessionIndex,$user,$creation){
	$_SESSION["ID"] = $sessionIndex;
	$_SESSION["User"] = $user;
	$_SESSION['creationComplete']=$creation;
	
	
};


function logOut(){
	session_destroy();
	header('location:/Index.php');
	
};



?>
