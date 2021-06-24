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
                  <div class="header-button-item mr-0 js-sidebar-btn">
                    <i class="zmdi zmdi-menu"></i>
                  </div>
                  <div class="setting-menu js-right-sidebar">
                    <div class="account2">
                      <h4 class="name">Olá, Admin</h4>
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
              <li>
                <a href="ait_servicos.php"> <i class="fas fa-file-alt"></i>serviços</a>
              </li>
              <li>
                <a href="ait_projetos.php"> <i class="fas fa-tag"></i>projetos</a>
              </li>
              <li class="has-sub">
                <a class="js-arrow" href="#">
                  <i class="fas fa-user"></i>blog
                  <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                  </span>
                </a>
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                  <li>
                    <a href="ait_blog_banner.php"> <i class="far fa-file-alt"></i>banner</a>
                  </li>
                  <li>
                    <a href="ait_blog_post.php"> <i class="fas fa-tag"></i>post</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          </div>
        </aside>