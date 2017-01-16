<tr data-toggle="modal" data-target="#updateUser<?= $dados['id']?>">
	<td><small><input type="text" name="id[]" value="<?= $dados['id']?>" hidden><?= $dados['id']?></small></td>
	<td><small id="nome<?= $dados['id']?>"><?= $dados['nome']?></small></td>
	<td><small id="documento<?= $dados['id']?>"><?= $dados['documento']?></small></td>
	<td><small><?= $dados['ponto_venda']?></small></td>
	<td><small><?= $dados['localidade']?></small></td>
	<td><small><?= $dados['responsavel']?></small></td>
	<td><small><?= $dados['nomer']?></small></td>
	<td><small><?= $dados['data']?></small></td>
	<td><small><input type="text" name="lista_id" value="<?= $dados['lista_id']?>" hidden><?= $dados['lista_id']?></small></td>
</tr>
<!-- Modal -->
<div class="modal fade" id="updateUser<?= $dados['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar o id - <?= $dados['id']?></h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-2">Nome:</div>
      		<div class="col-md-10"><input type="text" class="form-control" id="nome_user<?= $dados['id']?>" value="<?= $dados['nome'] ?>"></div>	
      	</div>
      	<br>
      	<div class="row">
      		<div class="col-md-2">Documento:</div>
      		<div class="col-md-10"><input type="text" class="form-control" id="documento_user<?= $dados['id']?>" value="<?= $dados['documento'] ?>"></div>	
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" onclick="updateUser(<?= $dados['id']?>);" class="btn btn-success">Salvar Alteração</button>
      </div>
    </div>
  </div>
</div><!-- Fim Modal -->