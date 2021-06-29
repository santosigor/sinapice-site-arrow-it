<?
  include("header.php");

  if(isset($_GET["id"])&&$_GET["id"]!=""){
    $id_post = $_GET["id"];

    $sql = "SELECT id_post, titulo, segmento, imagem, autor, foto_autor, cargo_autor, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, conteudo, id_categoria
    FROM ait_blog_post
    WHERE id_post = $id_post
    ORDER BY id_post DESC";
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

    $data_cadastro = $row["datacad"];
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dataextensa = strftime('%d de %B de %Y', strtotime($data_cadastro));
  }else{
    header("index.php");
  }
?>

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
                Publicado em <?=$dataextensa?> <span class="ait-tempo-leiura"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="ait-content__blog__integra__autor">
          <img src="arrowit-admin/img/blog_post/<?=$foto_autor?>" alt="">
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
                      <div class="ait-content__blog__card__img" style="background-image: url('arrowit-admin/img/blog_post/<?=$imagem?>');">
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

<? include("footer.php"); ?>