<?php
    require_once 'Usuario.php';

    class Cliente extends Usuario {
        private $id;

        public function __construct($nome, $email, $password, $tel, $bi, $role) {
            parent::__construct($nome, $email, $password, $tel, $bi, $role);
        }
    }
?>