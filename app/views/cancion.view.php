<?php

class CancionView {
    private $user;

    public function setUser($user) {
        $this->user = $user;
    }

    public function renderDetail($cancion) {
        $user = $this->user;
        require_once __DIR__ . '/templates/canciones/detail.phtml';
    }

    public function renderForm($interpretes) {
        $user = $this->user;
        require_once __DIR__ . '/templates/canciones/form.phtml';
    }
    public function showAll($canciones) {
        require_once __DIR__ . '/templates/canciones/list.phtml';
}
}