<?php
 $ip = getenv("REMOTE_ADDR");
 date_default_timezone_get('America/Sao_Paulo');

 $data = date("d.m.y");
 $hora = date("H:i:s"); 

 //configuração geral
 include("database.php");

//LOGAR
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

//REVENDEDOR
function confirmarListaRevendedor($conexao,$id,$lista_id,$i){ //confirma a lista que foi enviada para o revendedor
	$sql = "insert into banco_acqualokos (nome,documento,ponto_venda,localidade,responsavel,revendedor,data,lista_id)SELECT nome,documento,ponto_venda,localidade,responsavel,revendedor,data,lista_id from banco_revendedor where id=$id[$i]";
	if(mysqli_query($conexao,$sql))
	{
		echo $sql;
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
function MostrarRevendedores($conexao){
	// Mostra os nomes dos revendedores na tela de login e ciração de listas com o id vinculado
	$sql = "SELECT * from banco_nomes_revendedor order by nome";
	return mysqli_query($conexao,$sql);
}

//ACQUA LOKOS
function NotificacaoAcqua($conexao){
	$esperando  = 0;
	$aceita     = 0;
	$cancelado  = 0;

	$sql = "select count(*) from banco_id_listas where status=0";
	$select = mysqli_query($conexao,$sql);
	while($sl = mysqli_fetch_assoc($select))
	{
		$esperando = $sl['count(*)'];
	}

	$sql_u = "select count(*) from banco_id_listas where status=1";
	$select_u = mysqli_query($conexao,$sql_u);
	while($sl_u = mysqli_fetch_assoc($select_u))
	{
		$aceita = $sl_u['count(*)'];
	}

	$sql_c = "select count(*) from banco_id_listas where status=2";
	$select_c = mysqli_query($conexao,$sql_c);
	while($sl_c = mysqli_fetch_assoc($select_c))
	{
		$cancelado = $sl_c['count(*)'];
	}

	$notifica = array(
		"esperando" => $esperando,
		"aceita"    =>$aceita,
		"cancelado" =>$cancelado
	);
	return $notifica;
}
function BuscaListaAcqua($conexao,$lista_id){
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão.
	$sql = "SELECT banco_acqualokos.*, banco_nomes_revendedor.id as idr,banco_nomes_revendedor.nome as nomer from banco_acqualokos join banco_nomes_revendedor on banco_acqualokos.revendedor = banco_nomes_revendedor.id where lista_id=$lista_id";
	return mysqli_query($conexao,$sql);
}
function confirmarListaAcqua($conexao,$id,$lista_id,$i){
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


//GLOBAL
function BuscaListaGlobal($conexao){
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão.
	$sql = "SELECT banco_global.*, banco_nomes_revendedor.id as idr,banco_nomes_revendedor.nome as nomer from banco_global join banco_nomes_revendedor on banco_global.revendedor = banco_nomes_revendedor.id ORDER BY banco_global.data desc limit 10";
	return mysqli_query($conexao,$sql);

}
function BuscaListaGlobalPalavra($conexao,$palavra){
	return mysqli_query($conexao,"SELECT banco_global.*,banco_global.ponto_venda, banco_nomes_revendedor.id as idr,banco_nomes_revendedor.nome as nomer from banco_global join banco_nomes_revendedor on banco_global.revendedor = banco_nomes_revendedor.id where banco_global.nome like '%$palavra%' or banco_global.documento like '%$palavra%' or banco_nomes_revendedor.nome like '%$palavra%' or banco_global.ponto_venda like '%$palavra%' ORDER BY banco_global.data desc limit 10");

}
function addVeio($conexao,$id,$veio){
	$veio +=1;
	if(mysqli_query($conexao,"update banco_global set veio=$veio where id=$id"))
	{
		return true;
	}else{
		return false;
	}
}
function modificaUserAcqua($conexao,$id,$nome,$documento){
	mysqli_query($conexao,"UPDATE `banco_acqualokos` SET nome='$nome',documento='$documento' WHERE id=$id");
}
function modificaUserRevendedor($conexao,$id,$nome,$documento){
	mysqli_query($conexao,"UPDATE `banco_revendedor` SET nome='$nome',documento='$documento' WHERE id=$id");
}

//LISTAS (que dividem as listas).
function ListaUsada($conexao,$revendedor,$pontoVenda)
{
	// Insere a lista no banco de dados para ser visivel tanto para o acqua quando para o revendedor
	$sql = "insert into banco_id_listas(lista,revendedor,p_venda,status) values('usado','$revendedor','$pontoVenda','0')";
	if(mysqli_query($conexao,$sql))
	{
		return true;
	}else{
		return false;
	}
}
function PegarIdUltimoListaRevendedor($conexao)
{
	//pega o ultimo id que foi usado na tabela banco_revendedor e coloca em uma variavel
	$sql = "SELECT MAX(lista_id) FROM banco_revendedor";
	if($select  = mysqli_query($conexao,$sql))
	{
		while($final = mysqli_fetch_assoc($select)){
				return $final['MAX(lista_id)'];
		}		
	}else{
		return false;
	}
	
}
function ListaStatusConfirmada($conexao,$id_lista)
{
	$sql = "UPDATE `banco_id_listas` set status=1 WHERE id=$id_lista";
	if(mysqli_query($conexao,$sql))
	{
		return true;
	}else{
		return false;
	}
}
function ListaStatusCancelada($conexao,$id_lista)
{
	// 0 Pendente
	// 1 Confirmada
	// 2 Cancelada
	$sql = "UPDATE `banco_id_listas` set status=2 WHERE id=$id_lista";
	if(mysqli_query($conexao,$sql))
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
	return mysqli_query($conexao,"SELECT banco_id_listas.*, banco_nomes_revendedor.id as idr,banco_nomes_revendedor.nome as nomer from banco_id_listas join banco_nomes_revendedor on banco_id_listas.revendedor = banco_nomes_revendedor.id where revendedor=$id_revendedor");
}
function BuscaListaid($conexao)
{
	return mysqli_query($conexao,"SELECT banco_id_listas.*, banco_nomes_revendedor.id as idr,banco_nomes_revendedor.nome as nomer from banco_id_listas join banco_nomes_revendedor on banco_id_listas.revendedor = banco_nomes_revendedor.id");
}
function BuscaLista($conexao,$sessao_revendedor,$lista_id)
{
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão
	return mysqli_query($conexao,"SELECT banco_revendedor.*, banco_nomes_revendedor.id as idr,banco_nomes_revendedor.nome as nomer from banco_revendedor join banco_nomes_revendedor on banco_revendedor.revendedor = banco_nomes_revendedor.id where revendedor=$sessao_revendedor and lista_id=$lista_id");
}
function BuscaListaPDV($conexao,$lista_id)
{
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão
	return mysqli_query($conexao,"SELECT banco_revendedor.*, banco_nomes_revendedor.id as idr,banco_nomes_revendedor.nome as nomer from banco_revendedor join banco_nomes_revendedor on banco_revendedor.revendedor = banco_nomes_revendedor.id where lista_id=$lista_id");
}
//Sistema de INDEX
function procurarDocumentoIndex($conexao,$documento)
{
	$select = mysqli_query($conexao,"select * from banco_global where documento=$documento");
	if(mysqli_fetch_row($select) > 0)
	{
		return true;
	}else{
		return false;
	}
}

//LOG
function Log_add($conexao,$nome,$descricao,$data,$ip){
  $sql = "insert into banco_log(nome,descricao,data,ip) values('$nome','$descricao','$data','$ip')";
  if(mysqli_query($conexao,$sql))
  {
    return true;
  }else{
    return false;
  }
  
}
function Log_view($conexao,$itensAtuais,$filtro,$descricao){
	if($filtro == 1)
	{
		return mysqli_query($conexao,"select * from banco_log order by id desc limit $itensAtuais");
	}else if($filtro == 2){
		return mysqli_query($conexao,"select * from banco_log where nome='Revendedor' and descricao like '%$descricao%' order by id desc limit $itensAtuais");
	}else if($filtro == 3){
		return mysqli_query($conexao,"select * from banco_log where nome='AcquaLokos' and descricao like '%$descricao%' order by id desc limit $itensAtuais");
	}else if($filtro == 4){
		return mysqli_query($conexao,"select * from banco_log where nome='PDV' and descricao like '%$descricao%' order by id desc limit $itensAtuais");
	}
	else if($filtro == 5){
		return mysqli_query($conexao,"select * from banco_log where nome='Bilheteria' and descricao like '%$descricao%' order by id desc limit $itensAtuais");
	}
}
function Log_all($conexao){
  $result = mysqli_query($conexao,"SELECT * FROM banco_log");
  $num_rows = mysqli_num_rows($result); 
  return $num_rows;
}
?>
