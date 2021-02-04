<?php

class TarefaService {

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	public function inserir() { //create
		$query = 'insert into usuarios(nome, email, cpf, cadastro)values(?,?,?, NOW())';
		$stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('nome'));
        $stmt->bindValue(2, $this->tarefa->__get('email'));
        $stmt->bindValue(3, $this->tarefa->__get('cpf'));
		$stmt->execute();
	}

	public function recuperar() { //read
		$query = '
			select 
				id, nome, email, cpf, cadastro
			from 
				usuarios 
            ';
            
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar() { //update

		$query = "update usuarios set nome = ?, 
		email = ?, 
		cpf = ?
		where id = ?;"
		;
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('nome'));
		$stmt->bindValue(2, $this->tarefa->__get('email'));
		$stmt->bindValue(3, $this->tarefa->__get('cpf'));
		$stmt->bindValue(4, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function remover() { //delete

		$query = 'delete from usuarios where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id'));
		$stmt->execute();
	}

}
