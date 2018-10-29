<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrera
 *
 * @author oscar
 */
namespace App\CorredoresRioja\Domain\Model;

class Carrera {
    //put your code here
    private $id;
    private $nombre;
    private $descripcion;
    private $fechaCelebracion;
    private $distancia;
    private $fechaLimiteInscripcion;
    private $numeroMaximoParticipantes;
    private $imagen;
    private $slug;
    private $organizacion;
    
    function __construct($id, $nombre, $descripcion, $fechaCelebracion, $distancia, $fechaLimiteInscripcion, $numeroMaximoParticipantes, $imagen, $organizacion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaCelebracion = $fechaCelebracion;
        $this->distancia = $distancia;
        $this->fechaLimiteInscripcion = $fechaLimiteInscripcion;
        $this->numeroMaximoParticipantes = $numeroMaximoParticipantes;
        $this->imagen = $imagen;
        $this->organizacion = $organizacion;
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

    function getFechaCelebracion() {
        return $this->fechaCelebracion;
    }

    function getDistancia() {
        return $this->distancia;
    }

    function getFechaLimiteInscripcion() {
        return $this->fechaLimiteInscripcion;
    }

    function getNumeroMaximoParticipantes() {
        return $this->numeroMaximoParticipantes;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getSlug() {
        return $this->slug;
    }

    function getOrganizacion() {
        return $this->organizacion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFechaCelebracion($fechaCelebracion) {
        $this->fechaCelebracion = $fechaCelebracion;
    }

    function setDistancia($distancia) {
        $this->distancia = $distancia;
    }

    function setFechaLimiteInscripcion($fechaLimiteInscripcion) {
        $this->fechaLimiteInscripcion = $fechaLimiteInscripcion;
    }

    function setNumeroMaximoParticipantes($numeroMaximoParticipantes) {
        $this->numeroMaximoParticipantes = $numeroMaximoParticipantes;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setSlug($slug) {
        $this->slug = $slug;
    }

    function setOrganizacion($organizacion) {
        $this->organizacion = $organizacion;
    }
    public function __toString() {
        return $this->getNombre()." ".$this->getDescripcion();
    }

}
