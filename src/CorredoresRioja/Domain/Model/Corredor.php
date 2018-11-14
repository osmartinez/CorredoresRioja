<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Corredor
 *
 * @author oscar
 */

namespace App\CorredoresRioja\Domain\Model;
use Symfony\Component\Validator\Constraints as Assert;
class Corredor {

    //put your code here
    private $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $salt;
    private $direccion;
    private $fechaNacimiento;

    public function __construct($dni, $nombre, $apellidos, $email, $password, $direc, $fecha) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->direccion = $direc;
        $this->fechaNacimiento = $fecha;
        $this->salt = "";
    }

    function getDni() {
        return $this->dni;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getSalt() {
        return $this->salt;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    /**
     * @Assert\IsTrue(message = "La contraseña no puede ser la misma que tu nombre")
     */
    public function isPasswordLegal() {
        return $this->nombre != $this->password;
    }

    /**
     * @Assert\IsTrue(message = "Tienes que ser mayor de edad para registrarte")
     */
    public function isMayorEdad() {
        $currentyear = getdate()['year'];
        $birthdayyear = ($this->fechaNacimiento->format('Y'));
        $diff_years = ($currentyear - $birthdayyear);
        return $diff_years >= 18;
    }

    public function saveEncodedPassword($password){
        $this->password=$password;
    }
    
    function __toString() {
        return $this->nombre + " " + $this->apellidos;
    }

}
