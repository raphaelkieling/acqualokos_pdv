<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login.php');
	include('views/head.php'); 
?>
<?php
	//Modificar senha acqua_lokos
	//Criar novo revendedor e atribuir uma senha a ela
	//Modificar revendedor já existente
	//Modificar bando de dados
	//Criar banco de dados  resetado com um botão chamado RESET ALL

?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<br><br>
		<h1><center>Administrador</center></h1>
		<table class="texto-centralizado table-blue table-hover">
			<tr>
				<th>Descrição</th>
				<th>Método</th>
				<th>Função</th>
			</tr>
			<tr>
				<td>Deletar Bancos</td>
				<td></td>
				<form action="sistema/admin/DeletarBancos.php" method="get">
					<td><button class="btn btn-perigo">Deletar</button></td>
				</form>
			</tr>
			<tr>
				<form action="sistema/admin/DeletarLogins.php" method="get">
					<td>Deletar Logins</td>
					<td></td>
					<td><button class="btn btn-perigo">Deletar</button></td>
				</form>
			</tr>
			<tr>
				<form action="sistema/admin/CriarRevendedor.php" method="get">
					<td>Adicionar revendedor</td>
					<td><input type="text" name="nome" placeholder="Nome" required><input type="password" name="senha" placeholder="Senha" required></td>
					<td><button class="btn btn-perigo">Cadastrar</button></td>
				</form>
			</tr>
		</table>
		
	</div>
</body>
</html>
