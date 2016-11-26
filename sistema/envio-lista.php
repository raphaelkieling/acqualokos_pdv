<?php
	include("conexao.php");

	$funcionarios = $_POST['n'];
	$documentos = $_POST['d'];
	
	$pontoVenda= $_POST['pontoVenda'];
	$localidade   = $_POST['localidade'];
		
	$responsavel= $_POST['responsavel'];
	$revendedor = $_POST['revendedor'];
		
	$data            = date('d/m/Y');

	$pego = false; 

	if(PegarIdUltimo($conexao)==1){
		ListaUsada($conexao,$revendedor);
		$pego = true;
	}


	for ($i = 0; $i <= 14; $i++) {
		if($funcionarios[$i]!=""){
			if($pego==true){
				$lista_id = PegarIdUltimoPrimeiro($conexao);
			}else{
				$lista_id = PegarIdUltimo($conexao);
			}
			InserirListaRevendedor($conexao,$funcionarios,$documentos,$pontoVenda,$localidade,$responsavel,$revendedor,$data,$lista_id,$i);
		}
	}
	if($pego != true){
		ListaUsada($conexao,$revendedor);
	}
	header("location:../criar-lista_acess.php?erro-sucesso-ponto-venda");
	

?>
