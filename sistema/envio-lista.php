<?php
	include("conexao.php");

	$funcionarios = $_POST['n'];
	$documentos = $_POST['d'];
	
	$pontoVenda= $_POST['pontoVenda'];
	$localidade   = $_POST['localidade'];
		
	$responsavel= $_POST['responsavel'];
	$revendedor = $_POST['revendedor'];
		
	$data            = date('d/m/Y');

	
	for ($i = 0; $i <= 14; $i++) {
		if($funcionarios[$i]!=""){
			InserirListaRevendedor($conexao,$funcionarios,$documentos,$pontoVenda,$localidade,$responsavel,$revendedor,$data,$i);
		}
	}
	header("location:../criar-lista.php?erro-sucesso");
?>
