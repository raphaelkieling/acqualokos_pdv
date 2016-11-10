<?php
	include("conexao.php");

	$id = $_POST['id'];
	//var_dump($id);

	for($i=0;$i<=count($id);$i++){
		confimarListaRevendedor($conexao,$id,$i);
		//echo "<br>Enviado";
	}
	header("location:../revendedor_login_acess.php?erro-sucesso");
?>
