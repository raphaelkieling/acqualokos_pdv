<?php 
	include("../sistema/conexao.php");
	$palavra = $_GET['palavra'];

	$select = BuscaListaGlobalPalavra($conexao,$palavra);
	while($dados = mysqli_fetch_assoc($select)){
?>
	<tr class="tabela-global dado-gerado">
		<td><small><input type="text" name="id[]" value="<?= $dados['id']?>" hidden><?= $dados['id']?></small></td>
		<td><small><?= $dados['nome']?></small></td>
		<td><small><?= $dados['documento']?></small></td>
		<td><small><?= $dados['ponto_venda']?></small></td>
		<td><small><?= $dados['localidade']?></small></td>
		<td><small><?= $dados['responsavel']?></small></td>
		<td><small><?= $dados['NomeRevendedor']?></small></td>
		<td><small><?= $dados['data']?></small></td>
	</tr>
<?php 
	}
?>