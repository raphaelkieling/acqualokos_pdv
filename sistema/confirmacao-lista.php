<?php
	include("conexao.php");

	$id = $_POST['id'];
	$lista = [];
	//var_dump($id);

	for($i=0;$i<=count($id);$i++){
		confimarListaRevendedor($conexao,$id,$i);
		//echo "<br>Enviado";
	}
?>
