<?php
/*
Data:		23/05/2021
Programa: 	model/Connection.php
Autor:		Alisson Gubert Barbosa
*/

namespace App\model;
require_once "Connection.php";

class local
{
    private $id;
    private $imagem;
    private $numeroPoste;
    private $marcacaoMapa;

    public function setId ($id){
        $this -> id = $id;
    }

    public function setImagem ($imagem){
        $this -> imagem = $imagem;
    }

    public function setNumeracaoPoste ($numeroPoste){
        $this -> numeracaoPoste = $numeroPoste;
    }

    public function setMarcacaoMapa ($marcacaoMapa){
        $this -> marcacaoMapa = $marcacaoMapa;
    }

    
}