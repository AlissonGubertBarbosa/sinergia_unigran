<?php

use PHPUnit\Framework\TestCase;
namespace Test;
use App\Model;
use App\Models\funcionario;
use App\Models\usuarioComum;
use App\Models\local;
use App\Helpers\Connection;
use PHPUnit\Framework\TestCase;

class TestMain extends TestCase
{
    public function validaCNPJ(){
        $validador = new Validador();
        $this->assertRegExp("\d{2}.?\d{3}.?\d{3}/?\d{4}-?\d{2}",$validador->formataCNPJ(00000000000000));
    }

    function validaCPF($cpf) {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        if (strlen($cpf) != 11) {
            return false;
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    protected $funcionario;
    protected $conexao;

    public function setUp(){
        $this->funcionario = new Funcionario(3000, "José", 1, 171.9);
        $this->conexao = new Connection('localhost', 'root', 'dfre43e$$');
    }

    public function tearDown(){
        $this->conexao->close();
    }

    public function NumeroPoste(){
        $poste = new Poste();
    
        $this->assertEquals(null, $poste->getId());

        $poste = new Poste();
        $poste->create();
        $numeracaoPoste = $poste->getNumeracaoPoste();
        $poste_n = new Poste();

        $this->assertEquals($poste, $poste_n->getLocal($numeracaoPoste));
        $this->assertEquals($numeracaoPoste, $poste_n->getNumeracaoPoste());

        $poste->delete();
    }
}