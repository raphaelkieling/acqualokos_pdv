<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login_acqua.php');
	include('views/head.php'); 

if(isset($_GET['itensAtuais']))
{
  $itensAtuais = $_GET['itensAtuais'];
}else{
  $itensAtuais = 2;
}
$itensTotais = Log_all($conexao);
  
?>
<body>
	<!-- Header -->
	<?php include('views/header.php');?>
	<div class="container">
	<?php include("views/erro.php");?>
	<center><h1>Log</h1></center>
      <div class="row">
         <a class="btn btn-warning form-control" href="acqualokos_login_acess.php">Voltar</a>
      </div>
      <br>
      
      <div class="row">
       <div class="panel panel-default">
         <div class="panel-heading">
           <h1 class="panel-title">
             Log de ocorridos
           </h1>
         </div>
         <div class="panel-body">
           <table>
              <tr>
                <th>Id</th>
                <th>Criador</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Ip</th>
              </tr>
              <?php 
                $select = Log_view($conexao,$itensAtuais);
                while($log = mysqli_fetch_assoc($select)){
              ?>
                <tr>
                  <td><small><?= $log['id']?></small></td>
                  <td><small><?= $log['nome']?></small></td>
                  <td><small><?= $log['descricao']?></small></td>
                  <td><small><?= $log['data']?></small></td>
                  <td><small><?= $log['ip']?></small></td>
                </tr>
              <?php }?>
           </table>
            <div class="col-md-6">
               <a class="btn btn-info form-control" href="acqualokos_log.php?itensAtuais=<?= $itensAtuais+3?>">Ver Mais</a>
            </div>
            <div class="col-md-6">
               <a class="btn btn-danger form-control" href="acqualokos_log.php?itensAtuais=<?= $itensTotais?>">Ver TUDO</a>
            </div>
         </div>
       </div>
      </div>
	</div>
	<br><br>
  <script>
   
  </script>
</body>
