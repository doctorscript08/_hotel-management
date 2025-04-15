<?php
    class Conexao {
        public static function conectar() {
            $conector = null;

            try {
                $conector = new mysqli('localhost', 'root', 'doctorscript', 'hotel_management');

                return $conector;
            } catch (mysqli_sql_exception $e) {
                return null;
                echo "
                    <script>
                        alert('Falha ao estabelecer conexão com o banco de dados!' '{$e}')
                    </script>
                ";
            }
        }
    }
?>