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
class Corredor {
    //put your code here
    private  $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $salt;
    private $direccion;
    private $fechaNacimiento;
    public function __construct($dni,$nombre,$apellidos,$email,$password,$direc,$fecha) {
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->password=$password;
        $this->direccion=$direc;
        $this->fechaNacimiento=$fecha;
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

        
    function __toString() {
        return $this->nombre+ " "+$this->apellidos;
    }
    
}
