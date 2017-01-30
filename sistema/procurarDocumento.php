<?php
	include("conexao.php");
?>

<table class="table table-bordered table-striped text-center">
	<tr>
		<th>Nome</th>
		<th>Documento</th>
	</tr>
	<?php 
		$palavra = $_POST['palavra'];
		$select = procurarDocumentoIndex($conexao,$palavra);
		while($item = mysqli_fetch_assoc($select)){
	?>
	<tr>
		<td><?= $item['nome']?></td>
		<td><?= cortaDocumento($item['documento'])?></td>
	</tr>
	<?php
		}
	 ?>
</table>