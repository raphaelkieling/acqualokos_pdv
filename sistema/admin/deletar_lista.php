<?php  
include("conexao-admin.php");

$id = $_GET['idLista'];

if(ResetarLista($conexao,$id))
{
	header("location:../../admin_login_acess.php?erro-sucesso");
}else{
	header("location:../../admin_login_acess.php?erro");
}
?>