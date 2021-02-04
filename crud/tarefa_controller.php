<?php
    session_start();
    require "../crud/tarefa.model.php";
	require "../crud/tarefa.service.php";
    require "../crud/conexao.php";
    require "validacpf.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
        $tarefa = new Tarefa();
        $tarefa->__set('nome', $_POST['nome']);
        $tarefa->__set('email', $_POST['email']);
        $tarefa->__set('cpf', $_POST['cpf']);
        $valida = validaCPF($tarefa->__get('cpf'));
        if(!empty($tarefa->__get('nome') && $tarefa->__get('email') && $tarefa->__get('cpf'))){

            if(!$valida){
                header('Location: ../crud_public/add.php?cpf=invalido');
                die();
            }
            
            $conexao = new Conexao();
    
            $tarefaService = new TarefaService($conexao, $tarefa);
            $tarefaService->inserir();
            
            header('Location: ../crud_public/add.php?inserido=usuario_adicionado');

        } else{
            header('Location: ../crud_public/add.php?campo=nao_prenchidos');
            die();
        }
        
    } 
    elseif($acao == 'recuperar'){
        $tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
    } 
    elseif($acao == 'remover'){
        
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        header('Location: ../crud_public/index.php?removido=usuario_deletado');
    }
    elseif($acao == 'atualizar'){
    
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_SESSION['id']);
		$tarefa->__set('nome', $_POST['nome']);
        $tarefa->__set('email', $_POST['email']);
        $tarefa->__set('cpf', $_POST['cpf']);
        if(!empty($tarefa->__get('nome') && $tarefa->__get('email') && $tarefa->__get('cpf'))){

            $conexao = new Conexao();

            $tarefaService = new TarefaService($conexao, $tarefa);
            $tarefaService->atualizar();
            header('Location: ../crud_public/index.php?atualizado=update');
   

        } else{
            header("Location: ../crud_public/edit.php?id={$tarefa->__get('id')}&campo=nao_prenchidos");
            die();
        }
        

		
		
    }