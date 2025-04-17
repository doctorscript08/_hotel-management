<?php
    class Reservas {
        private $id, $data_registro, $data_check_in, $data_check_out, $status, $forma_de_pagamento, $cliente, $quarto, $total, $nome_do_cliente_temporario;

        public function __construct($data_registro = null, $data_check_in = null, $data_check_out = null, $status = null, $forma_de_pagamento = null, $cliente = null, $quarto = null, $total = null, $nome_do_cliente_temporario = null) {
            $this->data_registro = $data_registro;
            $this->data_check_in = $data_check_in;
            $this->data_check_out = $data_check_out;
            $this->status = $status;
            $this->forma_de_pagamento = $forma_de_pagamento;
            $this->cliente = $cliente;
            $this->quarto = $quarto;
            $this->total = $total;
            $this->nome_do_cliente_temporario = $nome_do_cliente_temporario;
        }
    }
?>