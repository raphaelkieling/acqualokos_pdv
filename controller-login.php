<?php
 	//LOGIN  do sistema, dou o md5 e depois comparo com a função logar se alguma daquelas senha são md5
	session_start();
	include("sistema/conexao.php");

	// if(isset($_POST['senha_total'])){//0 mesma que o acqua
	// 	$senha = md5($_POST['senha_total']);
	// 	if(logar($conexao,$senha,2)){
	// 		$_SESSION['acesso-total'] = "logado";
	// 		header("location:criar-lista.php");
	// 	}else{
	// 		header("location:index.php?erro");
	// 	}
	// }

	if(isset($_POST['revendedor_senha'])){//1 - REVENDEDOR
		$senha = md5($_POST['revendedor_senha']);
		$revendedor = $_POST['revendedor_nome'];
		if(logarRevendedor($conexao,$revendedor,$senha,1)){
			//$id_revendedor = pegarRevendedor($conexao,$senha); Redundante por o $revendedor já traz o id
			$_SESSION['acesso'] = $revendedor;

			header("location:revendedor_login_acess.php");
		}else{
			header("location:revendedor_login.php?erro-acesso");
		}
	}

	if(isset($_POST['acqua_senha'])){//2 - acqua_lokos
		$acqualokos =md5( $_POST['acqua_senha']);
		if(logar($conexao,$acqualokos,2)){
			header("location:acqualokos_login_acess.php");
			$_SESSION['acqua'] = 2;

		}else{
			header("location:acqualokos_login.php?erro-acesso");
		}
	}

	if(isset($_POST['admin_senha'])){ //3 - admin
		$admin         = md5($_POST['admin_senha']);
		if(logar($conexao,$admin,3)){
			$_SESSION['admin'] = 3;
			header("location:admin_login_acess.php");
		}else{
			header("location:admin_login.php?erro-acesso");
		}
	}
//global_senha
	if(isset($_POST['global_senha'])){ //4 - bilheteria
		$global         = md5($_POST['global_senha']);
		echo $global;
		if(logar($conexao,$global,4)){
			header("location:acesso_global_acess.php");
			$_SESSION['acesso-bilheteria'] = 4;

		}else{
			header("location:acesso_global.php?erro-acesso");
		}
	}

	if(isset($_POST['lista_senha'])){ //5 - lista
		$lista_senha = md5($_POST['lista_senha']);
		echo $lista_senha;
		if(logar($conexao,$lista_senha,5)){
			header("location:criar-lista_acess.php");
			$_SESSION['acesso-lista'] = 5;

		}else{
			header("location:criar-lista.php?erro-acesso");
		}
	}
?>
