<?php
	include("conexao.php");

	$lista_id = $_GET['lista'];
		// mysqli_query($conexao,"delete from banco_id_listas where id=$lista_id"); DELETA lista do banco
		//ListaStatusConfirmada($conexao,$lista_id);
    Log_add($conexao,"AMBOS","Cancelada lista = ".$lista_id,$data,$ip);
	ListaStatusCancelada($conexao,$lista_id);
?>