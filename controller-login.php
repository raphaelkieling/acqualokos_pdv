<?php

 	//LOGIN  do sistema, dou o md5 e depois comparo com a função logar se alguma daquelas senha são md5;
	include("sistema/conexao.php");
	if(isset($_POST['admin_senha'])){ //3
		$admin         = md5($_POST['admin_senha']);
		if(logar($conexao,$admin,3)){
			header("location:admin_login_acess.php");
		}
	}
	
	if(isset($_POST['revendedor_senha'])){//1
		$revendedor = md5($_POST['revendedor_senha']);
		if(logar($conexao,$revendedor,1)){
			header("location:revendedor_login_acess.php");
		}
		
	}

	if(isset($_POST['acqua_senha'])){//2
		$acqualokos =md5( $_POST['acqua_senha']);
		if(logar($conexao,$acqualokos,2)){
			header("location:acqualokos_login_acess.php");
		}
	}

	function logar($conexao,$senha,$tipo){
		$select         = mysqli_query($conexao,"select * from banco_senhas where senha='$senha' and tipo_entrada=$tipo"); 
		if(mysqli_fetch_row($select)>0){
			return true;
		}
	}
?>