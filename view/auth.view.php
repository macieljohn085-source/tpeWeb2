<?php

class AuthView {
    private $user = null;

    public function __construct() {
        // Si hay una sesión activa, guardamos el nombre para el header
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['USERNAME'])) {
            $this->user = $_SESSION['USERNAME'];
        }
    }

    public function showLogin() {
        // La clase View se encarga de llamar al template real
        require_once __DIR__ . '/templates/login.form.phtml';
    }
}