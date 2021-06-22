<?
  include("arrowit-admin/config.php");

  if(isset($_GET["id"])&&$_GET["id"]!=""){
    $id_projeto = $_GET["id"];

    $sql = "SELECT id_projeto, titulo, setor, imagem, tempo_processo, ambiente, desafios, solucao, resultados
    FROM ait_projetos
    WHERE id_projeto = $id_projeto
    ORDER BY id_projeto DESC";
    $rs = mysqli_query($con, $sql); 
    $row = mysqli_fetch_array($rs);
    $id_projeto = $row["id_projeto"];
    $titulo = $row["titulo"];
    $setor = $row["setor"];
    $imagem = $row["imagem"];
    $tempo_processo = $row["tempo_processo"];
    $ambiente = $row["ambiente"];
    $desafios = $row["desafios"];
    $solucao = $row["solucao"];
    $resultados = $row["resultados"];
  }else{
    header("index.php");
  }
?>
<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>ARROWIT</title>

    <link href="./dist/images/favicon.png" rel="icon" sizes="16x16" type="image/png">

    <!-- share -->
    <meta property="og:title" content="Arrow IT" />
    <meta property="og:description" content="O seu objetivo é o nosso caminho" />
    <meta property="og:url" content="https://www.arrowit.com.br/" />
    <meta property="og:image" content="https://www.arrowit.com.br/dist/images/ait-image-compartilhar.jpg" />

    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./dist/css/ait.min.css">

  </head>
  <body>

    <div class="ait-loading">
      <div class="ait-loading__container">
        <div class="ait-loading__porcentagem">100</div>
        <div class="ait-loading__logo"></div>
        <div class="ait-loading__barra"></div>
      </div>
    </div>

    <header class="ait-structure__header"></header>

    <section class="ait-content__projetos-integra">
      <div class="ait-content__projetos-integra__destaque">
        <div class="ait-container">
          <div class="row">
            <div class="col-lg-2">
              
            </div>
            <div class="col-md-12 col-lg-7">
              <div class="ait-content__projetos-integra__destaque__title">
                <div class="ait-content__projetos-integra__destaque__title__img">
                  <img src="arrowit-admin/img/projetos/<?=$imagem?>" alt="">
                </div>
                <div>
                  <div class="ait-typography__h3 ait-utilities__color__blue"><?=$titulo?></div>
                  <p><?=$setor?></p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-3">
              <div class="ait-utilities__align-items-center">
                <div>
                  <?
                    $sqlveri = "SELECT b.titulo
                    FROM ait_projeto_servicos a
                    LEFT JOIN ait_servicos b on a.id_servico = b.id_servico
                    WHERE a.id_projeto = $id_projeto";
                    $rsveri = mysqli_query($con, $sqlveri); 
                    while($rowveri = mysqli_fetch_array($rsveri)){
                      $titulo = $rowveri["titulo"];
                  ?>
                  <a href="servicos.html#svc6" class="ait-component__button inline-white small upeercase-none">
                    #arrow<strong><?=$titulo?></strong>
                  </a>
                  <?}?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ait-container">
        <div class="row">
          <div class="col-md-3 col-lg-2">
            <div class="row">
              <div class="col-6 col-md-12">
                <div class="ait-content__projetos-integra__item">
                  <img src="./dist/images/projetos/ait-svg-tempo.svg" alt="">
                  <strong>Tempo de processo</strong>
                  <p><?=$tempo_processo?></p>
                </div>
              </div>
              <div class="col-6 col-md-12">
                <div class="ait-content__projetos-integra__item">
                  <img src="./dist/images/projetos/ait-svg-ambiente.svg" alt="">
                  <strong>Ambiente</strong>
                  <p><?=$ambiente?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-lg-7">
             <div class="ait-component__tab">
              <div class="ait-component__tab__nav">
                <ul>
                  <li class="active" ait-tab-item="tab1">desafios</li>
                  <li ait-tab-item="tab2">Solução</li>
                  <li ait-tab-item="tab3">resultados</li>
                </ul>
              </div>
              <div class="ait-component__tab__content active" ait-tab-content="tab1">
                <?=$desafios?>
              </div>
              <div class="ait-component__tab__content" ait-tab-content="tab2">
                <?=$solucao?>
              </div>
              <div class="ait-component__tab__content" ait-tab-content="tab3">
                <?=$resultados?>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-3 ait-utilities__text-align__center">
            <div class="ait-typography__h5">Outros Projetos</div>
            <?
              $sql = "SELECT id_projeto, imagem
              FROM ait_projetos
              WHERE id_projeto != $id_projeto
              ORDER BY id_projeto DESC";
              $rs = mysqli_query($con, $sql); 
              while($row = mysqli_fetch_array($rs)){
              $id_projeto = $row["id_projeto"];
              $imagem = $row["imagem"];
            ?>
              <a href="projetos-integra.php?id=<?=$id_projeto?>" class="ait-content__projetos-integra__outros-proj">
                <span><img src="arrowit-admin/img/projetos/<?=$imagem?>" alt=""></span>
              </a>
            <?}?>
          </div>
        </div>
      </div>
    </section>

    <footer class="ait-structure__footer"></footer>

    <!-- jquery e plugins -->
    <script src="./dist/js/jquery.min.js"></script>

     <!-- header e footer estatico -->
     <script>
      $('.ait-structure__header').load('header.html');
      $('.ait-structure__footer').load('footer.html');
    </script>
    
    <!-- AIT JS -->    
    <script src="./dist/js/ait.min.js"></script>

  </body>
</html>
