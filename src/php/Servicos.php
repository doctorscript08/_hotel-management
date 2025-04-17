<?php
    class Servicos {
        private $id, $nome, $preco;

        public function __construct($nome = null, $preco = null) {
            $this->nome = $nome;
            $this->preco = $preco;
        }

        public function consultar_servico($conector) {
            if (($conector !== null) && (!empty($conector))) {
                try {
                    $buscar_servicos = $conector->query("SELECT * FROM SERVICOS_EXTRAS");

                    $array_servicos = [];
                    $i = 0;

                    if (mysqli_num_rows($buscar_servicos) > 0) {
                        while ($dados_servicos = mysqli_fetch_assoc($buscar_servicos)) {
                            $array_servicos[$i] = $dados_servicos;
                            $i++;
                        }
                    } else {
                        return null;
                    }

                    return $array_servicos;
                } catch (mysqli_sql_exception $e) {
                    echo $e;
                }
            } else {
                return null;
            }
        }
    }
?>