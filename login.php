<?php
    include('conexao.php');

    if(isset($_POST['senha']) || isset($_POST['cpf'])) {
      if (strlen($_POST['senha']) == 0) {
        echo ("<script>alert('Preencha sua senha!')</script>");
      } elseif (strlen($_POST['cpf']) == 0) {
        echo ("<script>alert('Preencha seu cpf!')</script>");
      } else {
            $cpf = $mysqli->real_escape_string($_POST['cpf']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
    
            $sql_code = "SELECT * FROM usuario WHERE cpf = '$cpf' LIMIT 1";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    

            $usuario = $sql_query->fetch_assoc();
            if(password_verify($senha, $usuario['senha'])) {
                if(!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['nome'] = $usuario['nome'];
                
                header("Location: index.php");
            } else {
                echo "<script>alert('Falha ao logar! E-mail ou senha incorretos');</script>";
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
  <link rel="stylesheet" type="text/css" href="assets/style/style_pagina_login.css" />

  <title>Login</title>
</head>

<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row no-gutters d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row no-gutters">
              <div class="col-md-7 col-lg-5 d-none d-md-block">
                <img
                  src="img/img pagina login.jfif"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method='POST'>

                    <div class="d-flex align-items-center  pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Login</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3 px-3" style="letter-spacing: 1px;"> Faça seu login ou cadastro:</h5>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form2Example17">CPF:</label>
                      <input placeholder="Digite seu CPF" type="text" name='cpf' id="CPF" class="form-control form-control-lg" />

                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form2Example27">Senha:</label>
                      <input placeholder="Digite sua senha" type="password" name='senha' id="Senha"
                        class="form-control form-control-lg " />

                    </div>

                    

                    <div class="pt-1 mb-3">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Entrar</button>
                    </div>

                    <a class="small text-muted" href="#!">Esqueçeu sua senha?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Não tem sua conta? <a href="cadastro.php" target="_blank"
                        style="color: #393f81;">Registre aqui!</a></p>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




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