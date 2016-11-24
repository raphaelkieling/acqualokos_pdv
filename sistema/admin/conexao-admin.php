<?php  
	include("../conexao.php");

	function ResetarBanco($conexao)
	{
		$a = mysqli_query($conexao,"delete from banco_acqualokos");
		$g = mysqli_query($conexao,"delete from banco_global");
		$r = mysqli_query($conexao,"delete from banco_revendedor");
		$i = mysqli_query($conexao,"delete from banco_id_listas");

		if($a && $g && $r && $i)
		{
			return true;
		}else{
			return false;
		}
	}
	function ResetarLogins($conexao){
		 $n = mysqli_query($conexao,"delete from banco_nomes_revendedor");
		 $s = mysqli_query($conexao,"delete from banco_senhas");
		 if($n && $s)
		{
			return true;
		}else{
			return false;
		}
	}
	function PegarIdRevendedorNome($conexao)
	{
		$sql = "SELECT MAX(id) FROM banco_nomes_revendedor";
		if($select = mysqli_query($conexao,$sql)){
			while($final = mysqli_fetch_assoc($select)){
				return $final['MAX(id)'];
			}			
		}else{
			return false;
		}
	
	}
	function CriarRevendedor($conexao,$nome,$senha)
	{
		$senhaCriptografada = md5($senha);

		$sql ="insert into banco_nomes_revendedor(nome) values('$nome')"; //Insert no banco_nomes.
		if(mysqli_query($conexao,$sql))
		{
			if($id = PegarIdRevendedorNome($conexao)) //Gambiarra pra pegar qual foi o ultimo nome escrito.
			{
				if(!$senha == NULL){
					$sql = "insert into banco_senhas(revendedor,senha,tipo_entrada) values('$id','$senhaCriptografada','1')";
					if(mysqli_query($conexao,$sql))
					{
						return true;
					}
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function ModificarSenhaAcquaLokos($conexao,$senha)
	{
		$senhaCriptografada = md5($senha);
		$sql = "UPDATE banco_senhas SET senha='$senhaCriptografada' WHERE tipo_entrada=2";
		if(mysqli_query($conexao,$sql)){
			return true;
		}else{
			return false;
		}
	}
	function ModificarSenhaRevendedor($conexao,$senha,$id)
	{
		$senhaCriptografada = md5($senha);
		//echo $senhaCriptografada;
		//echo $senha;
		$sql = "UPDATE banco_senhas SET senha='$senhaCriptografada' WHERE revendedor=$id";
		if(mysqli_query($conexao,$sql)){
			return true;
		}else{
			return false;
		}
	}
	function ModificarSenhaBilheteria($conexao,$senha)
	{
		$senhaCriptografada = md5($senha);
		//echo $senhaCriptografada;
		//echo $senha;
		$sql = "UPDATE banco_senhas SET senha='$senhaCriptografada' WHERE tipo_entrada=4";
		if(mysqli_query($conexao,$sql)){
			return true;
		}else{
			return false;
		}
	}
?>