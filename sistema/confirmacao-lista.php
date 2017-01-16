<?php
	include("conexao.php");

	$id = $_POST['id'];
	var_dump("<br>".$id);
    $revendedor = $_POST['revendedor'];
	var_dump("<br>".$revendedor);
	$lista_id = $_POST['lista_id'];
	var_dump("<br>".$lista_id);

     Log_add($conexao,"Revendedor","Revendedor = ".$revendedor.". Aceitou a lista = ".$lista_id,$data,$ip);
	if(!count($id)<=0){
		for($i=0;$i<count($id);$i++){
		  confirmarListaRevendedor($conexao,$id,$lista_id,$i); 
		}
		header("location:../revendedor_login_acess.php?erro-sucesso-revendedor");
	}else{
		header("location:../revendedor_login_acess.php?erro");
	}
	
	
?>