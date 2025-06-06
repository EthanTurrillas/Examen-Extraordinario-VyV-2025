<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\GestionBiblioteca;
use PHPUnit\Framework\TestCase;

class GestionBibliotecaTest extends TestCase
{
    /**
     * @test
     */
    public function DadoUnPrestamoDevuelveNombreYCantidad()
    {
        $gestionBiblioteca = new GestionBiblioteca();
        $string = "prestar dune";

        $resultado = $gestionBiblioteca->prestamo($string);

        $this->assertEquals($resultado, "dune x1");
    }
}