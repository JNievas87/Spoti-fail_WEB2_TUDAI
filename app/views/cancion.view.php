<?php

class CancionView {
    public $user = null;

    public function setReq($req) {
        $this->user = $req->user;
    }

    public function renderDetail($cancion) {
        require_once __DIR__ . '/templates/canciones/detail.phtml'; 
    }

    public function renderForm($interpretes) {
        require_once __DIR__ . '/templates/canciones/form.phtml';
    }

    public function showAll($canciones) {
        require_once __DIR__ . '/templates/canciones/list.phtml';
    }
}