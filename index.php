	<?php include('views/head.php') ?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<br><br>
		<form action="envio-lista.php" method="post">
		<h1>Lista ponto de venda</h1>
		<table>
			<tr>
				<td>Ponto Venda:</td>
				<td><input type="text" required></td>
			</tr>
			<tr>
				<td>Localidade:</td>
				<td><input type="text" required></td>
			</tr>
			<tr>
				<td>Responsável:</td>
				<td><input type="text" required></td>
			</tr>
			<tr>
				<td>Revendedor:</td>
				<td>
					<select name="" id="" required>
						<option value="Revendedo 1">Revendedor 1</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Data</td>
				<td><input type="date" required></td>
			</tr>
		</table><br><br>
		<h1>Funcionários</h1>
		<table id="funcionarios-add">
			<tr>
				<td>Nome:</td>
				<td>Documento:</td>
			</tr>
			<tr>
				<td><input name="n1" type="text" placeholder="Nome do Funcionário"></td>
				<td><input name="d1" type="text" placeholder="CPF ou RG"></td>
			</tr>

			<tr>
				<td><input name="n2" type="text"></td>
				<td><input name="d2" type="text"></td>
			</tr>

			<tr>
				<td><input name="n3" type="text"></td>
				<td><input name="d3" type="text"></td>
			</tr>

			<tr>
				<td><input name="n4" type="text"></td>
				<td><input name="d4" type="text"></td>
			</tr>

			<tr>
				<td><input name="n5" type="text"></td>
				<td><input name="d5" type="text"></td>
			</tr>

			<tr>
				<td><input name="n6" type="text"></td>
				<td><input name="d6" type="text"></td>
			</tr>

			<tr>
				<td><input name="n7" type="text"></td>
				<td><input name="d7" type="text"></td>
			</tr>

			<tr>
				<td><input name="n8" type="text"></td>
				<td><input name="d8" type="text"></td>
			</tr>

			<tr>
				<td><input name="n9" type="text"></td>
				<td><input name="d9" type="text"></td>
			</tr>

			<tr>
				<td><input name="n10" type="text"></td>
				<td><input name="d10" type="text"></td>
			</tr>

			<tr>
				<td><input name="n11" type="text"></td>
				<td><input name="d11" type="text"></td>
			</tr>

			<tr>
				<td><input name="n12" type="text"></td>
				<td><input name="d12" type="text"></td>
			</tr>

			<tr>
				<td><input name="n13" type="text"></td>
				<td><input name="d13" type="text"></td>
			</tr>

			<tr>
				<td><input name="n14" type="text"></td>
				<td><input name="d14" type="text"></td>
			</tr>

			<tr>
				<td><input name="n15" type="text"></td>
				<td><input name="d15" type="text"></td>
			</tr> 
		</table>
		<button class="btn btn-sucesso btn-right btn-big form-controlado" type="submit">Validar Conteudo</button>
		<div class="clear"></div>
		</form>
	</div>
</body>
</html>