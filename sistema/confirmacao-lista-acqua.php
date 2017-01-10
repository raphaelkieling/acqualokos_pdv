<?php
	include("conexao.php");

	$id = $_POST['id'];
	$lista_id = $_POST['lista_id'];
	//var_dump($id);

     Log_add($conexao,"AcquaLokos","Aceitou a lista = ".$lista_id,$data,$ip);
	if(!count($id)<=0){
		for($i=0;$i<count($id);$i++){
			echo $id[$i];
			confirmarListaAcqua($conexao,$id,$lista_id,$i);
			//echo "<br>Enviado";
		}

		// mysqli_query($conexao,"delete from banco_id_listas where id=$lista_id"); DELETA lista do banco
		ListaStatusConfirmada($conexao,$lista_id);
		header("location:../acqualokos_login_acess.php?erro-sucesso");
	}else{
		header("location:../acqualokos_login_acess.php?erro");
	}
?>
