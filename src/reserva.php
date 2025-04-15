<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/reserva.css">
</head>

<body>
    <header>
        <div class="logo">
            <h2>HOTEL <span>MANAGEMENT</span></h2>
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
                    <input type="text" name="" id="txtName" placeholder="Nome">
                    <select name="txtTq" id="txtTq">
                        <option value="">Tipo de quarto</option>
                        <option value="">VIP</option>
                        <option value="">Normal</option>
                        <option value="">Clássico</option>
                    </select>
                    <input type="text" name="txtChec-in" id="txtChec-in" placeholder="Check-in">
                    <input type="text" name="txtChec-out" id="txtChec-out" placeholder="Check-out">
                    <div class="checkbox">
                        <p><label for="">Serviços extras</label></p>
                        <p><input type="checkbox" name="txtSE" id="txtCM"> <label for="txtCM">Café da manhã</label></p>
                        <p><input type="checkbox" name="txtSE" id="txtET"> <label for="txtET">Estacionamento</label></p>
                    </div>
                    <input type="submit" value="Reservar">
                </fieldset>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy;sergioSapalalo</p>
    </footer>
</body>

</html>