<?php
class SessionMiddleware {
    public function run($req) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION["id"])) {
            $req->user = new StdClass();
            $req->user->id = $_SESSION["id"];
            $req->user->user = $_SESSION["user"]; 
        } else {
            $req->user = null;
        }
        return $req;
    }
}