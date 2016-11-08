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
			mysqli_query($conexao,"insert into banco_revendedor(nome,documento,ponto_venda,localidade,responsavel,revendedor,data) values ('$funcionarios[$i]','$documentos[$i]','$pontoVenda','$localidade','$responsavel','$revendedor','$data')");
		}
	}
?>
<h1>certo</h1>
