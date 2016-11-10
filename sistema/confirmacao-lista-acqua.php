<?php
	include("conexao.php");

	$id = $_POST['id'];
	//var_dump($id);

	for($i=0;$i<=count($id);$i++){
		confimarListaAcqua($conexao,$id,$i);
		//echo "<br>Enviado";
	}
	header("location:../acqualokos_login_acess.php?erro-sucesso");
?>
