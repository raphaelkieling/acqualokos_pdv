<?php
	include("conexao.php");

	$id = $_POST['id'];
	$lista_id = $_POST['lista_id'];
	//var_dump($id);

	if(!count($id)<=0){
		for($i=0;$i<count($id);$i++){
			echo $id[$i];
			confirmarListaAcqua($conexao,$id,$lista_id,$i);
			//echo "<br>Enviado";
		}

		$file_log = fopen("admin/sistema.txt","a");
		$escreve = fwrite($file_log,"ACQUALOKOS = Acqualokos confirmou a lita ".$lista_id." em ". $data." às ".$hora.PHP_EOL);
		fclose($file_log);

		// mysqli_query($conexao,"delete from banco_id_listas where id=$lista_id"); DELETA lista do banco
		ListaStatusConfirmada($conexao,$lista_id);
		header("location:../acqualokos_login_acess.php?erro-sucesso");
	}else{
		header("location:../acqualokos_login_acess.php?erro");
	}
?>
