<?php  
	//Modifica senha do revendedor
	include("conexao-admin.php");
	
	$id    = $_GET['idRevendedor'];
	$senha = $_GET['senhaRevendedor'];

	if(ModificarSenhaRevendedor($conexao,$senha,$id))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}

?>
