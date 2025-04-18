<?php
    class Quarto {
        private $id, $tipo, $status, $preco;

        public function __construct($tipo = null, $status = null, $preco = null, ) {
            $this->tipo = $tipo;
            $this->status = $status;
            $this->preco = $preco;
        }

        public function consultar_quartos_disponiveis($conector) {
            if (($conector !== null) && (!empty($conector))) {
                try {
                    $buscar_quartos = $conector->query("SELECT * FROM QUARTOS WHERE status = 'disponivel'");

                    $array_quartos = [];
                    $i = 0;
                    if (mysqli_num_rows($buscar_quartos) > 0) {
                        $dados_quartos = null;

                        while ($dados_quartos = mysqli_fetch_assoc($buscar_quartos)) {
                            $array_quartos[$i] = $dados_quartos;
                            $i++;
                        }
                    } else {
                        return null;
                    }

                    return $array_quartos;
                } catch (mysqli_sql_exception $e) {
                    echo $e;
                }
            } else {
                return null;
            }
        }

        public function calcular_total_do_quarto($conector, $id_quarto, $estadia) {
            if (($conector !== null) && (!empty($conector))) {
                try {
                    $total = 0;
                    $buscar_preco = $conector->query("SELECT preco FROM QUARTOS WHERE id_quarto = '{$id_quarto}'");

                    $total = mysqli_num_rows($buscar_preco) > 0 ? (mysqli_fetch_assoc($buscar_preco)['preco'] * $estadia) : 0;

                    return $total;
                } catch (mysqli_sql_exception $e) {
                    echo $e;
                }
            } else {
                return 0;
            }
        }
    }
?>