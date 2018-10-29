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
use App\CorredoresRioja\Domain\Model\Participante;
use App\CorredoresRioja\Domain\Model\Corredor;
interface RepoParticipante {
    //put your code here
    function inscribirCorredor(Corredor $corredor, Carrera $carrera);
    function listarParticipantes(Carrera $carrera);
    function listarCarrerasDisputadasDeCorredor(Corredor $corredor);
    function listarCarrerasSinDisputarDeCorredor(Corredor $corredor);
    function estaInscrito(Corredor $corredor,Carrera $carrera);
    function actualizarTiempo(Corredor $corredor,Carrera $carrera);
    function eliminarParticipante(Participante $participante);
}
