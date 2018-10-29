<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Participante
 *
 * @author oscar
 */
namespace App\CorredoresRioja\Domain\Model;
class Participante {
    //put your code here
    private $corredor;
    private $carrera;
    private $dorsal;
    private $tiempo;
    
    function __construct($corredor, $carrera, $dorsal) {
        $this->corredor = $corredor;
        $this->carrera = $carrera;
        $this->dorsal = $dorsal;
        $this->tiempo = 0;
    }
    
    function getCorredor() {
        return $this->corredor;
    }

    function getCarrera() {
        return $this->carrera;
    }

    function getDorsal() {
        return $this->dorsal;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function asignarMarca($tiempo){
        $this->tiempo=$tiempo;
    }

    public function __toString() {
        return "";
    }

}
