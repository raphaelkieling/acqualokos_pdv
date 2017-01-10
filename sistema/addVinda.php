<?php
	//adicionar +1 no funcionario que veio ao parque
	include("conexao.php");

	$id = $_GET['id'];
	$veio = $_GET['veio'];

     Log_add($conexao,"Bilheteria","Visitou o parque = ".$id.". Veio = ".$veio+1,$data,$ip);
	if(addVeio($conexao,$id,$veio)){
		header("location:../acesso_global_acess.php");
	}else{
		header("location:../acesso_global_acess.php?erro");
	}
?>
<?= $veio ?>