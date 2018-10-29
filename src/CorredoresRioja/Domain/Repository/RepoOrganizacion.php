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
use \App\CorredoresRioja\Domain\Model\Organizacion;
interface RepoOrganizacion {
    //put your code here
    function insertarOrganizacion(Organizacion $organizacion);
    function actualizarOrganizacion(Organizacion $organizacion);
    function eliminarOrganizacion(Organizacion $organizacion);
    function buscarOrganizacionPorSlug($slug);
    function buscarOrganizacionPorEmail($email);
    function listarOrganizaciones();
    
}
