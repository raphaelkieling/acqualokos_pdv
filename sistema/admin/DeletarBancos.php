<?php  
	if(include("conexao-admin.php")){
		echo "Conectado";
	}
	
	if(ResetarBanco($conexao))
	{
		header("location:../../admin_login_acess.php?erro-sucesso");
	}

?>
