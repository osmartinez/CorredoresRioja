<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CargaPaginasTest
 *
 * @author oscar
 */
namespace App\CorredoresRioja\Tests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class CargaPaginasTest extends WebTestCase{
    /**
     * @dataProvider urlProvider
     */
    
 public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $crawler = $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return array(
            array('/'),
            array('/corredores/carreras'),
            array('/corredores/carrera/carrera-ur'),
            array('/corredores/organizacion/matute'),
            array('/corredores/login'),
            array('/corredores/registro'),
            
            array('/runners/races'),
            array('/runners/race/carrera-ur'),
            array('/runners/organisation/matute'),
            array('/runners/login'),
            array('/runners/signup'),
        );
    }

}
