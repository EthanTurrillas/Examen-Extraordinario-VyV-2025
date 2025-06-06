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
    /**
     * @test
     */
    public function DadoUnPrestamoConCantidadDevuelveNombreYCantidad()
    {
        $gestionBiblioteca = new GestionBiblioteca();
        $cadena = "prestar dune 3";

        $resultado = $gestionBiblioteca->gestionPrestamos($cadena);

        $this->assertEquals($resultado, "dune x3");
    }

    /**
     * @test
     */
    public function SiNoHayLibroDevuelveError()
    {
        $gestionBiblioteca = new GestionBiblioteca();
        $cadena = "prestar";

        $resultado = $gestionBiblioteca->gestionPrestamos($cadena);

        $this->assertEquals($resultado, "Error: No se ha especificado un libro para prestar.");
    }
    /**
     * @test
     */
    public function SiNoSeIndicaAccionDevuelveError()
    {
        $gestionBiblioteca = new GestionBiblioteca();
        $cadena = "dune";

        $resultado = $gestionBiblioteca->gestionPrestamos($cadena);

        $this->assertEquals($resultado, "Error: Comando no reconocido.");
    }
    /**
     * @test
     */
    public function NoSeDistingueEntreMayusculasYMinusculas()
    {
        $gestionBiblioteca = new GestionBiblioteca();
        $cadena = "Prestar Dune";

        $resultado = $gestionBiblioteca->gestionPrestamos($cadena);

        $this->assertEquals($resultado, "dune x1");
    }
    /**
     * @test
     */
    public function SiHayLibrosYaPrestadosSeDevuelvenTodos()
    {
        $gestionBiblioteca = new GestionBiblioteca();
        $cadena1 = "prestar dune 2";
        $cadena2 = "prestar fundacion 2";

        $gestionBiblioteca->gestionPrestamos($cadena1);
        $resultado = $gestionBiblioteca->gestionPrestamos($cadena2);

        $this->assertEquals($resultado, "dune x2, fundacion x2");
    }
    /**
     * @test
     */
    public function SiElLibroYaEstaPrestadoSeSumaLaCantidad()
    {
        $gestionBiblioteca = new GestionBiblioteca();
        $cadena1 = "prestar dune";
        $cadena2 = "prestar dune 3";

        $gestionBiblioteca->gestionPrestamos($cadena1);
        $resultado = $gestionBiblioteca->gestionPrestamos($cadena2);

        $this->assertEquals($resultado, "dune x4");
    }

    /**
     * @test
     */
    public function ParaComandoLimpiarDevuelveStringVacio()
    {
        $gestionBiblioteca = new GestionBiblioteca();
        $cadena1 = "prestar dune";
        $cadena2 = "limpiar";

        $gestionBiblioteca->gestionPrestamos($cadena1);
        $resultado = $gestionBiblioteca->gestionPrestamos($cadena2);

        $this->assertEquals($resultado, "");
    }
}