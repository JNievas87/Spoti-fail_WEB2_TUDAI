<?php

class InterpreteView {
    private $user;

    public function setUser($user) {
        $this->user = $user;
    }

    public function renderAll($interpretes) {
        $user = $this->user;
        require_once __DIR__ . '/templates/interprete/list.phtml';
    }

    public function renderDetail($interprete) {
        $user = $this->user;
        require_once __DIR__ . '/templates/interprete/detail.phtml';
    }
}