<?php  
	//Modifica a senha da Bilheteria
	include("conexao-admin.php");
	
	$senha = $_GET['senhaBilheteria'];

	if(ModificarSenhaBilheteria($conexao,$senha))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}

?>
