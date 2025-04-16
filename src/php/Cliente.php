<?php
    require_once 'Usuario.php';

    class Cliente extends Usuario {
        private $id;

        public function __construct($nome = null, $email = null, $password = null, $tel = null, $bi = null, $role = null) {
            parent::__construct($nome, $email, $password, $tel, $bi, $role);
        }

        public function cadastrar($conector) {
            if (($conector !== null) && (!empty($conector))) {
                $this->id = parent::cadastrar($conector);

                if (($this->id !== null) && ($this->id !== 0) && (!empty($this->id))) {
                    $inserir_cliente = $conector->query("INSERT INTO CLIENTES (id_cliente) VALUES ('{$this->id}')");
                }

                return $inserir_cliente ? true : false;
            } else {
                return false;
            }
        }
    }
?>