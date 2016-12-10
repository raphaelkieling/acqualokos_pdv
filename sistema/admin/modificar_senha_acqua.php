<?php  
	//Modifica a senha do acqua lokos
	include("conexao-admin.php");
	
	$senha = $_GET['senhaAcqua'];

	if(ModificarSenhaAcquaLokos($conexao,$senha))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}
?>
