<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login_admin.php');
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
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Revendedor</h1>
			</div>
			<div class="panel-body">
				<table class="texto-centralizado table table-hover">
					<tr>
						<th>Descrição</th>
						<th>Método</th>
						<th>Função</th>
					</tr>
					<tr>
						<form action="sistema/admin/criar_revendedor.php" method="get">
							<td>Adicionar Revendedor</td>
							<td><input type="text" name="nome" placeholder="Nome" required><input type="password" id="senhaValida" name="senha" placeholder="Senha" onkeyup="validaSenha();" required></td>
							<td><button class="btn btn-sucesso form-control">Cadastrar</button></td>
						</form>
					</tr>
					<tr>
						<td>Deletar Revendedor</td>
						<form action="sistema/admin/deletar_revendedor.php">
							<td>
								<select required name="idRevendedorDelete" required>
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
								<td><button class="btn btn-perigo form-control">Deletar</button></td>
							</td>
						</form>	
					</tr>
				</table>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Banco de Dados</h1>
			</div>
			<div class="panel-body">
				<table class="texto-centralizado table table-hover">
				<tr>
					<th>Descrição</th>
					<th>Método</th>
					<th>Função</th>
				</tr>		
				<tr>
					<td>Deletar Bancos</td>
					<td></td>
					<td><button onclick="DeletarBanco();" class="btn btn-perigo form-control">Deletar</button></td>
				</tr>
				<tr>
					<td>Deletar Logins</td>
					<td></td>
					<td><button onclick="DeletarLogins();" class="btn btn-perigo form-control">Deletar</button></td>
				</tr>
				<tr>
					<td>Deletar Lista</td>
					<td colspan="2"><a href="admin_login_lista_deleta.php"><button class="btn btn-perigo form-control">Escolher Qual Deletar</button></a></td>
				</tr>
				</table>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Senhas</h1>
			</div>
			<div class="panel-body">
				<table class="texto-centralizado table table-hover">
					<tr>
						<th>Descrição</th>
						<th>Método</th>
						<th>Função</th>
					</tr>		
					<tr>
						<form action="sistema/admin/modificar_senha_revendedor.php" method="get">
							<td>Senha Revendedor</td>
							<td>
								<select required name="idRevendedor" required>
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
								<input type="password" name="senhaRevendedor" placeholder="novaSenha" required>
							</td>
							<td><button class="btn btn-sucesso form-control">Cadastrar</button></td>
						</form>
					</tr>
					<tr>
						<form action="sistema/admin/modificar_senha_acqua.php" method="get">
							<td>Senha Acqua:</td>
							<td><input type="text" name="senhaAcqua" placeholder="Nova senha..." required></td>
							<td><button class="btn btn-atencao form-control">Modificar</button></td>
						</form>
					</tr>
					<tr>
						<form action="sistema/admin/modificar_senha_bilheteria.php" method="get">
							<td>Senha Bilheteria:</td>
							<td><input type="text" name="senhaBilheteria" placeholder="Nova senha..." required></td>
							<td><button class="btn btn-atencao form-control">Modificar</button></td>
						</form>
					</tr>
					<tr>
						<form action="sistema/admin/modificar_senha_lista.php" method="get">
							<td>Senha Criação de Listas:</td>
							<td><input type="text" name="senhaLista" placeholder="Nova senha..." required></td>
							<td><button class="btn btn-atencao form-control"> Modificar </button></td>
						</form>
					</tr>
				</table>				
			</div>
		</div>

		<script>
			function DeletarBanco()
			{
				//Pergunta se quer deletar o banco
				if(confirm("Quer mesmo apagar TODO o banco? A ação é irriversível"))
				{
					window.location.href="sistema/admin/deletar_bancos.php";
				}
			}

			function DeletarLogins()
			{
				//Pergunta se quer deletar o banco de logins
				if(confirm("Quer mesmo apagar TODO o banco de logins? A ação é irriversível"))
				{
					window.location.href="sistema/admin/DeletarLogins.php";
				}
			}
			function validaSenha(){
				var senha = $("#senhaValida").val();
				if(senha.match(/'/) || senha.match(/!/) || senha.match(/"/))
				{
					alert("Nao coloque caracteres especiais por favor. Caso contrário não irá funcionar.");
				}
			}
		</script>
	</div>
</body>
</html>
