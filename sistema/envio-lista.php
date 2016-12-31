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

	$file_log = fopen("admin/sistema.txt","a");
	$escreve = fwrite($file_log,"PDV = Ponto de venda criou uma lista em ". $data." às ".$hora.PHP_EOL);

	//contando o for para ver se tem funcionarios ou se nao foi mandando nenhum
	$contador_funcionarios =0;
	for ($i=0; $i <= 15; $i++) { 
		$funcionarioString  = trim($funcionarios[$i]);//Retirei os espaços para nao entrar errado se sem querer for apertado espaço
		if($funcionarioString!=""){
			$contador_funcionarios ++;
		}
	}

	if(PegarIdUltimo($conexao)==1){ //verifica se já foi posto alguma lista na tabela listas
		ListaUsada($conexao,$revendedor,$pontoVenda);
		$pego = true;
	}
	
	if($contador_funcionarios > 0){

		for ($i = 0; $i <= 15; $i++) {
			$funcionarioString  = trim($funcionarios[$i]);//Retirei os espaços para nao entrar errado se sem querer for apertado espaço
			if($funcionarioString!=""){
				if($pego==true){
					$lista_id = PegarIdUltimoPrimeiro($conexao);
				}else{
					$lista_id = PegarIdUltimo($conexao);
				}
				$escreve = fwrite($file_log,"PDV = Criou funcionario = ".$funcionarios[$i]." - ". $data." às ".$hora.PHP_EOL);
				InserirListaRevendedor($conexao,$funcionarios,$documentos,$pontoVenda,$localidade,$responsavel,$revendedor,$data,$lista_id,$i);
			}
		}

		if($pego != true){
			ListaUsada($conexao,$revendedor,$pontoVenda);
		}
	
		
		fclose($file_log);
		
		header("location:../criar-lista_acess.php?erro-sucesso-ponto-venda");

	}else{
		header("location:../criar-lista_acess.php?erro-lista");
	}
	

?>
