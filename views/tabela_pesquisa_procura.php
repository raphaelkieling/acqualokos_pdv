<?php 
	include("../sistema/conexao.php");
	$palavra = $_GET['palavra'];
	$digitacao = addslashes($palavra);
	$select = BuscaListaGlobalPalavra($conexao,$digitacao);
	while($dados = mysqli_fetch_assoc($select)){
?>
	<tr class="tabela-global dado-gerado">
		<td><small><input type="text" name="id[]" value="<?= $dados['id']?>" hidden><?= $dados['id']?></small></td>
		<td><small><?= $dados['nome']?></small></td>
		<td><small><?= $dados['documento']?></small></td>
		<td><small><?= $dados['ponto_venda']?></small></td>
		<td><small><?= $dados['localidade']?></small></td>
		<td><small><?= $dados['responsavel']?></small></td>
		<td><small><?= $dados['nomer']?></small></td>
		<td><small><?= $dados['data']?></small></td>
		<td><small><?= $dados['veio']?></small></td>
		<td><a href="sistema/addVinda.php?id=<?= $dados['id']?>&&veio=<?= $dados['veio']?>"><img class="addVeio" src="img/add.png" alt="adicionar vindas"></a></td>
	</tr>
<?php 
	}
?>