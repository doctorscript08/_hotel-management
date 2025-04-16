<?php
    class Usuario {
        private $id, $nome, $email, $password, $tel, $bi, $role;

        public function __construct($nome = null, $email = null, $password = null, $tel = null, $bi = null, $role = null) {
            $this->nome = $nome;
            $this->email = $email;
            $this->password = $password;
            $this->tel = $tel;
            $this->bi = $bi;
            $this->role = $role;
        }

        protected function cadastrar($conector) {
            if (($conector !== null) && (!empty($conector))) {
                try {
                    $inserir_usuario = $conector->query("INSERT INTO USUARIOS (nome, email, num_tel, bi, role, palavra_passe) VALUES ('{$this->nome}', '{$this->email}', '{$this->tel}', '{$this->bi}', '{$this->role}', '{$this->password}')");

                    return $inserir_usuario ? $this->pesquisar_usuario_por_email_password($conector) : null;
                } catch (mysqli_sql_exception $e) {
                    echo $e;
                }
            } else {
                return null;
            }
        }

        public function logar($conector) {
            if (($conector !== null) && (!empty($conector))) {
                try {
                    $logar_usuario = $conector->query("SELECT id_usuario, nome, email, role FROM USUARIOS WHERE email = '{$this->email}' and palavra_passe = '{$this->password}'");

                    $dados_usuario = $logar_usuario->num_rows > 0 ? mysqli_fetch_assoc($logar_usuario) : null;

                    return $dados_usuario;
                } catch (mysqli_sql_exception $e) {
                    echo $e;
                }
            } else {
                return null;
            }
        }

        protected function pesquisar_usuario_por_email_password($conector) {
            if (($conector !== null) && (!empty($conector))) {
                $pesquisar_id_usuario = $conector->query("SELECT id_usuario FROM USUARIOS WHERE email = '{$this->email}' and palavra_passe = '{$this->password}'");

                $this->id = $pesquisar_id_usuario->num_rows > 0 ? mysqli_fetch_assoc($pesquisar_id_usuario)['id_usuario'] : 0;
                return $this->id;
            } else {
                $this->id = 0;
                return $this->id;
            }
        }
    }
