<?php
	//configuração geral
	include("database.php");
	date_default_timezone_set('America/Sao_Paulo');
//LOGAR no site
function logar($conexao,$senha,$tipo){ // Loga qualquer menos o revendedor pois o revendedor precisa de ID diferente
	$select = mysqli_query($conexao,"select * from banco_senhas where  senha='$senha' and tipo_entrada=$tipo");
	if(mysqli_fetch_row($select)>0){
		return true;
	}else{
		return false;
	}
}
function logarRevendedor($conexao,$revendedor,$senha,$tipo){
	$select         = mysqli_query($conexao,"select * from banco_senhas where revendedor=$revendedor and senha='$senha' and tipo_entrada=$tipo");
	if(mysqli_fetch_row($select)>0){
		return true;
	}else{
		return false;
	}
}
function pegarRevendedor($conexao,$senha,$revendedor){
	$select            = mysqli_query($conexao,"select revendedor from banco_senhas where senha='$senha' and revendedor");
	while($id_revendor = mysqli_fetch_assoc($select)){
		return $id_revendor['revendedor'];
	}
}
//Final do LOGAR no site

//REVENDEDOR acesso
function confimarListaRevendedor($conexao,$id,$lista_id,$i){ //confirma a lista que foi enviada para o revendedor
	mysqli_query($conexao,"insert into banco_acqualokos (nome,documento,ponto_venda,localidade,responsavel,revendedor,data,lista_id)select nome,documento,ponto_venda,localidade,responsavel,revendedor,data,lista_id from banco_revendedor where id=$id[$i]"); 
	mysqli_query($conexao,"delete from banco_revendedor where id=$id[$i]");

}
function InserirListaRevendedor($conexao,$funcionarios,$documentos,$pontoVenda,$localidade,$responsavel,$revendedor,$data,$lista_id,$i){
	//insere a lista na pagina do revendedor para que a lista que foi inserida possa ser usada depois na pagina dos funcioarios
	$inserido = mysqli_query($conexao,"insert into banco_revendedor(nome,documento,ponto_venda,localidade,responsavel,revendedor,data,lista_id) values ('$funcionarios[$i]','$documentos[$i]','$pontoVenda','$localidade','$responsavel','$revendedor','$data','$lista_id')");

	if($inserido){
		return true;
	}else{
		return false;
	}
}
function MostrarRevendedores($conexao)
{
	return mysqli_query($conexao,"select * from banco_nomes_revendedor");
}
//FIM revendedor acesso

//ACQUA LOKOS acesso
function BuscaListaAcqua($conexao,$lista_id){
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão.
	return mysqli_query($conexao,"select * from banco_acqualokos");
}
function confimarListaAcqua($conexao,$id,$lista_id,$i){
	//Confirma a lista de acqua lokos
	var_dump($id);
	echo $id[$i];
	$sql = "INSERT INTO banco_global(nome,documento,ponto_venda,localidade,responsavel,revendedor,data) SELECT nome,documento,ponto_venda,localidade,responsavel,revendedor,data from banco_acqualokos where id= $id[$i] and lista_id= $lista_id";

	echo "<small>".$i." = ".$sql."</small>";

	if(mysqli_query($conexao,$sql) or die(mysqli_error($conexao))){
		mysqli_query($conexao,"delete from banco_acqualokos where id=$id[$i]");
		mysqli_query($conexao,"delete from banco_id_listas where id=$lista_id");
		return true;
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
	return mysqli_query($conexao,"select banco_global.*,banco_nomes_revendedor.nome as NomeRevendedor from banco_global join banco_nomes_revendedor on banco_nomes_revendedor.nome = banco_global.id");
}
function BuscaListaGlobalPalavra($conexao,$palavra)
{
	return mysqli_query($conexao,"select * from banco_global where nome like '%$palavra%' ");
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
	$select = mysqli_query($conexao,"SELECT MAX(id) FROM banco_id_listas");
	while($final = mysqli_fetch_assoc($select)){
		return $final['MAX(id)']+1;
	}
}
function PegarIdUltimoPrimeiro($conexao)
{
	//usa-se quando o id de lista está nula ou seja a tabela nao tem nenhum insert
	$select = mysqli_query($conexao,"SELECT MAX(id) FROM banco_id_listas");
	while($final = mysqli_fetch_assoc($select)){
		return $final['MAX(id)'];
	}
}
function BuscaListaidRevendedor($conexao,$id_revendedor)
{
	return mysqli_query($conexao,"select * from banco_id_listas where revendedor=$id_revendedor");
}
function BuscaListaid($conexao)
{
	return mysqli_query($conexao,"select * from banco_id_listas");
}
function BuscaLista($conexao,$sessao_revendedor,$lista_id)
{
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão
	return mysqli_query($conexao,"select * from banco_revendedor where revendedor=$sessao_revendedor and lista_id=$lista_id");
}

?>
