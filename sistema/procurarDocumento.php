<?php
	//adicionar +1 no funcionario que veio ao parque
	include("conexao.php");

	$documento = $_GET['documento'];

	if(procurarDocumentoIndex($conexao,$documento)){
		header("location:../index.php?cadastrado=1/#documento");
	}else{
		header("location:../index.php?cadastrado=0/#documento");
	}
?>