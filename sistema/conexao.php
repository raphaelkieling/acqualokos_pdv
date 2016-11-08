<?php
	$conexao = mysqli_connect("localhost","root","","acqualokos_revendedor");

//LOGAR no site
function logar($conexao,$senha,$tipo){ // Loga qualquer menos o revendedor pois o revendedor precisa de ID diferente
	$select         = mysqli_query($conexao,"select * from banco_senhas where  senha='$senha' and tipo_entrada=$tipo");
	if(mysqli_fetch_row($select)>0){
		return true;
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
	return mysqli_query($conexao,"select * from banco_revendedor where revendedor=$sessao_revendedor");
}
//FIM revendedor acesso
?>
