<?php 
session_start();
$_SESSION['id'] = $_GET['id'];

// $_SESSION;
// var_dump($_SESSION['id']);
// return 0;


require "../crud/conexao.php";

function recuperarr($id) { //read
	$query = "
    select 
    nome, email, cpf
    from usuarios
    where id = $id;
			
		";
	$conexao = new Conexao;
	$stmt = $conexao->conectar()->prepare($query);
	$stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_OBJ); 
   
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>CRUD com Bootstrap 3</title>

 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
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
    <a class="navbar-brand" href="index.php">Crud usuários</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="index.php">In&iacute;cio</a></li>
    </ul>
   </div>
  </div>
 </nav>
  


 <div id="main" class="container-fluid">

  
  
  <h3 class="page-header">Adicionar usuário</h3>

  <?php if(isset($_GET['campo']) && isset($_GET['campo']) == 'nao_prenchidos'){ ?>
    <div class="alert alert-danger" role="alert">Preencha todos os campos</div>
  <?php } ?>

  <form action="tarefa_controller.php?acao=atualizar" method="POST">
  	<div class="row">
  	  <div class="form-group col-md-4">
  	  	<label >Nome</label>
        <?php 
        $ok=recuperarr($_GET['id']);
        foreach ($ok as $key => $value) { ?>
         <input type="text" class="form-control" name="nome" value="<?php echo $value->nome ?>">
        <?php } ?>
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label >E-mail</label>
  	  	<?php 
        $ok=recuperarr($_GET['id']);
        foreach ($ok as $key => $value) { ?>
         <input type="text" class="form-control" name="email" value="<?php echo $value->email ?>">
        <?php } ?>
  	  </div>
	  <div class="form-group col-md-4">Cpf</label>
    <?php 
        $ok=recuperarr($_GET['id']);
        foreach ($ok as $key => $value) { ?>
         <input type="text" class="form-control" name="cpf" value="<?php echo $value->cpf ?>">
        <?php } ?>
  	  </div>
	</div>
	
	<hr />
	
	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="index.php" class="btn btn-default">Cancelar</a>
	  </div>
	</div>
	

  </form>
 </div>
 

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>