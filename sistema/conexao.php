<?php
	//configuração geral
	include("database.php");
	date_default_timezone_set('America/Sao_Paulo');
//LOGAR no site
function logar($conexao,$senha,$tipo){ 
	// Loga qualquer menos o revendedor pois o revendedor precisa de ID diferente
	$sql = "SELECT * from banco_senhas where  senha='$senha' and tipo_entrada=$tipo";
	if($select  = mysqli_query($conexao,$sql))
	{
		if(mysqli_fetch_row($select)>0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}

}
function logarRevendedor($conexao,$revendedor,$senha,$tipo){
	// Loga com o revendedor pegando a senha , o id e o tipo para verificar se ele realmente é revendedor
	$sql = "SELECT * from banco_senhas where revendedor=$revendedor and senha='$senha' and tipo_entrada=$tipo";
	if($select        = mysqli_query($conexao,$sql))
	{
		if(mysqli_fetch_row($select )>0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}

}
//Não é preciso pegar o revendedor só pela senha, pois se a senhas estiverem iguais vai dar problema.
//function pegarRevendedor($conexao,$senha,$revendedor){
//	$sql = "SELECT revendedor from banco_senhas where senha='$senha' and revendedor";
//	if($SELECT = mysqli_query($conexao,$sql))
//	{
//		while($id_revendor = mysqli_fetch_assoc($SELECT)){
//			return $id_revendor['revendedor'];
//		}
//	}	
//}
//Final do LOGAR no site

//REVENDEDOR acesso
function confimarListaRevendedor($conexao,$id,$lista_id,$i){ //confirma a lista que foi enviada para o revendedor
	$sql = "insert into banco_acqualokos (nome,documento,ponto_venda,localidade,responsavel,revendedor,data,lista_id)SELECT nome,documento,ponto_venda,localidade,responsavel,revendedor,data,lista_id from banco_revendedor where id=$id[$i]";
	if(mysqli_query($conexao,$sql))
	{
		if(mysqli_query($conexao,"delete from banco_revendedor where id=$id[$i]"))
		{
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
	

}
function InserirListaRevendedor($conexao,$funcionarios,$documentos,$pontoVenda,$localidade,$responsavel,$revendedor,$data,$lista_id,$i){
	//insere a lista na pagina do revendedor para que a lista que foi inserida possa ser usada depois na pagina dos funcioarios
	$funcionario = addslashes($funcionarios[$i]); //tratar as aspas
	$documento   = addslashes($documentos[$i]);
	$pontoVenda  = addslashes($pontoVenda);
	$localidade  = addslashes($localidade);
	$responsavel = addslashes($responsavel);
	$revendedor  = addslashes($revendedor);

	$sql = "insert into banco_revendedor(nome,documento,ponto_venda,localidade,responsavel,revendedor,data,lista_id) values ('$funcionario','$documento','$pontoVenda','$localidade','$responsavel','$revendedor','$data','$lista_id')";
	
	$inserido = mysqli_query($conexao,$sql);
	echo $sql;
	if($inserido){
		return true;
	}else{
		return false;
	}
}
function MostrarRevendedores($conexao)
{
	// Mostra os nomes dos revendedores na tela de login e ciração de listas com o id vinculado
	$sql = "SELECT * from banco_nomes_revendedor";
	return mysqli_query($conexao,$sql);
}
//FIM revendedor acesso

//ACQUA LOKOS acesso
function BuscaListaAcqua($conexao,$lista_id){
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão.
	$sql = "SELECT * from banco_acqualokos where lista_id=$lista_id";
	return mysqli_query($conexao,$sql);
}
function confimarListaAcqua($conexao,$id,$lista_id,$i){
	//Confirma a lista de acqua lokos
	$sql = "INSERT INTO banco_global(nome,documento,ponto_venda,localidade,responsavel,revendedor,data) SELECT nome,documento,ponto_venda,localidade,responsavel,revendedor,data from banco_acqualokos where id= $id[$i] and lista_id= $lista_id";

	if(mysqli_query($conexao,$sql) or die(mysqli_error($conexao))){
		$sqlDelete = "delete from banco_acqualokos where id=$id[$i]";
		if(mysqli_query($conexao,$sqlDelete)){
			return true;
		}	
	}else{
		return false;
	}
	
}
//FIM acqualokoso acesso

//GLOBAL
function BuscaListaGlobal($conexao)
{
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão.
	return mysqli_query($conexao,"SELECT * from banco_global");
}
function BuscaListaGlobalPalavra($conexao,$palavra)
{
	return mysqli_query($conexao,"SELECT * from banco_global where nome like '%$palavra%' or documento like '%palavra%' ");
}
// fim GLOBAL

//listas para dividir sessões.
function ListaUsada($conexao,$revendedor){
	if(mysqli_query($conexao,"insert into banco_id_listas(lista,revendedor) values('usado','$revendedor')"))
	{
		return true;
	}else{
		return false;
	}
}
function PegarIdUltimo($conexao)
{
	//pega o ultimo id que foi usado na tabela banco_id_listas e coloca em uma variavel
	$sql = "SELECT MAX(id) FROM banco_id_listas";
	if($select  = mysqli_query($conexao,$sql))
	{
		while($final = mysqli_fetch_assoc($select)){
				return $final['MAX(id)']+1;
		}		
	}else{
		return false;
	}
	
}
function PegarIdUltimoPrimeiro($conexao)
{
	//usa-se quando o id de lista está nula ou seja a tabela nao tem nenhum insert
	$sql = "SELECT MAX(id) FROM banco_id_listas";
	if($select  = mysqli_query($conexao,$sql))
	{
		while($final = mysqli_fetch_assoc($select)){
			return $final['MAX(id)'];
		}		
	}else{
		return false;
	}

}
function BuscaListaidRevendedor($conexao,$id_revendedor)
{
	return mysqli_query($conexao,"SELECT * from banco_id_listas where revendedor=$id_revendedor");
}
function BuscaListaid($conexao)
{
	return mysqli_query($conexao,"SELECT * from banco_id_listas");
}
function BuscaLista($conexao,$sessao_revendedor,$lista_id)
{
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão
	return mysqli_query($conexao,"SELECT * from banco_revendedor where revendedor=$sessao_revendedor and lista_id=$lista_id");
}

?>
