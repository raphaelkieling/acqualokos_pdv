<?php 
	#Config banco de dados	
	$db = array(
		"local" => "localhost",
		"usuario" => "root",
		"senha"=> "",
		"banco"=>"acqualokos_revendedor"
	);
	
	$conexao = mysqli_connect($db['local'],$db['usuario'],$db['senha'],$db['banco']);
?>