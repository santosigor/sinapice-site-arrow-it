<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Arrow IT</title>

    <!-- <link href="dist/images/" rel="icon" sizes="16x16" type="image/png">-->

    <!-- share -->
    <meta property="og:title" content="Arrow IT" />
    <meta property="og:description" content="O seu objetivo é o nosso caminho" />
    <meta property="og:url" content="https://clientesinapice.com.br/sites/arrow-it/" />
    <meta property="og:image" content="https://clientesinapice.com.br/sites/arrow-it/dist/images/ait-image-compartilhar.jpg" />

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

    <section class="ait-content__servicos">
      <div class="ait-content__servicos__container">
        <div class="ait-container">
          <div class="ait-content__servicos__container__carrossel">
          <?
              include("arrowit-admin/config.php");

              $sql = "SELECT id_servico, titulo, descricao, imagem
              FROM ait_servicos
              WHERE 1
              ORDER BY id_servico DESC";
              $rs = mysqli_query($con, $sql); 
              while($row = mysqli_fetch_array($rs)){
                $id_servico = $row["id_servico"];
                $titulo = $row["titulo"];
                $descricao = $row["descricao"];
                $imagem = $row["imagem"];
            ?>
              <div class="ait-content__servicos__container__carrossel__item" ait-servico-item="svc<?=$id_servico?>">
                <img src="arrowit-admin/img/servicos/<?=$imagem?>" alt="">
                <strong><span>#arrow</span>.<?=$titulo?></strong>
              </div>
            <?}?>
          </div>
        </div>
      </div>
      <?
        $sql = "SELECT id_servico, descricao, diferenciais, objetivo, beneficios
        FROM ait_servicos
        WHERE 1
        ORDER BY id_servico DESC";
        $rs = mysqli_query($con, $sql); 
        $cont = 0; 
        while($row = mysqli_fetch_array($rs)){
          $id_servico = $row["id_servico"];
          $descricao = $row["descricao"];
          $diferenciais = $row["diferenciais"];
          $objetivo = $row["objetivo"];
          $beneficios = $row["beneficios"];
          if($cont==0){
            $nameactive = "active";
          }else{
            $nameactive = "";
          }
          $cont ++;
      ?>
      <div class="ait-content__servicos__content <?=$nameactive?>" ait-servico-content="svc<?=$id_servico?>">
        <p>
          <?=$descricao?>
        </p>
        <div class="ait-component__tab">
          <div class="ait-component__tab__nav">
            <div class="ait-container">
              <ul>
                <li class="active" ait-tab-item="tab1-<?=$id_servico?>">Diferenciais</li>
                <li ait-tab-item="tab2-<?=$id_servico?>">Objetivo</li>
                <li ait-tab-item="tab3-<?=$id_servico?>">Benefícios</li>
              </ul>
            </div>
          </div>
          <div class="ait-container">
            <div class="ait-component__tab__content active" ait-tab-content="tab1-<?=$id_servico?>">
              <div class="row">
                <?=$diferenciais?>
              </div>
            </div>
            <div class="ait-component__tab__content" ait-tab-content="tab2-<?=$id_servico?>">
              <div class="row">
                <?=$objetivo?>
              </div>
            </div>
            <div class="ait-component__tab__content" ait-tab-content="tab3-<?=$id_servico?>">
              <div class="row">
                <?=$beneficios?>
              </div>
            </div>
            <div class="ait-utilities__text-align__center ait-utilities__pdd__30-0">
                <a href="orcamento.php" class="ait-component__button outline">Tenho interesse</a>
              </div>
          </div>
        </div>
      </div>
      <?}?>
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
