<?php  
	//Cadastra um revendedor
	include("conexao-admin.php");
	
	$nome  = $_GET['nome']; 
	$senha = $_GET['senha'];

	if(CriarRevendedor($conexao,$nome,$senha))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}

?>
