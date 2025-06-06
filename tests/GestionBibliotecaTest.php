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
        $cadena = "prestar dune";

        $resultado = $gestionBiblioteca->gestionPrestamos($cadena);

        $this->assertEquals($resultado, "dune x1");
    }
}