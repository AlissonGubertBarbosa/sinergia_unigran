<?php
/*
Data:		23/05/2021
Programa: 	model/Connection.php
Autor:		Alisson Gubert Barbosa
*/

namespace App\model;
require_once "Connection.php";

class OrdemServico 
{
    private $id;
    private $data;
    private $local;
    private $usuarioComum;
    private $responsavel;
    private $funcionario;
    private $observacao;

    public function setId ($id){
        $this -> id = $id;
    }

    public function setData ($data){
        $this -> data = $data;
    }

    public function setLocal ($local){
        $this -> local = $this -> numLocal[$local];
    }

    public function setUsuarioComum ($usuarioComum){
        $this -> usuarioComum = $this -> numUsuarioComum[$usuarioComum];
    }

    public function setResponsavel ($responsavel){
        $this -> responsavel = $this -> numResponsavel[$responsavel];
    }

    public function setFuncionario ($funcionario){
        $this -> funcionario = $this ->numFuncionario[$funcionario];
    }
    public function setObservacao ($observacao){
        $this -> observacao = $observacao;
    }
}
