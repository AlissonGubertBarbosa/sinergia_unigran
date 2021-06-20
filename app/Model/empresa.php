<?php
/*
Data:		23/05/2021
Programa: 	model/Connection.php
Autor:		Alisson Gubert Barbosa
*/

namespace App\model;
require_once "Connection.php";

class empresa 
{
    private $cnpj;
    private $nomeResponsavel;
    private $endereco;
    private $telefone;
    private $emailEmpresarial;
    private $observacao;

    public __construct ($cnpj = null, $nomeResponsavel = null, $endereco = null, $telefone =null, $emailEmpresarial = null, $observacao = null){
        $this -> cnpj = $cnpj;
        $this -> nomeResponsavel = $nomeResponsavel;
        $this -> endereco = $endereco;
        $this -> telefone = $telefone;
        $this -> emailEmpresaril = $emailEmpresarial;
        $this -> observacao = $observacao;
        
    }

    public function setCnpj($cnpj) {
        $this -> cnpj = $cnpj;
    }

    public function setNomeResponsavel ($nomeResponsavel){
        $this -> nomeResponsavel = $nomeResponsavel;
    }

    public function setEndereco ($endereco){
        $this -> endereco = $endereco;
    }

    public function setTelefone ($telefone){
        $this -> telefone = $telefone;
    }

    public function setEmailEmpresarial ($emailEmpresarial){
        $this -> emailEmpresarial = $emailEmpresarial;
    }

    public function setObservacao ($observacao){
        $this -> observacao = $observacao;
    }
}