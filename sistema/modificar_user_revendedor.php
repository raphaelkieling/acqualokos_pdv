<?php 
	include("conexao.php");

	$id = $_GET['id'];
	$nome = $_GET['nome'];
	$documento = $_GET['documento'];

	echo $id."<br>";
	echo $nome.$documento;
	modificaUserRevendedor($conexao,$id,$nome,$documento);
?>