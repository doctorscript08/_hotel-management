<?php
    session_start();

    if (isset($_SESSION['id_usuario'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['role'])) {
        $login = true;
        $id_usuario = $_SESSION['id_usuario'];
        $nome = $_SESSION['nome'];
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
    } else {
        $login = false;
    }
?>
<!DOCTYPE html>
<html lang="pt-AO">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <style>
        .hidde {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h2>HOTEL<span>MANAGEMENT</span></h2>
        </div>
        <nav class="nav-bar">
            <ul>
                <li class="nav-item"><a href="index.html" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="./src/reserva.php" class="nav-link">RESERVAS</a></li>
                <li class="nav-item"><a href="./src/sobre_nos.php" class="nav-link">SOBRE NÓS</a></li>
                <li class="nav-item <?= $login ? '' : 'hidde'?>"><a href="#" class="nav-link">PERFIL</a></li>
                <li class="nav-item <?= $login ? '' : 'hidde'?>"><a href="./src/php/LogOut.php" class="nav-link">LOG OUT</a></li>
                <li class="nav-item <?= $login ? 'hidde' : ''?>"><a href="./src/login.php" class="nav-link">LOGIN</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>
            Texto de exemplo!
        </h1>

        <section>
            <div><img src="./src/assets/images/qt2-copy.jpg" alt=""></div>
            <div><img src="./src/assets/images/qt3-copy.jpg" alt=""></div>
            <div><img src="./src/assets/images/qt5-copy.jpg" alt=""></div>
        </section>
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