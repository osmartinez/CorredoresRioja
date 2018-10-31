<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnMemoriaRepoParticipante
 *
 * @author oscar
 */

namespace App\CorredoresRioja\Infrastructure\Repository;

use App\CorredoresRioja\Domain\Repository\RepoParticipante;
use \App\CorredoresRioja\Domain\Model\Corredor;
use \App\CorredoresRioja\Domain\Model\Organizacion;
use \App\CorredoresRioja\Domain\Model\Carrera;
use App\CorredoresRioja\Domain\Model\Participante;

class EnMemoriaRepoParticipante implements RepoParticipante {

    private $carreras = [];
    private $corredores = [];
    private $participantes = [];

    function __construct() {
        $this->corredores[] = new Corredor(1, "Pepe", "Perez", "pepe.perez@gmail.com", '1234', "C. Falsa", new \DateTime("15-08-1985"));
        $this->corredores[] = new Corredor(2, "Maria", "Lopez", "maria.lopez@gmail.com", '5678', "C. Falsa", new \DateTime("10-08-1985"));
        $matuteOrg = new Organizacion(1, "Matute", "Pueblo Matute", "matute@gmail.com", 12345);
        $this->carreras[] = new Carrera(1, "Matutrail", "Carrera Montes Matute", new \DateTime("2018-10-10"), 21, new \DateTime("2018-10-9"), 500, "matutrail.jpg", $matuteOrg);
        $urOrg = new Organizacion(2, "UR", "Servicio deportes UR", "deportes@unirioja.es", 123456);
        $this->carreras[] = new Carrera(2, "Carrera UR", "Carrera UR", new \DateTime("2018-5-5"), 10, new \DateTime("2018-5-4"), 1000, "ur.png", $urOrg);
        $this->participantes[] = new Participante($this->corredores[0], $this->carreras[0], 1);
        $this->participantes[] = new Participante($this->corredores[0], $this->carreras[1], 100);
        $this->participantes[] = new Participante($this->corredores[1], $this->carreras[1], 150);
    }

    //put your code here
    public function actualizarTiempo(Corredor $corredor, Carrera $carrera) {
        
    }

    public function eliminarParticipante(Participante $participante) {
        
    }

    public function estaInscrito(Corredor $corredor, Carrera $carrera) {
        
    }

    public function inscribirCorredor(Corredor $corredor, Carrera $carrera) {
        
    }

    public function listarCarrerasDisputadasDeCorredor(Corredor $corredor) {
        
    }

    public function listarCarrerasSinDisputarDeCorredor(Corredor $corredor) {
        
    }

    public function listarParticipantes(Carrera $carrera) {
        
    }

}
