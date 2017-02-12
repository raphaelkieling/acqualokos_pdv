<?php  
	//Modifica a senha do acqua lokos
	include('../sistema/verificar_login_admin.php');
	include("conexao-admin.php");
	
	$senha = $_GET['senhaAcqua'];

	if(ModificarSenhaAcquaLokos($conexao,$senha))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}

?>
