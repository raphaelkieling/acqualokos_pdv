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