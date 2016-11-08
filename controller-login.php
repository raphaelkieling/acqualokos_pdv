<?php

 	//LOGIN  do sistema, dou o md5 e depois comparo com a função logar se alguma daquelas senha são md5;
	include("sistema/conexao.php");
	
	if(isset($_POST['revendedor_senha'])){//1
		$senha = md5($_POST['revendedor_senha']);
		$revendedor = $_POST['revendedor_nome'];
		if(logarRevendedor($conexao,$revendedor,$senha,1)){
			$id_revendedor = pegarRevendedor($conexao,$senha);
			session_start();
			$_SESSION['acesso'] = $id_revendedor;
			header("location:revendedor_login_acess.php");
		}else{
			header("location:revendedor_login.php?erro");
		}
	}

	if(isset($_POST['acqua_senha'])){//2
		$acqualokos =md5( $_POST['acqua_senha']);
		if(logar($conexao,$acqualokos,2)){
			header("location:acqualokos_login_acess.php");
		}else{
			header("location:acqualokos_login.php?erro");
		}
	}

	if(isset($_POST['admin_senha'])){ //3
		$admin         = md5($_POST['admin_senha']);
		if(logar($conexao,$admin,3)){
			header("location:admin_login_acess.php");
		}else{
			header("location:admin_login.php?erro");
		}
	}

?>
