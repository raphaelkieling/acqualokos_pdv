
<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login_lista.php');
	include('views/head.php'); 
?>
<body>
	<!-- Header -->
	<?php include('views/header.php'); ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<?php if(!isset($_GET['erro-sucesso-ponto-venda'])){?>
		<br><br>
		<form action="sistema/envio-lista.php" method="post">
		<h1>Lista ponto de venda</h1>
		<table>
			<tr>
				<td><br>Ponto Venda:</td>
				<td><br><input type="text" class="form-control"  required name="pontoVenda"></td>
			</tr>
			<tr>
				<td>Localidade:</td>
				<td><input type="text" class="form-control"  required name="localidade"></td>
			</tr>
			<tr>
				<td>Responsável:</td>
				<td><input type="text" class="form-control" required name="responsavel" placeholder="Responsável pelo Ponto de Venda"></td>
			</tr>
			<tr>
				<td>Revendedor:</td>
				<td>
					<select class="form-control" required name="revendedor">
						<option value="" selected></option>
					<?php 
						$select = MostrarRevendedores($conexao);
						while($nomes = mysqli_fetch_assoc($select)){ 
					?>
							<!-- Saiu do php -->
							<option value="<?= $nomes['id'];?>"><?= $nomes['nome'];?></option>
					<?php
						}
					 ?>
					</select>
				</td>
			</tr>
		</table><br><br>
		<h1>Funcionários</h1>
		<table id="funcionarios-add">
			<tr>
				<th><br>Nome:</th>
				<th><br>Documento:</th>
			</tr>
			<?php for($i=0; $i < 15 ; $i++) { ?>
			<tr>
				<td><input name="n[]" type="text" class="form-control" placeholder="Nome do Funcionário"></td>
				<td><input name="d[]" type="text" class="form-control" placeholder="CPF ou RG"></td>
			</tr>
			<?php } ?>
		</table>
		<button class="btn btn-sucesso btn-right btn-big form-controlado" type="submit">CADASTRAR</button>
		<div class="clear"></div>
		</form>
		<?php } ?>
	</div>
</body>
</html>