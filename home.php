<!DOCTYPE html>
<html>
<head>

<?php
include_once('API/timeline.php');
load();
 echo "<script>alert('".$_SESSION["User"]."')</script>";
 echo "<script>alert('".$_SESSION["topics"]."')</script>";
 echo "<script>alert('".$_SESSION["creationComplete"]."')</script>";
 print_r($_SESSION["creationComplete"]);
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