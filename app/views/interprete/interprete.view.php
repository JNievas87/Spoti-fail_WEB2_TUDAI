<?php

class InterpreteView {
    private $user;

    public function setUser($user) {
        $this->user = $user;
    }

    public function renderAll($interpretes) {
    require __DIR__ . '/../templates/list.phtml';
}

    public function renderDetail($interprete) {
    require __DIR__ . '/../templates/detail.phtml';
}
}