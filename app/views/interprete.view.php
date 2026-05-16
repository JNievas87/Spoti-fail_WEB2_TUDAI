<?php

class InterpreteView {
    private $user;
    private $req;

    public function setReq($req) {
        $this->req = $req;
        $this->user = (isset($req->user)) ? $req->user : null;
    }

    public function renderAll($interpretes) {
        $user = $this->user;
        $req = $this->req;
        require_once __DIR__ . '/templates/interprete/list.phtml';
    }

    public function renderDetail($interprete) {
        $user = $this->user;
        $req = $this->req;
        require_once __DIR__ . '/templates/interprete/detail.phtml';
    }

    public function renderForm($interprete) {
        $user = $this->user;
        $req = $this->req;
        require_once __DIR__ . '/templates/interprete/form.phtml';
    }
}