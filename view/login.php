<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
</head>

<body>
    <!--POP LOGIN-->
    <div class="overlay"></div>
    <div class="modal">

        <div class="div_login">
            <form action="../control/loginControl.php" method="post">
                <h1>Login</h1><br>
                <input type="text" name="email" placeholder="Email" class="input" required autofocus>
                <br><br>
                <input type="password" name="senha" placeholder="Senha" class="input" required>
                <br><br>
                <button class="button">Enviar</button>
            </form>
        </div>

    </div>
    <!--FIM POP LOGIN-->
</body>

</html>