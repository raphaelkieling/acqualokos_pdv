<?php  
	//Modifica a senha da Lista
	include("conexao-admin.php");
	
	$senha = $_GET['senhaLista'];

	if(ModificarSenhaLista($conexao,$senha))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}else{
		header("location:../../admin_login_acess.php?erro");
	}

?>
