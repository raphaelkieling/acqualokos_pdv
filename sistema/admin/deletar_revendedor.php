<?php  
	//Deleta o banco de dados menos os logins
	include('../sistema/verificar_login_admin.php');
	include("conexao-admin.php");
	$id = $_GET['idRevendedorDelete'];

	if(DeletarRevendedor($conexao,$id))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}
?>
