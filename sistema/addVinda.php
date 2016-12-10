<?php
	include("conexao.php");

	$id = $_GET['id'];
	$veio = $_GET['veio'];
	if(addVeio($conexao,$id,$veio)){
		header("location:../acesso_global_acess.php");
	}else{
		header("location:../acesso_global_acess.php?erro");
	}
?>
<?= $veio ?>