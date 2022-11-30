<!DOCTYPE html>
<html>
<head>

<?php
include_once('API/crud.php');
$var=read('userTbl',"WHERE userMail = 'mail@teste2.com' AND userPassword = 'senhateste';");
print_r($var);
?>


<link rel='stylesheet' href='CSS/normalize.css'>
<link rel='stylesheet' href='CSS/bootstrap.min.css'>
<script defer src="JS/jquery.slim.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="UTF-8">
<script src='JS/contentLoad.js'>
	</script>
</head>
<body>
<div id='result' style='border-style:solid;border-color:red;'>
</div>
<div id='end'></div>
	
	
</body>
</html>