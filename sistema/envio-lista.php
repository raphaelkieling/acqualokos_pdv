<?php
	include("conexao.php");

	$funcionarios = $_POST['n'];
	$documentos   = $_POST['d'];
	$pontoVenda   = $_POST['pontoVenda'];
	$localidade   = $_POST['localidade'];
	$responsavel  = $_POST['responsavel'];
	$revendedor   = $_POST['revendedor'];
	$data         = date('d/m/Y');
	$pego         = false; 

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
				if(!InserirListaRevendedor($conexao,$funcionarios,$documentos,$pontoVenda,$localidade,$responsavel,$revendedor,$data,$lista_id,$i))
                    {
                        header("location:../criar-lista_acess.php?erro-lista");
                        Log_add($conexao,"PDV","Erro ao enviar a lista ".$lista_id,$data,$ip);  
                    }
			}
		}
          Log_add($conexao,"PDV","Cadastrou a lista ".$lista_id." com ".$contador_funcionarios." funcionários",$data,$ip);

		if($pego != true){
			ListaUsada($conexao,$revendedor,$pontoVenda);
		}
	
		
		header("location:../criar-lista_acess.php?erro-sucesso-ponto-venda");

	}else{
		header("location:../criar-lista_acess.php?erro-lista");
	}
	

?>
