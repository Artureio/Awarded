<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <!-- Meta tags Obrigatórias -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Fontes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,500;1,300;1,600&display=swap" rel="stylesheet">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/8ea24cca08.js" crossorigin="anonymous"></script>

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="login-fundo">
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="container-fluid position-fixed">
        <div class="d-flex justify-content-center" id="conteudo">
            <div class="d-none d-lg-block mr-5 text-light text-center">
                <img src="img/logo.png" width="200" id="login-logo">
                <h1 class="display-1 font-weight-bold ">Awarded!</h1>
                <p class=" ">O mundo gamer está aqui</p>  
            </div>

            <div class="" id="login-col">
                <div class="login-form">
                    <form class="" b4 action="processa.php" method="post">
                        <h2 class="text-center">Cadastro</h2>
                        <div class="form-group">
                            <h5>
                                Login
                            </h5>
                            <small class="text-muted" id="login-cadastro"></small>
                            <input class="form-control" type="text" name="login" id="login" >
                        </div>
                        <div class="form-group">
                            <h5>Senha</h5>
                            <small class="text-muted" id="senha-cadastro"></small>

                            <input class="form-control" type="password" name="senha" id="senha" >
                        </div>
                        <div class="form-group">
                             <input type="submit" class="btn btn-success btn-block font-weight-bold" value="Cadastrar">
                        </div>
                    </form>

                </div>
            </div>

            
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer fixed-bottom d-none  d-sm-block">
            <div class="container   text-white">
              <div class="row d-flex justify-content-around ">
                <div class="footer-widget  programadores ">
                  <h5>Álvaro Buriche</h5>
                  <div class="footer-widget-content">
                    <div class="footer-social ">
                      <ul class="nav justify-content-around">
                        <li><a href="#"><i class="fab fa-facebook text-white "></i></a></li>
                        <li><a href="#"><i class="fab fa-steam text-white "></i></a></li>
                        <li><a href="#"><i class="fab fa-github text-white "></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-widget programadores">
                  <h5>Artur Henrique</h5>
                  <div class="footer-widget-content">
                    <div class="footer-social ">
                      <ul class="nav justify-content-around">
                        <li><a href="#"><i class="fab fa-facebook text-white "></i></a></li>
                        <li><a href="#"><i class="fab fa-steam text-white "></i></a></li>
                        <li><a href="#"><i class="fab fa-github text-white "></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-widget programadores">
                  <h5>Jhonatan Torres</h5>
                  <div class="footer-widget-content">
                    <div class="footer-social ">
                      <ul class="nav justify-content-around">
                        <li><a href="#"><i class="fab fa-facebook text-white "></i></a></li>
                        <li><a href="#"><i class="fab fa-steam text-white "></i></a></li>
                        <li><a href="#"><i class="fab fa-github text-white "></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-widget programadores">
                  <h5>Jhonnatan Philipe</h5>
                  <div class="footer-widget-content">
                    <div class="footer-social ">
                      <ul class="nav justify-content-around">
                        <li><a href="#"><i class="fab fa-facebook text-white "></i></a></li>
                        <li><a href="#"><i class="fab fa-steam text-white "></i></a></li>
                        <li><a href="#"><i class="fab fa-github text-white "></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                
               
              </div>
            </div>
          </footer>
    <!-- Optioanal JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</body>
</html>