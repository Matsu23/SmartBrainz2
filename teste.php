<!DOCTYPE html>
<html>
<head>

<?php
include_once('API/crud.php');
$table='libetbl';
$userid=1;
$id=2;
$result=readUnion('SELECT contentPost FROM posttbl UNION SELECT contentQuest FROM questtbl');
print_r($result);
?>


	
	
</body>
</html>