<?php
if (isset($_GET['id'])) {
    $idtema = $_GET['id'];
} else {
    header("location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar um novo chat</title>
</head>

<body>
    <legend><b>Criar um novo chat</b></legend>
    <br>
    <div class="inputBox">
        <input type="text" name="titulo" id="titulo" class="inputUser" required>
        <label for="nome" class="labelInput">Título</label>
        <input type="number" name="tema" id="tema" class="inputUser" required hidden value="<?= $idtema ?>">
    </div>
    <br><br>
    </fieldset>
    <div class="btn_alinhamento">
        <input type="submit" name="submit" id="submit">

    </div>

</body>

</html>