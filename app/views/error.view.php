<?php

class ErrorView {

    public function renderError($mensaje) {
        require_once __DIR__ . '/../layout/header.phtml'; 

        // Cargamos el template especifico del error
        // PHP hace que la variable $mensaje sea visible dentro de error.phtml
        require_once __DIR__ . '/templates/error.phtml';

        require_once __DIR__ . '/../layout/footer.phtml';
    }
}