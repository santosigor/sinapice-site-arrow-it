<?php 
  include('config.php'); 

  session_start();

  if($_SESSION["logged_".$_SESSION["nomesessao"]]!=1){
    session_destroy();
    Header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
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
  </head>
  <body class="animsition">

    <div class="page-wrapper">
      <div class="page-container2">

        <header class="header-desktop2">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="header-wrap2">
                <div class="header-button2">
                  <div class="header-button-item has-noti js-item-menu">
                    <i class="zmdi zmdi-notifications"></i>
                    <div class="notifi-dropdown js-dropdown">
                      <div class="notifi__title">
                        <p>You have 3 Notifications</p>
                      </div>
                      <div class="notifi__item">
                        <div class="bg-c1 img-cir img-40">
                          <i class="zmdi zmdi-email-open"></i>
                        </div>
                        <div class="content">
                          <p>You got a email notification</p>
                          <span class="date">April 12, 2018 06:50</span>
                        </div>
                      </div>
                      <div class="notifi__item">
                        <div class="bg-c2 img-cir img-40">
                          <i class="zmdi zmdi-account-box"></i>
                        </div>
                        <div class="content">
                          <p>Your account has been blocked</p>
                          <span class="date">April 12, 2018 06:50</span>
                        </div>
                      </div>
                      <div class="notifi__item">
                        <div class="bg-c3 img-cir img-40">
                          <i class="zmdi zmdi-file-text"></i>
                        </div>
                        <div class="content">
                          <p>You got a new file</p>
                          <span class="date">April 12, 2018 06:50</span>
                        </div>
                      </div>
                      <div class="notifi__footer">
                        <a href="#">All notifications</a>
                      </div>
                    </div>
                  </div>
                  <div class="header-button-item mr-0 js-sidebar-btn">
                    <i class="zmdi zmdi-menu"></i>
                  </div>
                  <div class="setting-menu js-right-sidebar">
                    <div class="account2">
                      <div class="image img-cir img-120">
                        <img src="images/icon/avatar.jpg" alt="Marcia" />
                      </div>
                      <h4 class="name">Olá, Marcia</h4>
                      <a href="javascript:irPara(1, 'index.php?sair=1');">Sair</a>
                    </div>
                    <div class="account-dropdown__body">
                      <div class="account-dropdown__item">
                        <a href="#"> <i class="zmdi zmdi-account"></i>minha conta</a>
                      </div>
                      <div class="account-dropdown__item">
                        <a href="#"> <i class="zmdi zmdi-settings"></i>configurações</a>
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
            ARROW-IT
          </div>
          <div class="menu-sidebar2__content js-scrollbar2">
            <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
              <li>
                <a href="inicial.php"> <i class="fas fa-home"></i>home</a>
              </li>
              <li>
                <a href="ait_dadosgerais.php"> <i class="fas fa-desktop"></i>dados gerais</a>
              </li>
              <li class="has-sub">
                <a class="js-arrow" href="#">
                  <i class="fas fa-user"></i>a facilitadora
                  <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                  </span>
                </a>
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                  <li>
                    <a href="ait_servicos.php"> <i class="far fa-file-alt"></i>serviços</a>
                  </li>
                  <li>
                    <a href="pe-projetos.php"> <i class="fas fa-tag"></i>projetos</a>
                  </li>
                  <li>
                    <a href="pe-integra-projeto.php"> <i class="fas fa-tags"></i>integra projetos</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub">
                <a class="js-arrow" href="#">
                  <i class="fas fa-bookmark"></i>os cursos
                  <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                  </span>
                </a>
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                  <li>
                    <a href="pe-home-cursos.php"> <i class="far fa-file-alt"></i>home cursos</a>
                  </li>
                  <li>
                    <a href="pe-cursos.php"> <i class="fas fa-plus"></i>cadastrar curso</a>
                  </li>
                  <li>
                    <a href="pe-forma-pagamento.php"> <i class="fas fa-dollar-sign"></i>formas de pagamento</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="galeria-coletiva.php"> <i class="fas fa-th"></i>a galeria coletiva</a>
              </li>
              <li class="has-sub">
                <a class="js-arrow" href="#">
                  <i class="fas fa-globe"></i>o portal
                  <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                  </span>
                </a>
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                  <li>
                    <a href="pe-alunos.php"> <i class="fas fa-users"></i>alunos</a>
                  </li>
                  <li>
                    <a href="pe-exercicios.php"> <i class="fas fa-book"></i>exercicios</a>
                  </li>
                  <li>
                    <a href="pe-temas.php"> <i class="far fa-file-alt"></i>temas</a>
                  </li>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          </div>
        </aside>