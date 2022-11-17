<?php
$serverDB = "localhost";
$userDB = "root";
$senhaDB = "senha123";
$DB = "smartbrainz";


global $conexao;
$conexao = mysqli_connect($serverDB, $userDB, $senhaDB, $DB);

if (!$conexao) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
