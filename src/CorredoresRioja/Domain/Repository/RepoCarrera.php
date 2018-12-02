<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author oscar
 */

namespace App\CorredoresRioja\Domain\Repository;

use \App\CorredoresRioja\Domain\Model\Carrera;
use \App\CorredoresRioja\Domain\Model\Organizacion;

interface RepoCarrera {

    //put your code here
    function insertarCarrera(Carrera $carrera);

    function actualizarCarrera(Carrera $carrera);

    function eliminarCarrera(Carrera $carrera);

    function buscarCarreraPorId($id);

    function buscarCarreraPorSlug($carrera);

    function listarCarrerasDisputadasOrganizacion(Organizacion $organizacion);

    function listarCarrerasSinDisputarOrganizacion(Organizacion $organizacion);

    function listarCarreras();

    function listarCarrerasDisputadas();

    function listarCarrerasSinDisputar();
}
