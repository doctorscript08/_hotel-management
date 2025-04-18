<?php
    class Servicos {
        private $id, $nome, $preco;

        public function __construct($nome = null, $preco = null) {
            $this->nome = $nome;
            $this->preco = $preco;
        }

        public function consultar_servicos($conector) {
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

        public function calcular_total_dos_servicos_seleccionados($conector, $array_servicos, $estadia) {
            if (($conector !== null) && (!empty($conector))) {
                try {
                    $total = 0;
                    $servicos = implode(",", $array_servicos);

                    $buscar_servicos = $conector->query("SELECT preco FROM SERVICOS_EXTRAS WHERE id_servico IN ({$servicos})");

                    while ($precos = mysqli_fetch_assoc($buscar_servicos)) {
                        $total += $precos['preco'];
                    }

                    return $total * $estadia;
                } catch (mysqli_sql_exception $e) {
                    echo $e;
                }
            } else {
                return 0;
            }
        }
    }
?>