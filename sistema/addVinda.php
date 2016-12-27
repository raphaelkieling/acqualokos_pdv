<?php
	//adicionar +1 no funcionario que veio ao parque
	include("conexao.php");

	$id = $_GET['id'];
	$veio = $_GET['veio'];
	if(addVeio($conexao,$id,$veio)){
		
		$file_log = fopen("admin/sistema.txt","a");
		$escreve = fwrite($file_log,"BILHETERIA = Funcionario ".$id." veio em ". $data." às ".$hora.PHP_EOL);
		fclose($file_log);

		header("location:../acesso_global_acess.php");
	}else{
		header("location:../acesso_global_acess.php?erro");
	}
?>
<?= $veio ?>