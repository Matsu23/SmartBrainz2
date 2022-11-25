<!DOCTYPE html>
<html>
<head>

<?php

include_once('API/sessionManeger.php');
include_once('API/perfil.php');

alterDescription();
?>

<link rel='stylesheet' href='CSS/normalize.css'>
<link rel='stylesheet' href='CSS/bootstrap.min.css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="UTF-8">

</head>
<body>
	<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
		<input type='text' name='desc' id='desc'></input>
		<input type='submit' value='editarDesc'/>
	</form>
	
</body>
</html>