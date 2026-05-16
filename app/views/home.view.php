<?php

class HomeView {
    
    public $user = null;

    
    public function setReq($req) {
        $this->user = $req->user;
    }

    public function renderHome($canciones) {
        
        require_once __DIR__ . '/templates/home/carrouselHome.phtml'; 
    }
}