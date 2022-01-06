<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Igor dos Santos - Front End Developer | Hugo dos Santos - Back End Developer">
    <title>GCS - ArrowIT</title>
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

    <div class="page-wrapper">
      <div class="page-container2">

        <header class="header-desktop2">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="header-wrap2">
                <div class="header-button2">
                  <div class="header-button-item mr-0 js-sidebar-btn">
                    <i class="zmdi zmdi-menu"></i>
                  </div>
                  <div class="setting-menu js-right-sidebar">
                    <div class="account2">
                      <h4 class="name">Olá, <?=$_SESSION["usuario_".$_SESSION["nomesessao"]]?></h4>
                    </div>
                    <div class="account-dropdown__body">
                      <div class="account-dropdown__item">
                        <a href="ait_alterarsenha.php"> <i class="zmdi zmdi-settings"></i>Alterar senha</a>
                      </div>
                      <?if($_SESSION["id_perfil_".$_SESSION["nomesessao"]]==1){?>
                      <div class="account-dropdown__item">
                        <a href="ait_usuarios.php"> <i class="zmdi zmdi-account"></i>Usuários</a>
                      </div>
                      <?}?>
                      <div class="account-dropdown__item">
                        <a href="javascript:irPara(1, 'index.php?sair=1');"> <i class="fas fa-sign-out-alt"></i>Sair</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        <aside class="menu-sidebar2 js-right-sidebar">
          <div class="logo">
            GCS - ArrowIT
          </div>
          <div class="menu-sidebar2__content js-scrollbar2">
            <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
              <?if($_SESSION["id_perfil_".$_SESSION["nomesessao"]]==1){?>
                <li>
                  <a href="ait_dadosgerais.php"> <i class="fas fa-list-ul"></i>Dados gerais</a>
                </li>
                <li class="has-sub">
                  <a class="js-arrow" href="#">
                    <i class="fas fa-desktop"></i>Home
                    <span class="arrow">
                      <i class="fas fa-angle-down"></i>
                    </span>
                  </a>
                  <ul class="list-unstyled navbar__sub-list js-sub-list">
                    <li>
                      <a href="ait_home.php"> <i class="fas fa-images"></i>Banner</a>
                    </li>
                    <li>
                      <a href="ait_parceiros.php"> <i class="fas fa-handshake"></i>Parceiros</a>
                    </li>
                    <li>
                      <a href="ait_clientes.php"> <i class="fas fa-users"></i>Clientes</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="ait_servicos.php"> <i class="fas fa-cog"></i>Serviços</a>
                </li>
                <li>
                  <a href="ait_projetos.php"> <i class="fas fa-clipboard-check"></i>Projetos</a>
                </li>
                <li>
                  <a href="ait_depoimentos.php"> <i class="fas fa-align-left"></i>Depoimentos</a>
                </li>
                <li class="has-sub">
                  <a class="js-arrow" href="#">
                    <i class="fab fa-blogger-b"></i>Blog
                    <span class="arrow">
                      <i class="fas fa-angle-down"></i>
                    </span>
                  </a>
                  <ul class="list-unstyled navbar__sub-list js-sub-list">
                    <li>
                      <a href="ait_blog_post.php"> <i class="fas fa-tag"></i>Post</a>
                    </li>
                    <li>
                      <a href="ait_blog_conteudo_util.php"> <i class="fas fa-thumbs-up"></i>Conteúdo útil</a>
                    </li>
                  </ul>
                </li>
              <?}else if($_SESSION["id_perfil_".$_SESSION["nomesessao"]]==2){?>
                <li>
                  <a href="ait_dadosgerais.php"> <i class="fas fa-list-ul"></i>Dados gerais</a>
                </li>
                <li class="has-sub">
                  <a class="js-arrow" href="#">
                    <i class="fab fa-blogger-b"></i>Blog
                    <span class="arrow">
                      <i class="fas fa-angle-down"></i>
                    </span>
                  </a>
                  <ul class="list-unstyled navbar__sub-list js-sub-list">
                    <li>
                      <a href="ait_blog_post.php"> <i class="fas fa-tag"></i>Post</a>
                    </li>
                    <li>
                      <a href="ait_blog_conteudo_util.php"> <i class="fas fa-thumbs-up"></i>Conteúdo útil</a>
                    </li>
                  </ul>
                </li>
              <?}?>
            </ul>
          </nav>
          </div>
        </aside>