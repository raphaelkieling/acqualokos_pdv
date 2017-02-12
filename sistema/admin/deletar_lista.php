<?php  
	include('../sistema/verificar_login_admin.php');
	include("conexao-admin.php");

	$array_lista = $_GET['l'];
	var_dump($array_lista);
	try {
		foreach($array_lista as $array_l){
		ResetarLista($conexao,$array_l);
		}
		header("location:../../admin_login_lista_deleta.php?erro-sucesso");
	} catch (Exception $e) {
		header("location:../../admin_login_lista_deleta.php?erro");
	}
	
?>