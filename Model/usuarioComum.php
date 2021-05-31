<?php
/*
Data:		23/05/2021
Programa: 	model/Connection.php
Autor:		Alisson Gubert Barbosa
*/
namespace App\model;

require_once "Connection.php";

class usuarioComum 
{
    private $cpf;
    private $rg;
    private $nome;
    private $nomeUsuario;
    private $dataNasc;
    private $estadoCivil;
    private $endereco;
    private $contato;
    private $foto;

    function __construct($cpf = null, $rg = null, $nome = null, $nomeUsuario = null, $dataNasc = null, $estadoCivil = null, $endereco = null, $contato = null, $foto = null)
    {

    }

    public function setCpf($cpf){   $this -> cpf = $cpf;    }

    public function setNome($nome) {  $this -> nome = $nome;   }

    public function setNomeusuario($nomeUsuario) {  $this -> nomeUsuario = $nomeUsuario;   }

    public function setDataNasc($dataNasc) 
    {  
        $this -> dataNasc = $dataNasc;   
    }

    public function setEstadoCivil($estadoCivil) 
    {  
        $this -> estadoCivil = $estadoCivil;   
    }

    public function setEndereco($endereco) 
    {  
        $this -> endereco = $endereco;   
    }

    public function setContato($contato) 
    {  
        $this -> contato = $contato;   
    }

    public function setFoto($foto) 
    {  
        $this -> foto = $foto;   
    }



}