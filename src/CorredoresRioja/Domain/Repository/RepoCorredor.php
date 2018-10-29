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
use App\CorredoresRioja\Domain\Model\Corredor;
interface RepoCorredor {
    //put your code here
    function insertarCorredor(Corredor $corredor);
    function actualizarCorredor(Corredor $corredor);
    function eliminarCorredor(Corredor $corredor);
    function buscarCorredor($dni);
    function listarCorredores();
}
