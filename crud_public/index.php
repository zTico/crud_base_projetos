<?php 
$acao = 'recuperar';
require 'tarefa_controller.php';
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <title>CRUD-Usuários</title>

 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <style>
	.memeio{
		margin: auto;
		width: 90%;
	}
	.separacao{
		margin-top: 10px;
	}
 </style>
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Crud Usuários</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="#">In&iacute;cio</a></li>
    </ul>
   </div>
  </div>
 </nav>

 <div id="main" class="container-fluid" style="margin-top: 50px">
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Usuários</h2>
		</div>
		<div class="col-sm-6">
		<div class="separacao">
		<?php
			if(isset($_GET['removido']) && $_GET['removido'] == 'usuario_deletado'){ ?>
				<div class="alert alert-danger" role="alert">Deletado com sucesso</div>
			<?php } ?>
			<?php
			if(isset($_GET['atualizado']) && $_GET['atualizado'] == 'update'){ ?>
				<div class="alert alert-success" role="alert">Atualizado com sucesso</div>
			<?php } ?>
		
			</div>	
		</div>
		<div class="col-sm-3">
			<a href="add.php" class="btn btn-primary pull-right h2">Novo Item</a>
		</div>
	</div> <!-- /#top -->
	 <hr />

<div class="memeio">		
<div id="list" class="row">
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Cpf</th>
					<th>Cadastro</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tarefas as $key => $valor) { ?>
				<tr>
					
					<td><?php echo $valor->id ?></td>
					<td><?php echo $valor->nome ?></td>
					<td><?php echo $valor->email ?></td>
					<td><?php echo $valor->cpf ?></td>
					<td><?php echo $valor->cadastro ?></td>
					<td class="actions">
						<a class="btn btn-warning btn-xs" href="edit.php?id=<?php echo $valor->id ?>">Editar</a>
						<a class="btn btn-danger btn-xs deletee"  href="tarefa_controller.php?acao=remover&id=<?php echo $valor->id ?>" >Excluir</a>
					</td>
				</tr>
				</div> <?php } ?> <!-- /#list -->	
			</tbody>
		</table>
	</div>
	

	</div>
<!-- /#main -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script> (function ($){
    $(document).ready(function(){
        $('a.deletee').click(function(e)
        {
            e.preventDefault();
            if (window.confirm('Tem certeza que quer deletar o registro?')) {
                return window.location.href = $(this).attr('href');
            }
        })
    });
})(jQuery);
 </script>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>