<?
  include("arrowit-admin/config.php");

  if(isset($_GET["id"])&&$_GET["id"]!=""){
    $id_post = $_GET["id"];

    $sql = "SELECT id_post, titulo, segmento, imagem, autor, cargo_autor, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, conteudo
    FROM ait_blog_post
    WHERE id_post = $id_post
    ORDER BY id_post DESC";
    $rs = mysqli_query($con, $sql); 
    $row = mysqli_fetch_array($rs);
    $id_post = $row["id_post"];
    $titulo = $row["titulo"];
    $segmento = $row["segmento"];
    $imagem = $row["imagem"];
    $nome_autor = $row["autor"];
    $cargo_autor = $row["cargo_autor"];
    $conteudo = $row["conteudo"];

    $data_cadastro = $row["datacad"];
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dataextensa = strftime('%d de %B de %Y', strtotime($data_cadastro));
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

     <link href="./dist/images/" rel="icon" sizes="16x16" type="image/png">

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

    <section class="ait-content__blog__integra">
      <div class="ait-container">
        <div class="ait-content__blog__integra__banner">
          <div class="ait-content__blog__integra__banner__img" style="background-image: url('arrowit-admin/img/blog_post/<?=$imagem?>');">
            <span class="ait-content__blog__card__img__categoria"><?=$segmento?></span>
            <div class="ait-content__blog__integra__banner__text">
              <div class="ait-content__blog__integra__banner__title">
                <?=$titulo?>
              </div>
              <div class="ait-content__blog__integra__banner__publicacao">
                Publicado em <?=$dataextensa?> <span>2 min</span>
              </div>
            </div>
          </div>
        </div>
        <div class="ait-content__blog__integra__autor">
          <img src="" alt="">
          <div>
            <strong><?=$nome_autor?></strong>
            <span><?=$cargo_autor?></span>
          </div>
        </div>
        <div class="ait-content__blog__integra__text">
          <?=$conteudo?>
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
