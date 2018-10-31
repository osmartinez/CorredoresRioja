<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Application\Controller;

use App\CorredoresRioja\Domain\Repository\RepoCarrera;
use App\CorredoresRioja\Domain\Repository\RepoOrganizacion;
use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;
use App\CorredoresRioja\Domain\Repository\RepoCorredor;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\CorredoresRioja\Domain\Repository\RepoParticipante;

/**
 * Description of CarreraController
 *
 * @author oscar
 */

class CarreraController extends AbstractController {

    private $carrerasRepository;
    private $organizacionesRepository;
    private $corredoresRepository;
    private $twig;
    private $participantesRepository;

    function __construct(RepoParticipante $participantesRepository, RepoCarrera $carrerasRepository, RepoOrganizacion $organizacionesRepository, Twig_Environment $twig,RepoCorredor $corredoresRepository) {
        $this->carrerasRepository = $carrerasRepository;
        $this->organizacionesRepository = $organizacionesRepository;
        $this->twig = $twig;
        $this->corredoresRepository = $corredoresRepository;
        $this->participantesRepository = $participantesRepository;
    }

    function index() {
        $carreras = $this->carrerasRepository->listarCarreras();
        return new Response('Bienvenido.<br/> Carreras por disputar:<br/> ' . implode("<br/>", $carreras));
    }

    function showCarrera($slug) {
        $carrera = $this->carrerasRepository->buscarCarreraPorSlug($slug);
//        return new Response($this->twig->render('@corredores/carrera.html.twig', array('carrera' => $carrera)));
        return $this->render('@corredores/carrera.html.twig', array('carrera' => $carrera));
    }

    function showAllCarreras() {

        $carrerasDisputadas = $this->carrerasRepository->listarCarrerasDisputadas();
        $carrerasPorDisputar = $this->carrerasRepository->listarCarrerasSinDisputar();
        return new Response($this->twig->render('@corredores/carreras.html.twig', array('carreraspordisputar' => $carrerasPorDisputar, 'carrerasdisputadas' => $carrerasDisputadas)));
    }

    function infoOrganizacion($slug) {
        $organizacion = $this->organizacionesRepository->buscarOrganizacionPorSlug($slug);
        return new Response($this->twig->render('@corredores/organizacion.html.twig', array('organizacion' => $organizacion)));
    }



}
