<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastroTema.css">
    <title>Cadastro de tema</title>
</head>


<body>
    <main>



        <div class="box">

            <form action="../control/cadastrarTema.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend><b>Cadastro de Tema</b></legend>
                    <br>
                    <div class="inputBox">
                        <label for="nometema" class="labelInput">Nome do Tema:</label>
                        <input type="text" name="nometema" id="nometema" class="inputUser" required>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="email" class="labelInput">Sinopse:</label><br>
                        <textarea name="sinopse" id="sinopse" cols="80" rows="10" class="inputUser" required></textarea>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="generotema" id="generotema" class="inputUser" required>
                        <label for="generotema" class="labelInput">Gênero</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="number" name="estreia" id="estreia" class="inputUser" min="1" max="2023" required>
                        <label for="estreia" class="labelInput">Ano de estreia</label>
                    </div>
                    <p>Tipo:</p>
                    <input type="radio" id="anime" name="tipo" value="Anime" required>
                    <label for="anime">Anime</label>
                    <br>
                    <input type="radio" id="manga" name="tipo" value="Mangá" required>
                    <label for="manga">Mangá</label>
                    <br>
                    <input type="radio" id="webtoon" name="tipo" value="Webtoon" required>
                    <label for="webtoon">Webtoon</label>
                    <br><br>
                    <label for="quantidade">Quantidade de Episódio/Capítulos:</label>
                    <input type="number" name="quantidade" id="quantidade" required>
                    <br><br><br>
                    <div class="inputBox">
                        </select>
                        <label for="estadotema">Estado de publicação:</label>
                        <select name="estadotema" id="estadotema" required>
                            <option value="Em andamento" selected>Em andamento</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label class="picture" for="foto" tabIndex="0">
                            <span class="picture__image">Escolha uma foto</span>
                        </label>
                        <input type="file" name="foto" id="foto" required>
                    </div>
                    <br><br>
                </fieldset>
                <div class="btn_alinhamento">
                    <input type="submit" name="submit" id="submit">

                </div>

            </form>

        </div>
        <!--FIM 1ª DOBRA-->


    </main>
</body>
<script src="../js/fotoCadastro.js"></script>

</html>