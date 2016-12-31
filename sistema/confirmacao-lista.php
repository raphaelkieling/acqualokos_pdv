<?php
	include("conexao.php");

	$id = $_POST['id'];
	var_dump($id);
	$lista_id = $_POST['lista_id'];
	var_dump($lista_id);
	if(!count($id)<=0){
		for($i=0;$i<count($id);$i++){
			confirmarListaRevendedor($conexao,$id,$lista_id,$i);
		}
		
		$file_log = fopen("admin/sistema.txt","a");
		$escreve = fwrite($file_log,"REVENDEDOR = Revendedor confirmou a lista ".$lista_id." em ". $data." às ".$hora.PHP_EOL);
		fclose($file_log);
		header("location:../revendedor_login_acess.php?erro-sucesso-revendedor");
	}else{
		
		header("location:../revendedor_login_acess.php?erro");
	}
	
	
?>
