<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnMemoriaRepoCarrera
 *
 * @author oscar
 */

namespace App\CorredoresRioja\Infrastructure\Repository;

use App\CorredoresRioja\Domain\Repository\RepoCarrera;
use App\CorredoresRioja\Domain\Model\Carrera;
use App\CorredoresRioja\Domain\Model\Organizacion;

class EnMemoriaRepoCarrera implements RepoCarrera {

    //put your code here
    private $carreras = [];

    public function __construct() {
        $matuteOrg = new Organizacion(1, "Matute", "Pueblo Matute", "matute@gmail.com", 12345);
        $this->carreras[] = new Carrera(1, "Matutrail", "Carrera Montes Matute", new \DateTime("2018-12-8"), 21, new \DateTime("2018-10-9"), 500, "matutrail.jpg", $matuteOrg);
        $urOrg = new Organizacion(2, "UR", "Servicio deportes UR", "deportes@unirioja.es", 123456);
        $this->carreras[] = new Carrera(2, "Carrera UR", "Carrera UR", new \DateTime("2018-12-12"), 10, new \DateTime("2018-5-4"), 1000, "ur.png", $urOrg);
    }

    public function actualizarCarrera(Carrera $carrera) {
        $i = 0;
        foreach ($this->carreras as $c) {
            if ($c->getId() == $carrera->getId()) {
                $this->carreras[i] = $carrera;
            }
            $i++;
        }
    }

    public function buscarCarreraPorSlug($slug) {
        foreach ($this->carreras as $c) {
            if ($c->getSlug() == $slug) {
                return $c;
            }
        }
        return NULL;
    }

    public function eliminarCarrera(Carrera $carrera) {
        $i = 0;
        foreach ($this->carreras as $c) {
            if ($c->getId() == $carrera->getId()) {
                unset($this->organizaciones[i]);
            }
            $i++;
        }
    }

    public function insertarCarrera(Carrera $carrera) {
        $this->carreras[] = $carrera;
    }

    public function listarCarreras() {
        return $this->carreras;
    }

    public function listarCarrerasDisputadas() {
        $res = [];
        foreach ($this->carreras as $c) {
            if ($c->getFechaCelebracion() < new \DateTime("now")) {
                $res[] = $c;
            }
        }
        return $res;
    }

    public function listarCarrerasDisputadasOrganizacion(Organizacion $organizacion) {
        $res = [];
        foreach ($this->carreras as $c) {
            if ($c->getFechaCelebracion() < new \DateTime("now") && $c->getOrganizacion()->getId() == $organizacion->getId()) {
                $res[] = $c;
            }
        }
        return $res;
    }

    public function listarCarrerasSinDisputar() {
        $res = [];
        foreach ($this->carreras as $c) {
            if ($c->getFechaCelebracion() > new \DateTime("now")) {
                $res[] = $c;
            }
        }
        return $res;
    }

    public function listarCarrerasSinDisputarOrganizacion(Organizacion $organizacion) {
        $res = [];
        foreach ($this->carreras as $c) {
            if ($c->getOrganizacion()->getId() == $organizacion->getId() &&
                    $c->getFechaCelebracion() > new \DateTime("now")) {
                $res[] = $c;
            }
        }
        return $res;
    }

}
