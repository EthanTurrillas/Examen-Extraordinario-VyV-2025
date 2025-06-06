<?php

namespace Deg540\DockerPHPBoilerplate;

class GestionBiblioteca
{
    private $libros = [];
    public function gestionPrestamos($cadena)
    {
        $cadena = strtolower($cadena);
        $partes = explode(' ', $cadena);
        if ($partes[0] == 'prestar') {
            $this->libros[] = $this->prestamo($partes);
        }
        else
        {
            return "Error: Comando no reconocido.";
        }
        return $this->devolverLibros($this->libros);
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

    private function devolverLibros(array $libros)
    {
        if (empty($libros)) {
            return "Lista de libros vacía.";
        }
        return implode(', ', $libros);
    }
}