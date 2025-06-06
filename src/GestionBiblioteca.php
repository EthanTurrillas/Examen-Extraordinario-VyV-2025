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
        elseif ($partes[0] == 'devolver') {
            if (!$this->comprobarLibroPrestado($partes)) {
                return "El libro indicado no está en préstamo";
            }
            $this->devolucion($partes);
        }
        elseif ($partes[0] == 'limpiar') {
            $this->libros = [];
            return "";
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
            return "";
        }
        return implode(', ', $libros);
    }

    private function comprobarLibroPrestado($partes)
    {
        $libro = $partes[1];
        foreach ($this->libros as $prestado) {
            if (str_contains($prestado, $libro)) {
                return true;
            }
        }
        return false;
    }

    private function devolucion($partes)
    {
        if (count($partes) <= 1) {
            return "Error: No se ha especificado un libro para devolver.";
        }
        $libro = $partes[1];

        $this->eliminarLibro($libro);
    }

    private function eliminarLibro(mixed $libro)
    {
        foreach ($this->libros as $key => $prestado) {
            if (str_contains($prestado, $libro)) {
                unset($this->libros[$key]);
            }
        }
    }
}