<?php 
	#Config banco de dados	
		//---HOSTINGER----
		// nome Banco:u172364612_ pdv
		// nome: u172364612_ acqua
		// senha : admacqua
	$db = array(
		"local" => "localhost",
		"usuario" => "root",
		"senha"=> "",
		"banco"=>"acqualokos_revendedor"
	);
	

	// $db = array(
	// 	"local" => "localhost",
	// 	"usuario" => "u172364612_acqua",
	// 	"senha"=> "admacqua",
	// 	"banco"=>"u172364612_pdv"
	// );
	
	$conexao = mysqli_connect($db['local'],$db['usuario'],$db['senha'],$db['banco']);
?>