<?php

class CancionView {
    // Almacena el usuario de la sesión, usado en las plantillas para mostrar opciones de administración
    public $user = null;

    // Recibe el objeto request y extrae el usuario de la sesión
    public function setReq($req) {
        $this->user = $req->user;
    }

    // Carga la plantilla de detalle de canción
    public function renderDetail($cancion) {
        require_once __DIR__ . '/templates/canciones/detail.phtml'; 
    }

    // Carga el formulario de alta o modificación
    // Si $cancion es null, el formulario se usa para agregar, si no, para editar
    public function renderForm($interpretes, $cancion = null) {
        require_once __DIR__ . '/templates/canciones/form.phtml';
    }

    // Carga la plantilla del listado de canciones
    public function showAll($canciones) {
        require_once __DIR__ . '/templates/canciones/list.phtml';
    }
}