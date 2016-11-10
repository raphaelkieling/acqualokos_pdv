<?php

	date_default_timezone_set('America/Sao_Paulo');
	$conexao = mysqli_connect("localhost","root","","acqualokos_revendedor");

//LOGAR no site
function logar($conexao,$senha,$tipo){ // Loga qualquer menos o revendedor pois o revendedor precisa de ID diferente
	$select         = mysqli_query($conexao,"select * from banco_senhas where  senha='$senha' and tipo_entrada=$tipo");
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
		echo $revendedor."---".$senha."---".$tipo;
	}
}
function pegarRevendedor($conexao,$senha){
	$select         = mysqli_query($conexao,"select revendedor from banco_senhas where senha='$senha'");
	while($id_revendor = mysqli_fetch_assoc($select)){
		return $id_revendor['revendedor'];
	}
}
//Final do LOGAR no site

//REVENDEDOR acesso
function BuscaLista($conexao,$sessao_revendedor){
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão
	return mysqli_query($conexao,"select * from banco_revendedor where revendedor=$sessao_revendedor");
}
function confimarListaRevendedor($conexao,$id,$i){
	mysqli_query($conexao,"insert into banco_acqualokos (nome,documento,ponto_venda,localidade,responsavel,revendedor,data)select nome,documento,ponto_venda,localidade,responsavel,revendedor,data from banco_revendedor where id=$id[$i]");
	mysqli_query($conexao,"delete from banco_revendedor where id=$id[$i]");
}
function InserirListaRevendedor($conexao,$funcionarios,$documentos,$pontoVenda,$localidade,$responsavel,$revendedor,$data,$i){
	mysqli_query($conexao,"insert into banco_revendedor(nome,documento,ponto_venda,localidade,responsavel,revendedor,data) values ('$funcionarios[$i]','$documentos[$i]','$pontoVenda','$localidade','$responsavel','$revendedor','$data')");
}
//FIM revendedor acesso
//ACQUA LOKOS acesso
function BuscaListaAcqua($conexao){
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão.
	return mysqli_query($conexao,"select * from banco_acqualokos order by revendedor");
}
function confimarListaAcqua($conexao,$id,$i){
	mysqli_query($conexao,"insert into banco_global (nome,documento,ponto_venda,localidade,responsavel,revendedor,data)select nome,documento,ponto_venda,localidade,responsavel,revendedor,data from banco_acqualokos where id=$id[$i]");
	mysqli_query($conexao,"delete from banco_acqualokos where id=$id[$i]");
}
//FIM acqualokoso acesso
//GLOBAL
function BuscaListaGlobal($conexao){
	//Busca a lista para colocar na parte de revendedores para que possa ser conferido os funcionarios que irão para o parque.
	//Busca pela sessão.
	return mysqli_query($conexao,"select * from banco_global order by id");
}
// fim GLOBAL
?>
