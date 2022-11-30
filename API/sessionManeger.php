
<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function testLogin(){	
	if(isset($_SESSION["User"]) && $_SESSION["creationComplete"]==1){
			 return true;
			 
		}
};

function loginSession($sessionIndex,$user,$creation,$topics=null){
	$_SESSION["ID"] = $sessionIndex;
	$_SESSION["User"] = $user;
	$_SESSION['creationComplete']=$creation;
	
	
};


function logOut(){
	session_destroy();
	header('location:/Index.php');
	
};



?>
