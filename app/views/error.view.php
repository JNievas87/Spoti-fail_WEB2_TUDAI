<?php

class ErrorView {

    public function renderError($mensaje) {
        require_once __DIR__ . '/templates/layout/header.phtml';
        require_once __DIR__ . '/templates/error.phtml';
        require_once __DIR__ . '/templates/layout/footer.phtml';
    }
}