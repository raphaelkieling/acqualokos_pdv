<?php
	if(isset($_GET['erro'])){
?>
		<div class="aviso form-controlado">
			Desculpe, há algo errado!
		</div>
<?php
	}
?>


<?php
	if(isset($_GET['erro-sucesso'])){
?>
		<div class="aviso-sucesso form-controlado">
			Tudo ocorreu como esperado!
		</div>
<?php
	}
?>

<?php
	if(isset($_GET['erro-acesso'])){
?>
		<div class="aviso form-controlado">
			Está tentando entrar sem permissão?
		</div>
<?php
	}
?>

<?php
	if(isset($_GET['erro-sucesso-ponto-venda'])){
	$ultimo = PegarIdUltimoListaRevendedor($conexao);  
?>
		<div class="aviso-sucesso form-controlado">
			Lista encaminhada com sucesso. Aguarde aprovação de seu Revendedor antes de realizar o passeio!
			<br>
		<!-- 	<a href="sistema/verificar_lista_ponto_de_venda.php?nmr_lista=<?= $ultimo ?>" class="text-center"><h2>www.acqualokos.esy.es/sistema/verificar_lista_ponto_de_venda.php?nmr_lista=<?= $ultimo ?></h2></a> -->
		</div>
<?php
	}
?>

<?php
	if(isset($_GET['erro-sucesso-revendedor'])){
?>
		<div class="aviso-sucesso form-controlado">
			Lista encaminhada com sucesso. Aguarde aprovação do Acqua Lokos antes de liberar o ponto de venda para o passeio!
		</div>
<?php
	}
?>

<?php
	if(isset($_GET['erro-lista'])){
?>
		<div class="aviso form-controlado">
			Você não colocou nenhum funcionário ou inseriu algum caractere especial como !@#$%¨&*()_+{}^`:?.+-*/
		</div>
<?php
	}
?>