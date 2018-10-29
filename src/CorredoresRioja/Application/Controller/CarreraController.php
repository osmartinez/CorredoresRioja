<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Application\Controller;

/**
 * Description of CarreraController
 *
 * @author oscar
 */
use App\CorredoresRioja\Domain\Repository\RepoCarrera;
use Symfony\Component\HttpFoundation\Response;
class CarreraController {

    //put your code here

    private $repoCarrera;

    public function __construct(RepoCarrera $repo) {
        $this->repoCarrera = $repo;
    }

    public function showSinDisputar() {
        return new Response(implode("<br/>", $this->repoCarrera->listarCarrerasSinDisputar()));
    }
    
    public function infoCarrera($slug){
        return new Response (implode ("<br/>",$this->repoCarrera->buscarCarreraPorSlug($slug)));
    }

    public function showCarreras() {
        return new Response(implode("<br/>", $this->repoCarrera->listarCarreras()));
    }
}
