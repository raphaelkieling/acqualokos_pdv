<?php  
	include("../conexao.php");

	function ResetarBanco($conexao)
	{
		$a = mysqli_query($conexao,"delete from banco_acqualokos");
		$g = mysqli_query($conexao,"delete from banco_global");
		$r = mysqli_query($conexao,"delete from banco_revendedor");
		$i = mysqli_query($conexao,"delete from banco_id_listas");

		if($a || $g || $r || $i)
		{
			return true;
		}else{
			return false;
		}
	}
	function ResetarLogins($conexao){
		 $n = mysqli_query($conexao,"delete from banco_nomes_revendedor");
		 $s = mysqli_query($conexao,"delete from banco_senhas");
		 if($n || $s)
		{
			return true;
		}else{
			return false;
		}
	}
	function PegarIdRevendedorNome($conexao)
	{
		$select = mysqli_query($conexao,"SELECT MAX(id) FROM banco_nomes_revendedor");
		while($final = mysqli_fetch_assoc($select)){
			return $final['MAX(id)'];
		}
	}
	function CriarRevendedor($conexao,$nome,$senha)
	{
		$senhaCriptografada = md5($senha);
		mysqli_query($conexao,"insert into banco_nomes_revendedor(nome) values('$nome')");
		$id = PegarIdRevendedorNome($conexao);
		if(!$senha == NULL){
			mysqli_query($conexao,"insert into banco_senhas(revendedor,senha,tipo_entrada) values('$id','$senhaCriptografada','1')");
		}
		
	}
?>