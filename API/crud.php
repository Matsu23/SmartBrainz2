<?php
include_once('conectar.php');

function Executar($query){
	if($result=mysqli_query($GLOBALS['conexao'], $query)){
		 return $result;
	}else{
		echo "erro ao executar a query sql" . mysqli_error($GLOBALS['conexao']);
		return false;
	}
	
	
};


function Create(array $campos, array $valores, $tabela){
	
	$sql = "INSERT INTO $tabela (";

	for ($x = 0; $x <= count($campos)-1; $x++) {
			if($x<(count($campos)-1)){
				
				$sql .= $campos[$x].",";
				
			} else {
				$sql .= $campos[$x].")";
				
			}
	}
	
	
	
	$sql .= "\n VALUES(";
	for ($x = 0; $x <= count($valores)-1; $x++) {
			if($x<(count($valores)-1)){
				
				$sql .= "'".$valores[$x]."'".",";
				
			} else {
				$sql .= "'".$valores[$x]."'".");";
				
			}
	}
	
	
	return Executar($sql);
	
};


function read($tabela,$condition){
	$sql = "select * from ".$tabela." ".$condition.";";
	if (mysqli_num_rows(($queryResult=Executar($sql))) > 0) {
		/*return $rowsValue=mysqli_fetch_assoc($queryResult);*/
		$data = array();
		 while($row = mysqli_fetch_assoc($queryResult)){
			 $data[] = $row; 
		 }
		 return $data;
		echo "deu certo";
	}else{
		return false;
		echo "erere";
	}
	
}
	
	
function update(array $campos, array $valores, $tabela,$condition){
	$sql = "UPDATE $tabela \n";
	
	$sql .="SET ";
	for ($x = 0; $x <= count($campos)-1; $x++) {
			if($x<(count($campos)-1)){
				
				$sql .= $campos[$x]."='".$valores[$x]."',";
				
			} else {
				$sql .= $campos[$x]."='".$valores[$x]."'";
				
			}
		
	}
	$sql .= "\n ".$condition;
	print_r($sql);
	echo "<br>";
	return Executar($sql);
}


?>
