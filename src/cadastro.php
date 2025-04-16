<?php
    session_start();
    require_once './php/Conexao.php';
    require_once './php/Cliente.php';

    if (isset($_POST['nome'], $_POST['email'], $_POST['tel'], $_POST['bi'], $_POST['password'], $_POST['confirm_password']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if ($_POST['password'] === $_POST['confirm_password']) {
            $cliente = new Cliente($_POST['nome'], $_POST['email'], $_POST['password'], $_POST['tel'], $_POST['bi'], 'cliente');

            if ($cliente->cadastrar(Conexao::conectar())) {
                echo "
                    <script>
                        alert('Cadastro efectuado com sucesso!')
                    </script>
                ";

                $_SESSION['nome'] = $_POST['nome'];
                $_SESSION['email'] = $_POST['email'];

                header('Location: http://localhost/_hotel-management/index.php');
                exit();
            }
        } else {
            echo "
                <script>
                    alert('As palavras passe devem ser iguais!')
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Falha ao criar conta!Tente novamente!')
            </script>
        ";
    }
?>
<!DOCTYPE html>
<html lang="pt-AO">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/cadastro.css">
</head>
<body>
    <header>
        <div class="logo">
            HOTEL <span>MANAGEMENT</span>
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
                <img src="./assets/images/cad-copy.png" alt="cadastro-ilustração">
            </div>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <h2>Crie sua Conta</h2>
                <p>Já tem uma conta? <a href="login.php">Login</a></p>

                <input type="text" name="nome" id="nome" placeholder="Nome" required>

                <input type="email" name="email" id="email" placeholder="E-mail" required>

                <input type="tel" name="tel" id="tel" placeholder="Telefone" required>

                <input type="text" name="bi" id="bi" placeholder="BI" required>

                <input type="password" name="password" id="password" placeholder="Senha" required>
                
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confrimar Senha" required>

                <input type="submit" value="Cadastrar">
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