<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnMemoriaRepoCorredor
 *
 * @author oscar
 */

namespace App\CorredoresRioja\Infrastructure\Repository;

use App\CorredoresRioja\Domain\Model\Corredor;
use App\CorredoresRioja\Domain\Repository\RepoCorredor;

class EnMemoriaRepoCorredor implements RepoCorredor {

    //put your code here
    private $corredores = [];

    public function __construct() {
        $this->corredores[] = new Corredor(1, "Pepe", "Perez", "pepe.perez@gmail.com", '1234', "C. Falsa", new \DateTime("15-08-1985"));
        $this->corredores[] = new Corredor(2, "Maria", "Lopez", "maria.lopez@gmail.com", '5678', "C. Falsa", new \DateTime("10-08-1985"));
    }

    public function actualizarCorredor(Corredor $corredor) {
        $i = 0;
        foreach ($this->corredores as $c) {
            if ($c->getDni() == $corredor->getDni()) {
                $this->corredores[i] = $corredor;
            }
            $i++;
        }
    }

    public function buscarCorredor($dni) {
        foreach ($this->corredores as $c) {
            if ($c->getDni() == $dni) {
                return $c;
            }
        }
        return NULL;
    }

    public function eliminarCorredor(Corredor $corredor) {
        $i = 0;
        foreach ($this->corredores as $c) {
            if ($c->getDni() == $corredor->getDni()) {
                unset($this->corredores[i]);
            }
            $i++;
        }
    }

    public function insertarCorredor(Corredor $corredor) {
        $this->corredores[] = $corredor;
    }

    public function listarCorredores() {
        return $this->corredores;
    }

}
