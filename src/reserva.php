<?php
    session_start();
    date_default_timezone_set('Africa/Luanda');

    require_once './php/Conexao.php';
    require_once './php/Quarto.php';
    require_once './php/Servicos.php';

    if (isset($_SESSION['id_usuario'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['role'])) {
        $login = true;
        $id_usuario = $_SESSION['id_usuario'];
        $nome = $_SESSION['nome'];
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
        $conector = Conexao::conectar();
    } else {
        $login = false;
    }
?>
<!DOCTYPE html>
<html lang="pt-AO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="./assets/css/reserva.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        .hidde {
            display: none;
        }

        #quartos {
            text-transform: uppercase;
        }

        input[type="checkbox"] {
            accent-color: black;
        }

        label {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <h2>HOTEL <span>MANAGEMENT</span></h2>
        </div>
        <nav class="nav-bar">
            <ul>
                <li class="nav-item"><a href="../index.php" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="./src/reserva.php" class="nav-link">RESERVAS</a></li>
                <li class="nav-item"><a href="sobre_nos.php" class="nav-link">SOBRE NÓS</a></li>
                <li class="nav-item <?= $login ? '' : 'hidde' ?>"><a href="#" class="nav-link">PERFIL</a></li>
                <li class="nav-item <?= $login ? 'hidde' : '' ?>"><a href="./src/login.php" class="nav-link">LOGIN</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="tblC">
            <table>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>
        </div>
        <div class="form">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <fieldset>
                    <h2>Nova Reserva</h2>
                    <label for="cliente">Reserva para:</label>
                    <input type="text" name="cliente" id="cliente" value="<?=$nome?>" readonly>
                    <label for="quartos">Tipo de quarto</label>
                    <select name="quartos" id="quartos">
                        <?php
                            $quarto = new Quarto();
                            $array_quartos = $quarto->consultar_quartos_disponiveis($conector);

                            for ($c = 0; $c < count($array_quartos); $c++) {
                                echo "<option value='{$array_quartos[$c]['id_quarto']}'>{$array_quartos[$c]['tipo']} - {$array_quartos[$c]['preco']} AOA/dia</option>";
                            }
                        ?>
                    </select>

                    <input type="date" name="check_in" id="check_in">
                    <input type="date" name="check_out" id="check_out">

                    <div class="servicos_extras">
                        <?php
                            $servico = new Servicos();

                            $array_servicos = $servico->consultar_servicos($conector);

                            for ($c = 0; $c < count($array_servicos); $c++) {
                                $id_servico = $array_servicos[$c]['id_servico'];
                                $nome_servico = $array_servicos[$c]['nome_servico'];
                                $preco = $array_servicos[$c]['preco'];


                                echo "
                                    <p>
                                        <input 
                                            type='checkbox' 
                                            name='servicos[]' 
                                            id='servico$id_servico' 
                                            value='$id_servico'

                                        >
                                        
                                        <label for='servico$id_servico'>      
                                            $nome_servico - $preco AOA/dia
                                        </label>
                                    </p>
                                ";
                            }
                        ?>
                    </div>
                    <input type="submit" value="Reservar">
                </fieldset>
            </form>
        </div>
    </main>
    <footer>
        <p>
            &copy; 2025 - Todos os Direitos Reservados.
        </p>
        <p>
            Desenvolvido por Inforgest Turma B.
        </p>
    </footer>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data_registro = date('Y-m-d H:i:s');

            $check_in = new DateTime($_POST['check_in']);
            $check_out = new DateTime($_POST['check_out']);
            $id_quarto = $_POST['quartos'];
            $array_servicos = !empty($_POST['servicos']) ? $_POST['servicos'] : null;

            $estadia = (int) $check_out->diff($check_in)->days;

            $total_quarto = $quarto->calcular_total_do_quarto($conector, $id_quarto, $estadia);
            $total_servicos = $servico->calcular_total_dos_servicos_seleccionados($conector, $array_servicos, $estadia);
            $total_reserva = $total_quarto + $total_servicos;

            print_r($total_reserva);
        }
    ?>
</body>

</html>