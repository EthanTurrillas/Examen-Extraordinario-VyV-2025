<?php

namespace Deg540\DockerPHPBoilerplate;

class GestionBiblioteca
{
    public function gestionPrestamos($cadena)
    {
        $partes = explode(' ', $cadena);

        $libro = $partes[1];
        $cantidad = 1;

        return "$libro x$cantidad";
    }
}