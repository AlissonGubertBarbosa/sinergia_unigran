<?php
/*
Data:		23/05/2021
Programa: 	model/Connection.php
Autor:		Alisson Gubert Barbosa
*/

namespace App\model;
require_once "Connection.php";
require_once "empresa.php";

class responsavel
{
    private $id;
    private $nome;
    private $endereco;
    private $contato;
    private $empresa;
    private $observacao;

    public function setId ($id){
        $this -> id = $id;
    }

    public function setNome ($nome){
        $this -> nome = $nome;
    }
    
    public function setEndereco ($endereco){
        $this -> endereco = $endereco;
    }

    public function setContato ($contato){
        $this -> contato = $contato;
    }

    public function setEmpresa ($empresa){
        $this -> empresa = $this -> numEmpresa[$empresa];
    }

    public function setObservacao ($observacao){
        $this -> observacao = $observacao;
    }

    public function create()
    {
        if ($this->id != null)
            return false;
        $stmt = $this->Connection->prepare("INSERT INTO `usuarios`(`id`, `nome`, `endereco`, `contato`, `empresa`, `observacao`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssiii", $this->id, $this->nome, $this->endereco, $this->contato, $this->empresa, $this->observacao);
        $result = $stmt->execute();
        $this->id = $stmt->insert_id;
        $stmt->close();
        return $result;
    }
}