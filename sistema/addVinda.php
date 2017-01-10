<?php
	//adicionar +1 no funcionario que veio ao parque
	include("conexao.php");

	$id = $_GET['id'];
	$veio = $_GET['veio'];
    $tv = $veio +1;
     var_dump(Log_add($conexao,"Bilheteria",$id." Visitou o parque ".$tv." vezes.",$data,$ip));
	if(addVeio($conexao,$id,$veio)){
		header("location:../acesso_global_acess.php");
	}else{
		header("location:../acesso_global_acess.php?erro");
	}
?>
<?= $veio ?>
