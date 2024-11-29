<?php
class Rutas {
    protected $urlBase = "http://localhost/nueve/administrador/admin";

    public function __construct() {
        // Constructor vacío
    }

    // Método para obtener la URL base
    public function obtenerUrlBase() {
        return $this->urlBase;
    }

    // Método para obtener el enlace al menú de inicio
    public function obtenerMenuInicio() {
        return '<a href="' . htmlspecialchars($this->urlBase . '/index.php') . '">Inicio</a>';
    }

    // Método para obtener el enlace al menú "Nuevo"
    public function obtenerMenuNuevo() {
        return '<a href="' . htmlspecialchars($this->urlBase . '/nuevo.php') . '">Nuevo</a>';
    }

    // Método para obtener el enlace al menú "Modificar"
    public function obtenerMenuModificar($id) {
        return '<a href="' . htmlspecialchars($this->urlBase . '/modificar.php?id=' . urlencode($id)) . '">Modificar</a>';
    }

    // Método para obtener el enlace al menú "Eliminar"
    public function obtenerMenuEliminar($id) {
        return '<a href="' . htmlspecialchars($this->urlBase . '/eliminar.php?id=' . urlencode($id)) . '">Eliminar</a>';
    }
}
?>
