<? include("header.php"); ?>

  <section class="ait-component__banner">
    <div class="ait-component__banner__carousel">
      <?
        $sql = "SELECT imagem
        FROM ait_blog_post
        WHERE id_categoria = 1 AND destaque = 1
        ORDER BY id_post DESC";
        $rs = mysqli_query($con, $sql); 
        while($row = mysqli_fetch_array($rs)){
          $imagem = $row["imagem"];
      ?>
        <div>
          <picture>
            <source media="(min-width: 0) and (max-width: 767.98px)" srcset="arrowit-admin/img/blog_post/<?=$imagem?>" />
            <source media="(min-width: 768px) and (max-width: 991.98px)" srcset="arrowit-admin/img/blog_post/<?=$imagem?>" />
            <img src="arrowit-admin/img/blog_post/<?=$imagem?>" alt="" />
          </picture>
        </div>
      <?}?>
    </div>
  </section>

  <section class="ait-content__blog">
    <div class="ait-component__tab">
      <div class="ait-component__tab__nav">
        <div class="ait-container">
          <div class="ait-content__blog__search">
            <input type="text" name="search" placeholder="O que você procura?">
          </div>
          <ul>
            <li class="active" ait-tab-item="tab1">TODOS</li>
            <li ait-tab-item="tab2">ARTIGOS</li>
            <li ait-tab-item="tab3">VÍDEOS</li>
          </ul>
        </div>
      </div>
      <div class="ait-container">
        <div class="ait-component__tab__content active" ait-tab-content="tab1">
          <div class="ait-content__blog__list">
            <?
              $sql = "SELECT id_post, titulo, segmento, imagem, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, conteudo, id_categoria
              FROM ait_blog_post
              WHERE 1
              ORDER BY id_post DESC";
              $rs = mysqli_query($con, $sql); 
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
            <?}?>
          </div>
          <div class="ait-utilities__text-align__center ait-utilities__pdd__30-0">
            <a href="#" class="ait-component__button">Carregar mais</a>
          </div>
        </div>
        <div class="ait-component__tab__content" ait-tab-content="tab2">
          <div class="ait-content__blog__list">
            <?
              $sql = "SELECT id_post, titulo, segmento, imagem, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, conteudo
              FROM ait_blog_post
              WHERE id_categoria = 1
              ORDER BY id_post DESC";
              $rs = mysqli_query($con, $sql); 
              while($row = mysqli_fetch_array($rs)){
                $id_post = $row["id_post"];
                $titulo = $row["titulo"];
                $segmento = $row["segmento"];
                $conteudo = $row["conteudo"];
                $imagem = $row["imagem"];
                $data_cadastro = $row["datacad"];

                $d = explode("-", $data_cadastro);
                $data_cadastro = $d[2]."/".$d[1]."/".$d[0];
            ?>
              <div class="ait-content__blog__card">
                <a href="blog-integra.php?id=<?=$id_post?>">
                  <div class="ait-content__blog__card__img" style="background-image: url('arrowit-admin/img/blog_post/<?=$imagem?>');">
                    <span class="ait-content__blog__card__img__icon text"></span>
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
            <?}?>
          </div>
          <div class="ait-utilities__text-align__center ait-utilities__pdd__30-0">
            <a href="#" class="ait-component__button">Carregar mais</a>
          </div>
        </div>
        <div class="ait-component__tab__content" ait-tab-content="tab3">
          <div class="ait-content__blog__list">
            <?
              $sql = "SELECT id_post, titulo, segmento, imagem, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, conteudo
              FROM ait_blog_post
              WHERE id_categoria = 2
              ORDER BY id_post DESC";
              $rs = mysqli_query($con, $sql); 
              while($row = mysqli_fetch_array($rs)){
                $id_post = $row["id_post"];
                $titulo = $row["titulo"];
                $segmento = $row["segmento"];
                $conteudo = $row["conteudo"];
                $imagem = $row["imagem"];
                $data_cadastro = $row["datacad"];

                $d = explode("-", $data_cadastro);
                $data_cadastro = $d[2]."/".$d[1]."/".$d[0];
            ?>
              <div class="ait-content__blog__card">
                <a href="blog-integra.php?id=<?=$id_post?>">
                  <div class="ait-content__blog__card__img" style="background-image: url('arrowit-admin/img/blog_post/<?=$imagem?>');">
                    <span class="ait-content__blog__card__img__icon video"></span>
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
            <?}?>
          </div>
          <div class="ait-utilities__text-align__center ait-utilities__pdd__30-0">
            <a href="#" class="ait-component__button">Carregar mais</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<? include("footer.php"); ?>