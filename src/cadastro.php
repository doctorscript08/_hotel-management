<!DOCTYPE html>
<html lang="en">
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
            <form action="" method="get">
                <h2>Crie sua Conta</h2>
                <p>Já tem uma conta? <a href="login.php">Login</a></p>
                <input type="text" name="txtNome" id="txtNome" placeholder="Nome">
                <input type="email" name="txtEmail" id="txtEmail" placeholder="E-mail">
                <input type="tel" name="txtTel" id="txtTel" placeholder="Telefone">
                <input type="text" name="txtBi" id="txtBi" placeholder="BI">
                <input type="password" name="txtSenha" id="txtSenha" placeholder="Senha">
                <input type="password" name="txtConfirmSenha" id="txtConfirmSenha" placeholder="Confrimar Senha">
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