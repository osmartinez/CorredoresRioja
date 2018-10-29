<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Organizacion
 *
 * @author oscar
 */
namespace App\CorredoresRioja\Domain\Model;
use App\CorredoresRioja\Utils\Utils;
class Organizacion {

    //put your code here
    private $id;
    private $nombre;
    private $descripcion;
    private $email;
    private $password;
    private $salt;
    private $slug;

    public function __construct($id, $nombre, $descripcion, $email, $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->email = $email;
        $this->password = $password;
        $this->salt = "";
        $this->slug = Utils::getSlug($nombre);
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
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

    function getSlug() {
        return $this->slug;
    }

    function __toString() {
        return $this->nombre;
    }
}
