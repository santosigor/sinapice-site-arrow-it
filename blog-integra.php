<? 
  
  include("gcs/config.php");

  if(isset($_GET["id"])&&$_GET["id"]!=""){
    $id_post = $_GET["id"];

    $sql = "SELECT a.id_post, a.titulo, a.segmento, a.imagem, DATE_FORMAT(a.data_cadastro, '%Y-%m-%d') as datacad, a.conteudo, a.id_categoria, b.nome as autor, b.cargo as cargo_autor, b.foto as foto_autor
    FROM ait_blog_post a
    LEFT JOIN ait_autor b on a.id_autor = b.id_autor
    WHERE a.id_post = $id_post
    ORDER BY a.id_post DESC";
    $rs = mysqli_query($con, $sql); 
    $row = mysqli_fetch_array($rs);
    $id_post = $row["id_post"];
    $titulo = $row["titulo"];
    $segmento = $row["segmento"];
    $imagem = $row["imagem"];
    $foto_autor = $row["foto_autor"];
    $nome_autor = $row["autor"];
    $cargo_autor = $row["cargo_autor"];
    $conteudo = $row["conteudo"];
    $id_categoria = $row["id_categoria"];

    if($nome_autor=="") {
      $foto_autor = "logo-default-autor.png";
      $nome_autor = "Arrow IT";
      $cargo_autor = "Soluções";
    }

    $data_cadastro = $row["datacad"];
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dataextensa = strftime('%d de %B de %Y', strtotime($data_cadastro));
  }else{
    header("index.php");
  }

?>

<!doctype html>
<html lang="pt-BR">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Sinápice - Estúdio de Design | Igor dos Santos - Front End Developer">
    
    <title>ARROWIT BLog</title>

    <link href="./dist/images/favicon.png" rel="icon" sizes="16x16" type="image/png">

    <meta name="description" content="<?=$titulo?>" />
    <link rel="canonical" href="http://clientesinapice.com.br/sites/arrow-it/blog-integra.php?id=<?=$id_post?>" />

    <meta property="og:title" content="Arrow IT Blog - <?=$segmento?>" />
    <meta property="og:description" content="<?=$titulo?>" />
    <meta property="og:url" content="http://clientesinapice.com.br/sites/arrow-it/blog-integra.php?id=<?=$id_post?>" />
    <meta property="og:site_name" content="Arrow IT Blog" />

    <meta property="og:image" content="http://clientesinapice.com.br/gcs/img/blog_post/<?=$imagem?>">
    <meta property="og:image:url" content="http://clientesinapice.com.br/gcs/img/blog_post/<?=$imagem?>">
    <meta property="og:image:secure_url" content="http://clientesinapice.com.br/gcs/img/blog_post/<?=$imagem?>g" />
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:image" content="http://clientesinapice.com.br/gcs/img/blog_post/<?=$imagem?>">
    <meta name="twitter:card" content="summary_large_image">

    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./gcs/css/alertify.min.css"/>
    <link rel="stylesheet" href="./gcs/css/alertify.default.min.css"/>

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

    <header class="ait-structure__header">
      <div class="ait-container">
        <a href="index.php" class="ait-structure__header__logo">Logo Arrow IT</a>
        <span class="ait-structure__header__menu-mobile">Menu</span>
        <nav>
          <a href="index.php">Home</a>
          <a href="sobre-arrow-it.php">Arrow IT</a>
          <a href="servicos.php">Serviços</a>
          <a href="projetos.php">Projetos</a>
          <a href="blog.php">Blog</a>
          <a href="orcamento.php">Orçamento</a>
          <a href="contato.php">Contato</a>
        </nav>
      </div>
    </header>

    <section class="ait-content__blog__integra">
      <div class="ait-container">
        <div class="ait-content__blog__integra__banner">
          <div class="ait-content__blog__integra__banner__img" style="background-image: url('gcs/img/blog_post/<?=$imagem?>');">
            <span class="ait-content__blog__card__img__categoria"><?=$segmento?></span>
            <div class="ait-content__blog__integra__banner__text">
              <div class="ait-content__blog__integra__banner__title">
                <?=$titulo?>
              </div>
              <div class="ait-content__blog__integra__banner__publicacao">
                Publicado em <?=$dataextensa?> <span class="ait-tempo-leiura"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="ait-content__blog__integra__autor">
          <img src="gcs/img/blog_post/<?=$foto_autor?>" alt="">
          <div>
            <strong><?=$nome_autor?></strong>
            <span><?=$cargo_autor?></span>
          </div>
        </div>
        <div class="ait-content__blog__integra__text">
          <div class="text-editor">
            <?=$conteudo?>
          </div>
        </div>
        <form id="form" name="form" action="" method="post" enctype="multipart/form-data" >
          <div class="ait-components__conteudo-util">
            <div class="ait-components__conteudo-util__options">
              <strong>O conteúdo foi útil pra você?</strong>
              <span onclick="comentarioUtil('1', '<?=$id_post?>')" class="ait-component__button outline" ait-data-option="sim">Sim</span>
              <span class="ait-component__button outline" ait-data-option="nao">Não</span>
            </div>
            <div class="ait-components__conteudo-util__form">
              <textarea id="comentario" name="comentario" placeholder="O conteúdo não foi útil? Explique o porquê e ajude-nos a melhorar!"></textarea>
              <button type="button" onclick="comentarioUtil('2', '<?=$id_post?>')" class="ait-component__button enviar">Enviar</button>
            </div>
            <div class="ait-components__conteudo-util__msg">
              <div class="ait-components__alert success">
                <span class="ait-components__alert__close"></span>
                <strong>Obrigado!</strong>
                <p>Foi um prazer te ajudar :)</p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <?
      $sql = "SELECT id_post, titulo, segmento, imagem, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, id_categoria, conteudo
      FROM ait_blog_post
      WHERE id_categoria = $id_categoria AND id_post != $id_post
      ORDER BY data_cadastro DESC
      LIMIT 4";
      $rs = mysqli_query($con, $sql); 
      if(mysqli_num_rows($rs)>0){
    ?>
    <section class="ait-content__blog__relacionados">
      <div class="ait-utilities__text-align__center">
        <span class="ait-component__tag">Conteúdos relacionados</span>
      </div>
      <div class="ait-container">
        <div class="ait-component__carousel center">
            <?
              while($row = mysqli_fetch_array($rs)){
                $id_post = $row["id_post"];
                $titulo = $row["titulo"];
                $segmento = $row["segmento"];
                  $conteudo = $row["conteudo"];
                $imagem = $row["imagem"];
                $data_cadastro = $row["datacad"];

                $d = explode("-", $data_cadastro);
                $data_cadastro = $d[2]."/".$d[1]."/".$d[0];

                $id_categoria = $row["id_categoria"];

                if($id_categoria==1){
                  $nomeclass = "text";
                }else if($id_categoria==2){
                  $nomeclass = "video";
                }
            ?>
                <div>
                  <div class="ait-content__blog__card">
                    <a href="blog-integra.php?id=<?=$id_post?>">
                      <div class="ait-content__blog__card__img" style="background-image: url('gcs/img/blog_post/<?=$imagem?>');">
                        <span class="ait-content__blog__card__img__icon <?=$nomeclass?>"></span>
                        <span class="ait-content__blog__card__img__categoria"><?=$segmento?></span>
                      </div>
                      <div class="ait-content__blog__card__info">
                        <div>
                          <span><?=$data_cadastro?></span><span class="ait-tempo-leiura"></span>
                        </div>
                        <strong><?=$titulo?></strong>
                        <div class="ait-content__blog__card__info__text"><?=$conteudo?></div>
                      </div>
                    </a>
                  </div>
                </div>
            <?}?>
        </div>
      </div>
    </section>
    <?}?>

    <div class="ait-compartilhar" title="Compartilhar">
      <div class="ait-compartilhar__content">
        <a href="#" class="facebook" target="_blank" title="Facebook">
          <img src="./dist/images/icons/ait-svg-facebook.svg" alt="Facebook">
        </a>
        <a href="#" class="twitter" target="_blank" title="Twitter">
          <img src="./dist/images/icons/ait-svg-twitter.svg" alt="Twitter">
        </a>
        <a href="#" class="linkedin" target="_blank" title="Linkedin">
          <img src="./dist/images/icons/ait-svg-linkedin.svg" alt="Linkedin">
        </a>
        <a href="#" class="whatsapp" target="_blank" title="Whatsapp">
          <img src="./dist/images/icons/ait-svg-whatsapp.svg" alt="Whatsapp">
        </a>
      </div>
    </div>

<? include("footer.php"); ?>