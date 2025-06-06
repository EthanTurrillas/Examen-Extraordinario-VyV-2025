<?php

namespace Deg540\DockerPHPBoilerplate;

class GestionBiblioteca
{
    public function gestionPrestamos($cadena)
    {
        $cadena = strtolower($cadena);
        $partes = explode(' ', $cadena);
        if ($partes[0] == 'prestar') {
            return $this->prestamo($partes);
        }
        return "Error: Comando no reconocido.";
    }

    private function prestamo($partes)
    {
        if (count($partes) <= 1) {
            return "Error: No se ha especificado un libro para prestar.";
        }

        $libro = $partes[1];
        if (isset($partes[2])) {
            $cantidad = $partes[2];
        }
        else{
            $cantidad = 1;
        }

        return "$libro x$cantidad";
    }
}