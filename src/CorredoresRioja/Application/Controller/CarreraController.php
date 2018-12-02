<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Application\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\CorredoresRioja\Domain\Repository\RepoCarrera;
use App\CorredoresRioja\Domain\Repository\RepoOrganizacion;
use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;
use App\CorredoresRioja\Domain\Model\Corredor;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\CorredoresRioja\Domain\Repository\RepoCorredor;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\CorredoresRioja\Form\CorredorType;
use App\CorredoresRioja\Security\User\CorredorUser;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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
    private $router;
    private $participantesRepository;
    private $encoder;
    private $session;

    function __construct(RepoParticipante $participantesRepository, RepoCarrera $carrerasRepository, RepoOrganizacion $organizacionesRepository, UrlGeneratorInterface $router, Twig_Environment $twig, UserPasswordEncoderInterface $encoder, SessionInterface $session, RepoCorredor $corredoresRepository) {
        $this->carrerasRepository = $carrerasRepository;
        $this->organizacionesRepository = $organizacionesRepository;
        $this->twig = $twig;
        $this->corredoresRepository = $corredoresRepository;
        $this->participantesRepository = $participantesRepository;
        $this->encoder = $encoder;
        $this->session = $session;
        $this->router = $router;
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

    public function registro(Request $peticion) {
        $corredor = new Corredor("", "", "", "", "", "", null);
        $form = $this->createForm(CorredorType::class, $corredor);
        $form->handleRequest($peticion);
        if ($form->isSubmitted() && $form->isValid()) {
            // Recogemos el corredor que se ha registrado
            $corredor = $form->getData();
            $corredorUser = new CorredorUser("", "", "");
            // Codificamos la contraseña del corredor
            $password = $this->encoder->encodePassword($corredorUser, $corredor->getPassword());
            $corredor->saveEncodedPassword($password);
            // Lo almacenamos en nuestro repositorio de corredores
            $this->corredoresRepository->insertarCorredor($corredor);
            //$this->corredoresRepository->registrarCorredor($corredor);
            // Creamos un mensaje flash para mostrar al usuario que 
            // se ha registrado correctamente
            $this->session->getFlashBag()->add('info', '¡Enhorabuena, ' .
                    $corredor->getNombre() . ' te has registrado en CorredoresPorLaRioja!');
            // Reedirigimos al usuario a la portada 
            return $this->redirect($this->router->generate('index'));
        }
        return $this->render("@corredores/registro.html.twig", array('formulario' => $form->createView()));
    }

    public function miscarreras() {
        $user = $this->getUser();
        if ($user == NULL) {
            return $this->render(
                            '@corredores/login.html.twig', array(
                        // last username entered by the user
                        'last_username' => "",
                        'error' => "",
                            )
            );
        }
        $corredor = $this->corredoresRepository->buscarCorredor($user->getUsername());
        $carrerasDisputadas = $this->participantesRepository->listarCarrerasDisputadasDeCorredor($corredor);
        $carrerasPorDisputar = $this->participantesRepository->listarCarrerasSinDisputarDeCorredor($corredor);
        return new Response($this->twig->render('@corredores/miscarreras.html.twig', array('carreraspordisputar' => $carrerasPorDisputar, 'carrerasdisputadas' => $carrerasDisputadas)));
    }

    public function inscribirse($carreraid) {
        $user = $this->getUser();
        if ($user == NULL) {
            return $this->render(
                            '@corredores/login.html.twig', array(
                        // last username entered by the user
                        'last_username' => "",
                        'error' => "",
                            )
            );
        }
        $corredor = $this->corredoresRepository->buscarCorredor($user->getUsername());
        $carrera = $this->carrerasRepository->buscarCarreraPorId($carreraid);
        $this->participantesRepository->inscribirCorredor($corredor, $carrera);

        $carrerasDisputadas = $this->participantesRepository->listarCarrerasDisputadasDeCorredor($corredor);
        $carrerasPorDisputar = $this->participantesRepository->listarCarrerasSinDisputarDeCorredor($corredor);
        return new Response($this->twig->render('@corredores/miscarreras.html.twig', array('carreraspordisputar' => $carrerasPorDisputar, 'carrerasdisputadas' => $carrerasDisputadas)));
    }

    public function perfil(Request $peticion) {
        $user = $this->getUser();

        $corredor = $this->corredoresRepository->buscarCorredor($user->getUsername());
        $form = $this->createForm(CorredorType::class, $corredor);
        $form->handleRequest($peticion);
        if ($form->isSubmitted() && $form->isValid()) {
            // Recogemos el corredor que se ha registrado
            $corredor = $form->getData();
            $corredorUser = new CorredorUser("", "", "");
            // Codificamos la contraseña del corredor
            $password = $this->encoder->encodePassword($corredorUser, $corredor->getPassword());
            $corredor->saveEncodedPassword($password);
            // Lo almacenamos en nuestro repositorio de corredores
            $this->corredoresRepository->actualizarCorredor($corredor);
            //$this->corredoresRepository->registrarCorredor($corredor);
            // Creamos un mensaje flash para mostrar al usuario que 
            // se ha registrado correctamente
            $this->session->getFlashBag()->add('info', $corredor->getNombre() . ' has modificado tu perfil!');
            // Reedirigimos al usuario a la portada 
            return $this->redirect($this->router->generate('index'));
        }
        return $this->render("@corredores/miperfil.html.twig", array('formulario' => $form->createView()));
    }

    public function login(AuthenticationUtils $authenticationUtils) {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
                        '@corredores/login.html.twig', array(
                    // last username entered by the user
                    'last_username' => $lastUsername,
                    'error' => $error,
                        )
        );
    }

    public function redirigirALogin() {
        return $this->render(
                        '@corredores/login.html.twig');
    }

}
