<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheks</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/checks.css">
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
        <div class="tbl">

        </div>
        <div class="forms">
            <form action="">
                <fieldset>
                    <h2>Check-in</h2>
                    <input type="text" name="" id="txtName" placeholder="Nome">
                    <input type="text" name="txtId" id="txtId" placeholder="Identificacão">
                    <select name="txtFP" id="txtFP">
                        <option value="">Forma de pagamento</option>
                        <option value="">Cash</option>
                        <option value="">Transferência</option>
                        <option value="">Cheque</option>    
                    </select>
                    
                    <input type="submit" value="Reservar">
                </fieldset>
            </form>
            <form action="">
                <fieldset>
                    <h2>Check-out</h2>
                    <input type="text" name="txtNome" id="txtNome" placeholder="Nome">
                    <input type="text" name="txtId" id="txtId" placeholder="Identificacão">
                    <select name="txtTq" id="txtTq">
                        <option value="">Forma de pagamento</option>
                        <option value="">Cash</option>
                        <option value="">Transferência</option>
                        <option value="">Cheque</option>
                    </select>
                    
                    <input type="submit" value="Reservar">
                </fieldset>
            </form>
        </div>
    </main>
    <footer>
        <p>
            &copy;sergioSapalalo

        </p>
    </footer>
</body>

</html>