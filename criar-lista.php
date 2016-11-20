
<?php
	include('views/head.php') ?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<br><br>
		<form action="sistema/envio-lista.php" method="post">
		<h1>Lista ponto de venda</h1>
		<table>
			<tr>
				<td>Ponto Venda:</td>
				<td><input type="text" required name="pontoVenda"></td>
			</tr>
			<tr>
				<td>Localidade:</td>
				<td><input type="text" required name="localidade"></td>
			</tr>
			<tr>
				<td>Responsável:</td>
				<td><input type="text" required name="responsavel" placeholder="Responsável pelo Ponto de Venda"></td>
			</tr>
			<tr>
				<td>Revendedor:</td>
				<td>
					<select required name="revendedor">
						<option value="0">Revendedor 0</option>
						<option value="1">Revendedor 1</option>
					</select>
				</td>
			</tr>
		</table><br><br>
		<h1>Funcionários</h1>
		<table id="funcionarios-add">
			<tr>
				<td>Nome:</td>
				<td>Documento:</td>
			</tr>
			<?php for($i=0; $i < 15 ; $i++) { ?>
			<tr>
				<td><input name="n[]" type="text" placeholder="Nome do Funcionário"></td>
				<td><input name="d[]" type="text" placeholder="CPF ou RG"></td>
			</tr>
			<?php } ?>
		</table>
		<button class="btn btn-sucesso btn-right btn-big form-controlado" type="submit">Validar Conteudo</button>
		<div class="clear"></div>
		</form>
	</div>
</body>
</html>
