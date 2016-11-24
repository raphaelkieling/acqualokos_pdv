<?php  
	//Deleta o banco de dados menos os logins
	include("conexao-admin.php");
	
	if(ResetarBanco($conexao))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}
?>
