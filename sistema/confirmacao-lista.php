<?php
	include("conexao.php");

	$id = $_POST['id'];
	$lista_id = $_POST['lista_id'];
	//var_dump($id);
	if(!count($id)<=0){
		for($i=0;$i<=count($id);$i++){
			confimarListaRevendedor($conexao,$id,$lista_id,$i);
			//echo "<br>Enviado";
		}
		header("location:../revendedor_login_acess.php?erro-sucesso");
	}else{
		header("location:../revendedor_login_acess.php?erro");
	}
	
	
?>
