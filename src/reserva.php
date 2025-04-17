<?php
    session_start();
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
            <form action="">
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
                                echo "<option value='{$array_quartos[$c]['tipo']}'>{$array_quartos[$c]['tipo']}</option>";
                            }
                        ?>
                    </select>

                    <input type="date" name="check_in" id="check_in">
                    <input type="date" name="check_out" id="check_out">

                    <div class="servicos_extras">
                        <?php
                            $servico = new Servicos();

                            $array_servicos = $servico->consultar_servico($conector);

                            for ($c = 0; $c < count($array_servicos); $c++) {
                                echo "
                                    <p>
                                        <input type='checkbox' name='{$array_servicos[$c]['id_servico']}' id='{$array_servicos[$c]['id_servico']}'>
                                        
                                        <label for='{$array_servicos[$c]['id_servico']}'>{$array_servicos[$c]['nome_servico']}</label>
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
</body>

</html>