<!DOCTYPE html>
<html lang="en">

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
            <form action="">
                <h2>Login</h2>
                <p>Ainda não tem uma conta?<a href="cadastro.php">Criar</a></p>
                <input type="email" name="txtEmai" id="txtEmail" placeholder="E-mail">
                <input type="password" name="txtSenha" id="txtSenha" placeholder="Senha">
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