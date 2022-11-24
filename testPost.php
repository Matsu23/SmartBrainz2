<!DOCTYPE html>
<html>
<head>

<?php

include_once('API/sessionManeger.php');
include_once('API/postDiscussion.php');
echo $_SESSION["User"];
postDiscussion();
?>

<link rel='stylesheet' href='CSS/normalize.css'>
<link rel='stylesheet' href='CSS/bootstrap.min.css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="UTF-8">

</head>
<body>
	<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
		<textarea name='post' id='post'></textarea>
		<input type='submit' value='postar'/>
	</form>
	
</body>
</html>