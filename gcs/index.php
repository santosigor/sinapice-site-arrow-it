<?php
    include("class_login.php");

    if(@$_GET["sair"]==1){
      $login = new Login();
      $login->deslogar();
    }

    if(@$_POST["acao"]==1){
      $login = new Login();
      $login->efetuarLogin($_POST["usuario"], $_POST["password"]); 
    } 
    
    if(@$_SESSION["logged_pe-admin"] == 1){
      Header("Location: inicial.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>ARROW-IT</title>
    <link href="css/font-face.css" rel="stylesheet" media="all" />
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all" />
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all" />
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all" />
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all" />
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all" />
    <link href="css/theme.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="css/alertify.min.css"/>
    <link rel="stylesheet" href="css/alertify.default.min.css"/>
  </head>
  <body class="animsition">

    <div class="page-content--bge5">

      <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                  <h4>GCS - ARROW-IT</h4>
                </div>
                <div class="login-form">
                    <form name="form" id="form" method="post">
                        <div class="form-group">
                            <label>Usuário</label>
                            <input class="au-input au-input--full" type="text" id="usuario" name="usuario" />
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input class="au-input au-input--full m-b-20" type="password" id="password" name="password" />
                        </div>
                        <input type="hidden" id="acao" name="acao" value="0">
                        <button type="button" onclick="loginIn();" class="au-btn au-btn--block au-btn-load m-b-20">Entrar</button>
                    </form>
                </div>
            </div>
          </div>
      </div>

    </div>

    <div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="mediumModalLabel">Atualizar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
                zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
                resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
                genus Equus, along with other living equids.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">Confirm</button>
            </div>
          </div>
        </div>
      </div>

    <script src="js/jquery.min.js"></script>
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="js/main.js"></script>
    <script src="js/alertify.min.js"></script>

    <script src="js/ait_script.js"></script>

    <script type="text/javascript">
      // tecla enter
      $(document).keypress(function(e) {
        if (e.keycode == 13 || e.which == 13) {
          loginIn();
        }
      });
    </script>

  </body>
</html>