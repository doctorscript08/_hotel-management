<?php
    abstract class Usuario {
        private $id, $nome, $email, $password, $tel, $bi, $role;

        public function __construct($nome, $email, $password, $tel, $bi, $role) {
            $this->nome = $nome;
            $this->email = $email;
            $this->password = $password;
            $this->password = $tel;
            $this->bi = $bi;
            $this->role = $role;
        }

        public function cadastrar($conector) {
            if (($conector !== null) && (!empty($conector))) {
                $inserir_usuario = $conector->query("INSERT INTO USUARIOS (nome, email, num_tel, bi, role, palavra_passe) VALUES ('{$this->nome}', '{$this->email}', '{$this->tel}', '{$this->bi}', '{$this->role}', '{$this->password}')");

                if ($inserir_usuario) {
                    $this->pesquisar_id($conector);

                    $inserir_cliente = $conector->query("INSERT INTO CLIENTES (id_cliente) VALUES ('{$this->id}')");
                } else {
                    echo "
                        <script>
                            alert('Falha ao inserir usuário!Tente novamente!')
                        </script>
                    ";
                }
            } else {
                return false;
            }
        }

        protected pesquisar_id ($conector) {
            if (($conector !== null) && (!empty($conector))) {
                $pesquisar_id_usuario = $conector->query("SELECT id_usuario FROM USUARIOS WHERE email = '{$this->email}' and palavra_passe = '{$this->password}'");

                $this->id = mysqli_fetch_assoc($pesquisar_id_usuario)['id_usuario'];
            } else {
                $this->id = 0;
            }
        }
    }
?>