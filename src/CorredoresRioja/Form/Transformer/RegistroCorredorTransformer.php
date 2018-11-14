<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistroCorredorTransformer
 *
 * @author oscar
 */
namespace App\CorredoresRioja\Form\Transformer;
use Symfony\Component\Form\DataTransformerInterface;
use App\CorredoresRioja\Form\DTO\RegistroCorredorCommand;
use App\CorredoresRioja\Domain\Model\Corredor;


class RegistroCorredorTransformer implements DataTransformerInterface {
    public function reverseTransform($value) {
         // Construye un objeto de la clase Corredor a partir de un objeto
         // de la clase RegistroCorredorCommand y lo devuelve
        return new Corredor($value->dni, $value->nombre, $value->apellidos, $value->email, $value->password, $value->direccion, $value->fechanacimiento);
    }

    public function transform($value) {
          // Construye un objeto de la clase RegistroCorredorCommand a partir de un objeto
         // de la clase Corredor y lo devuelve
         $rcc = new RegistroCorredorCommand();
         $rcc->dni = $value->getDni();
         $rcc->nombre = $value->getNombre();
         $rcc->apellidos = $value->getApellidos();
         $rcc->email = $value->getEmail();
         $rcc->password = $value->getPassword();
         $rcc->direccion = $value->getDireccion();
         $rcc->fechanacimiento = $value->getFechaNacimiento();
         return $rcc;
    }
}
