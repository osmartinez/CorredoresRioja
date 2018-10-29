<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnMemoriaRepoOrganizacion
 *
 * @author oscar
 */

namespace App\CorredoresRioja\Infrastructure\Repository;

use App\CorredoresRioja\Domain\Model\Organizacion;
use App\CorredoresRioja\Domain\Repository\RepoOrganizacion;

class EnMemoriaRepoOrganizacion implements RepoOrganizacion {

    private $organizaciones = [];

    public function __construct() {
        $this->organizaciones[] = new Organizacion(1, "Matute", "Pueblo Matute", "matute@gmail.com", 12345);
        $this->organizaciones[] = new Organizacion(2, "UR", "Servicio deportes UR", "deportes@unirioja.es", 123456);
    }

    //put your code here
    public function actualizarOrganizacion(Organizacion $organizacion) {
        $i = 0;
        foreach ($this->organizaciones as $o) {
            if ($o->getNombre() == $organizacion->getNombre()) {
                $this->organizaciones[i] = $organizacion;
            }
            $i++;
        }
    }

    public function buscarOrganizacionPorEmail($email) {
        foreach ($this->organizaciones as $o) {
            if ($o->getEmail() === $email) {
                return $o;
            }
        }
        return NULL;
    }

    public function buscarOrganizacionPorSlug($slug) {
        foreach ($this->organizaciones as $o) {
            if ($o->getSlug() === $slug) {
                return $org;
            }
        }
        return NULL;
    }

    public function eliminarOrganizacion(Organizacion $organizacion) {
        $i = 0;
        foreach ($this->organizaciones as $o) {
            if ($o->getId() == $organizacion->getId()) {
                unset($this->organizaciones[i]);
                return;
            }
            $i++;
        }
    }

    public function insertarOrganizacion(Organizacion $organizacion) {
        $this->organizaciones[] = $organizacion;
    }

    public function listarOrganizaciones() {
        return $this->organizaciones;
    }

}
