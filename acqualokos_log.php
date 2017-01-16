<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login_acqua.php');
	include('views/head.php'); 

  if(isset($_GET['itensAtuais'])){$itensAtuais = $_GET['itensAtuais'];}else{ $itensAtuais = 40;}

  $itensTotais = Log_all($conexao);

  if(isset($_GET['filtro'])){$filtro = $_GET['filtro'];}else{$filtro = 1;}

  if(isset($_GET['descricao'])){$descricao = $_GET['descricao']; }else{ $descricao = "";}
?>
<body>
	<!-- Header -->
	<?php include('views/header.php');?>
	<div class="container">
	<?php include("views/erro.php");?>
	<center><h1>Log</h1></center>
      <div class="row">
        <div class="col-md-2">
          <a class="btn btn-warning form-control" href="acqualokos_login_acess.php">Voltar</a>
          <br><br>
          <form action="">
            <ul class="list-group">
              <li class="list-group-item"><input type="radio" name="filtro" value="1"> Esquecer Filtro</li>
              <li class="list-group-item"><input type="radio" name="filtro" value="2"> Revendedor</li>
              <li class="list-group-item"><input type="radio" name="filtro" value="3"> AcquaLokos</li>
              <li class="list-group-item"><input type="radio" name="filtro" value="4"> PDV</li>
              <li class="list-group-item"><input type="radio" name="filtro" value="5"> Bilheteria</li>
              <li class="list-group-item"><input type="text"  name="descricao" class="form-control" placeholder="Descrição avançada"></li>
              <li class="list-group-item"><button class="btn btn-primary form-control">Filtrar</button></li>
            </ul>
          </form>
        </div>
       <div class="col-md-10 panel panel-default">
         <div class="panel-heading">
           <h1 class="panel-title">
             Log de ocorridos
           </h1>
         </div>
         <div class="panel-body">
           <table border="1">
              <tr>
                <th style="text-align: center;">Id</th>
                <th style="text-align: center;">Criador</th>
                <th style="text-align: center;">Descrição</th>
                <th style="text-align: center;">Data</th>
                <th style="text-align: center;">Ip</th>
              </tr>
              <?php 
                $select = Log_view($conexao,$itensAtuais,$filtro,$descricao);
                while($log = mysqli_fetch_assoc($select)){
              ?>
                <tr>
                  <td style="text-align: center;"><small><?= $log['id']?></small></td>
                  <td><small> <?= $log['nome']?></small></td>
                  <td><small> <?= $log['descricao']?></small></td>
                  <td><small> <?= $log['data']?></small></td>
                  <td><small> <?= $log['ip']?></small></td>
                </tr>
              <?php }?>
           </table>
            <div class="col-md-6">
               <a class="btn btn-info form-control" href="acqualokos_log.php?itensAtuais=<?= $itensAtuais+40?>&filtro=<?= $filtro?>">Ver Mais</a>
            </div>
            <div class="col-md-6">
               <a class="btn btn-danger form-control" href="acqualokos_log.php?itensAtuais=<?= $itensTotais?>&filtro=<?= $filtro?>">Ver TUDO</a>
            </div>
         </div>
       </div>
      </div>
	</div>
	<br><br>
</body>
