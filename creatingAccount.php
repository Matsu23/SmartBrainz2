<!DOCTYPE html>
<html>
<head>

<?php

 
?>


<link rel='stylesheet' href='CSS/normalize.css'>
<link rel='stylesheet' href='CSS/bootstrap.min.css'>
<script defer src="JS/jquery.slim.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="UTF-8">
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<label>
			<input type="checkbox"  value="port" name="topicos">
			Portugues
		 </label>
		 <label>
			<input type="checkbox"  value="mat" name="topicos">
			Matematica
		 </label>
		 <label>
			<input type="checkbox"  value="hist" name="topicos">
			Historia
		 </label>
		 <label>
			<input type="checkbox"  value="geo" name="topicos">
			Geografia
		 </label>
		 <label>
			<input type="checkbox" value="bio" name="topicos">
			Biologia
		 </label>
		 <label>
			<input type="checkbox"  value="fis" name="topicos">
			Fisica
		 </label>
		 <label>
			<input type="checkbox"  value="qui" name="topicos">
			Quimica
		 </label>
		 <label>
			<input type="checkbox" value="ingl" name="topicos">
			Inglês
		 </label>
	</form>

</body>
</html>