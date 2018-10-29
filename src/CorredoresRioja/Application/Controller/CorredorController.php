<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CorredorController
 *
 * @author oscar
 */
namespace App\CorredoresRioja\Application\Controller;
use App\CorredoresRioja\Domain\Repository\RepoCorredor;
class CorredorController {
    //put your code here
    
    private $repositorioCorredor;
    
    public function __construct(RepoCorredor $repo) {
        $this->repositorioCorredor= $repo;
    }
    
    public function bienvenida(){
        
    }
}
