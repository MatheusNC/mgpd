<?php
  include('conexao.php');

  if(isset($_POST['email']) || isset($_POST['senha']) || isset($_POST['cpf']) || isset($_POST['nome']) || isset($_POST['telefone'])) {
    if (strlen($_POST['email']) == 0) {
        echo ("<script>alert('Preencha seu e-mail!')</script>");
    } elseif (strlen($_POST['senha']) == 0) {
        echo ("<script>alert('Preencha sua senha!')</script>");
    } elseif (strlen($_POST['cpf']) == 0) {
      echo ("<script>alert('Preencha seu cpf!')</script>");
    } elseif (strlen($_POST['nome']) == 0) {
      echo ("<script>alert('Preencha seu nome!')</script>");
    } elseif (strlen($_POST['telefone']) == 0) {
      echo ("<script>alert('Preencha seu telefone!')</script>");
    } elseif ($_POST['senha'] != $_POST['repetirSenha']) {
      echo ("<script>alert('Senhas diferentes!')</script>");
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = password_hash($mysqli->real_escape_string($_POST['senha']), PASSWORD_DEFAULT);
        $cpf = $mysqli->real_escape_string($_POST['cpf']);
        $nome = $_POST['nome'];
        $tel = $_POST['telefone'];


        $sql_select = "SELECT * FROM usuario WHERE cpf = '$cpf'";
        $sql_query_select = $mysqli->query($sql_select) or die("Falha na execução do código SQL: " . $mysqli->error);
        
        $qtd = $sql_query_select->num_rows;
        
        if($qtd == 1) {
            echo ("<script>alert('CPF já foi utilizado!')</script>");
        } else {
            $sql_insert = "INSERT INTO usuario VALUES('$email', '$senha','$cpf','$tel','$nome')";
            $sql_query_insert = $mysqli->query($sql_insert) or die("Falha na execução do código SQL: " . $mysqli->error);
                
            header("Location: login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="img/icon.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/style/style_pagina_cadastro.css" />

  <title>Cadastro</title>
</head>

<body>
  
    <div class="container py-5 h-100">
      <div class="row no-gutters d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row no-gutters">
              
              <div class="col-md-7 col-lg-10 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method='POST'>

                    <div class="d-flex align-items-center  pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Cadastre-se</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3 px-3" style="letter-spacing: 1px;"> Coloque as informações conforme o formulário abaixo:</h5>


                    <div class="form-outline mb-3">
                        <label class="form-label" for="form2Example27">Nome Completo:</label>
                        <input placeholder="Digite seu nome completo" type="text" name='nome' id="nome"
                          class="form-control form-control-lg " />
  
                      </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form2Example17">CPF:</label>
                      <input placeholder="Digite seu CPF" type="text" name='cpf' id="CPF" 
                        class="form-control form-control-lg" />

                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form2Example27">Senha:</label>
                      <input placeholder="Digite sua senha" type="password" name='senha' id="Senha"
                        class="form-control form-control-lg " />

                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label" for="form2Example27">Confirme sua senha:</label>
                        <input placeholder="Repita sua senha" type="password" name='repetirSenha' id="RepetirSenha"
                          class="form-control form-control-lg " />
  
                      </div>

                    <div class="form-outline mb-3">
                        <label class="form-label" for="form2Example27">Email:</label>
                        <input placeholder="Digite seu Email" type="email" name='email' id="Email"
                          class="form-control form-control-lg " />
  
                      </div>

                      <div class="form-outline mb-3">
                        <label class="form-label" for="form2Example27">Telefone:</label>
                        <input placeholder="Digite seu telefone" type="tel" name='telefone' id="Telefone"
                          class="form-control form-control-lg " />
                      </div>
                    <div class="pt-1 mb-3">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Cadastrar</button></a>
                    </div>  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>