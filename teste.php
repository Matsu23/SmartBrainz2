<!DOCTYPE html>
<html>
<head>

<?php
include_once('API/crud.php');
$table='libetbl';
$userid=1;
$id=2;
$result=delete( $table,"WHERE idUser='".$userid." AND idCom='".$id."'");
print_r($result);
?>


	
	
</body>
</html>