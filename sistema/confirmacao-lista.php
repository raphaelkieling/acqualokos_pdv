<?php
	include("conexao.php");

	$id = $_POST['id'];
	//var_dump($id);
	if(!count($id)<=0){
		for($i=0;$i<=count($id);$i++){
			confimarListaRevendedor($conexao,$id,$i);
			//echo "<br>Enviado";
		}
		header("location:../revendedor_login_acess.php?erro-sucesso");
	}else{
		header("location:../revendedor_login_acess.php?erro");
	}
	
	
?>
