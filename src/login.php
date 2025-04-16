<?php
    session_start();
    require_once './php/Conexao.php';
    require_once './php/Usuario.php';

    if (isset($_POST['email'], $_POST['password'], $_POST['confirm_password']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

        if ($_POST['password'] === $_POST['confirm_password']) {
            $usuario = new Usuario('', $_POST['email'], $_POST['password']);
            $dados_usuario = $usuario->logar(Conexao::conectar());

            if ($dados_usuario !== null) {
                $_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
                $_SESSION['nome'] = $dados_usuario['nome'];
                $_SESSION['email'] = $dados_usuario['email'];
                $_SESSION['role'] = $dados_usuario['role'];

                switch ($dados_usuario['role']) {
                    case 'cliente':
                        header('Location: http://localhost/_hotel-management/index.php');
                        break;
                    case 'funcionario':
                        header('Location: http://localhost/_hotel-management/src/dashboard_funcionario.php');
                        break;
                    case 'admin':
                        header('Location: http://localhost/_hotel-management/src/dashboard_admin.php');
                        break;
                    default:
                        header('Location: http://localhost/_hotel-management/src/login.php');
                        break;
                }
                exit();
            } else {
                echo "
                    <script>
                        alert('As palavras passe devem ser iguais!')
                    </script>
                ";
            }
        }
    } else {
        echo "
            <script>
                alert('Falha ao efectuar login!')
            </script>
        ";
    }
?>
<!DOCTYPE html>
<html lang="pt-AO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <header>
        <div class="logo">
            HOTEL<span>MANAGEMENT</span>
        </div>
        <nav class="nav-bar">
            <ul>
                <li class="nav-item"><a href="../index.php" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="reserva.php" class="nav-link">RESERVA</a></li>
                <li class="nav-item"><a href="checks.php" class="nav-link">CHECK-IN/CHECK-OUT</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">LOGIN</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <fieldset>
            <div class="ilust">
                <img src="./assets/images/login-copy.png" alt="">
            </div>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <h2>Login</h2>
                <p>Ainda não tem uma conta?<a href="cadastro.php">Criar</a></p>

                <input type="email" name="email" id="email" placeholder="E-mail" required>

                <input type="password" name="password" id="password" placeholder="Senha" required>

                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confrimar Senha" required>

                <p>Esqueceu a senha?</p>
                <input type="submit" value="Login">
            </form>

        </fieldset>
    </main>
    <footer>
        <p>
            &copy;sergioSapalalo
        </p>
    </footer>
</body>

</html>