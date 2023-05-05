<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
      


      <div class="box">

          <form action="../control/cadastrarUsuario.php" method="post">
              <fieldset>
                  <legend><b>Cadastro Usuário</b></legend>
                  <br>
                  <div class="inputBox">
                      <input type="text" name="nome" id="nome" class="inputUser" required>
                      <label for="nome" class="labelInput">Nome completo</label>
                  </div>
                  <br><br>
                  <div class="inputBox">
                      <input type="email" name="email" id="email" class="inputUser" required>
                      <label for="email" class="labelInput">Email</label>
                  </div>
                  <br><br>
                  <div class="inputBox">
                      <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                      <label for="telefone" class="labelInput">Telefone</label>
                  </div>
                  <br><br>
                  <div class="inputBox">
                      <input type="password" name="senha" id="senha" class="inputUser" required>
                      <label for="senha" class="labelInput">Senha</label>
                  </div>
                  <p>Gênero:</p>
                  <input type="radio" id="feminino" name="genero" value="F" required>
                  <label for="feminino">Feminino</label>
                  <br>
                  <input type="radio" id="masculino" name="genero" value="M" required>
                  <label for="masculino">Masculino</label>
                  <br>
                  <input type="radio" id="outro" name="genero" value="O" required>
                  <label for="outro">Outro</label>
                  <br><br>
                  <label for="nascimento"><b>Data de Nascimento:</b></label>
                  <input type="date" name="nascimento" id="nascimento" required>
                  <br><br><br>
                  <div class="inputBox">
                      <input type="text" name="cidade" id="cidade" class="inputUser" required>
                      <label for="cidade" class="labelInput">Cidade</label>
                  </div>
                  <br><br>
                  <div class="inputBox">
                      <input type="text" name="estado" id="estado" class="inputUser" required>
                      <label for="estado" class="labelInput">Estado</label>
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
</html>