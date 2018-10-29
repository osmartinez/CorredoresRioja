<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Application\Controller;
use App\CorredoresRioja\Domain\Repository\RepoOrganizacion;

/**
 * Description of OrganizacionController
 *
 * @author oscar
 */
class OrganizacionController {
    //put your code here
    
    private $repoOrganizacion;
    
    public function __construct(RepoOrganizacion $repo) {
        $this->repoOrganizacion= $repo;
    }
    
    public function info(){
        return new Response(implode("<br/>", null));
    }
}
