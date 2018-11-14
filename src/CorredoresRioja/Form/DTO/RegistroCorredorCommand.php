<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistroCorredorCommand
 *
 * @author oscar
 */
namespace App\CorredoresRioja\Form\DTO;
use Symfony\Component\Validator\Constraints as Assert;

class RegistroCorredorCommand {
    
    /**
     * @Assert\NotBlank()
     */
    public $dni;
    /**
     * @Assert\NotBlank()
     */
    public $nombre;
    /**
     * @Assert\NotBlank()
     */
    public $apellidos;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;
    
    /**
     * @Assert\NotBlank()
     */
    public $password;
    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    public $fechanacimiento;
    
    /**
     * @Assert\NotBlank()
     */
    public $direccion;
}
