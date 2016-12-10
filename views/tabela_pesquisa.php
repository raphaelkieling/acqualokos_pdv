<tr class="tabela-global">
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