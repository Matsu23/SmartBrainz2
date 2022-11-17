<?php
include('conectar.php');

function Executar($query){
	if($result=mysqli_query($GLOBALS['conexao'], $query)){
		 return $result;
	}else{
		echo "erro ao executar a query sql" . mysqli_error($GLOBALS['conexao']);
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
	
	
	Executar($sql);
	return 0;
};


function read($tabela,$condition){
	$sql = "select * from ".$tabela." ".$condition.";";
	if (mysqli_num_rows(($queryResult=Executar($sql))) > 0) {
		return $rowsValue=mysqli_fetch_assoc($queryResult);
		echo "deu certo";
	}else{
		return false;
		echo "erere";
	}
	
}
	
	



?>
