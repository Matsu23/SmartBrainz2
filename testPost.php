<!DOCTYPE html>
<html>
<head>

<?php

include_once('API/sessionManeger.php');
include_once('API/content.php');
echo $_SESSION["User"];
createPost();
?>

<link rel='stylesheet' href='CSS/normalize.css'>
<link rel='stylesheet' href='CSS/bootstrap.min.css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="UTF-8">

</head>
<body>
	<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
		<textarea name='post' id='post'></textarea>
		<select name='topico'>
			<option value="port">Portugues</option>
			<option value="mat">Matematica</option>
			<option value="hist">Historia</option>
			<option value="geo">Geografia</option>
			<option value="bio">Biologia</option>
			<option value="fis">Fisica</option>
			<option value="qui">Quimica</option>
			<option value="ingl">Inglês</option>	  
		</select>
		<input type='submit' value='postar'/>
	</form>
	
</body>
</html>