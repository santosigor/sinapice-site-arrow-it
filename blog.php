<? include("header.php"); ?>

  <section class="ait-component__banner">
    <div class="ait-component__banner__carousel before-none">
      <?
        $sql = "SELECT id_post, titulo, imagem, segmento
        FROM ait_blog_post
        WHERE id_categoria = 1 AND destaque = 1
        ORDER BY id_post DESC";
        $rs = mysqli_query($con, $sql); 
        while($row = mysqli_fetch_array($rs)){
          $id_post = $row["id_post"];
          $imagem = $row["imagem"];
          $titulo = $row["titulo"];
          $segmento = $row["segmento"];
      ?>
        <div class="ait-content__blog__banner">
          <a href="blog-integra.php?id=<?=$id_post?>">
            <div class="ait-content__blog__banner__img" style="background-image: url('gcs/img/blog_post/<?=$imagem?>');">
              <div class="ait-container">
                <div class="ait-content__blog__banner__text">
                  <span><?=$segmento?></span>
                  <div class="ait-content__blog__banner__title">
                    <?=$titulo?>
                  </div>
                </div>
              </div>
            </div>
          </a>
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
              $sql = "SELECT id_post, titulo, segmento, imagem, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, conteudo, id_categoria, linkvideo, video
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
                $video = $row["video"];
                $linkvideo = $row["linkvideo"];
                $d = explode("/", $linkvideo);
                $linkvideo  = $d[3];
                $urlvideo = "https://www.youtube.com/embed/".$linkvideo;

                $d = explode("-", $data_cadastro);
                $data_cadastro = $d[2]."/".$d[1]."/".$d[0];

                $id_categoria = $row["id_categoria"];

                if($id_categoria==1){
            ?>
              <div class="ait-content__blog__card">
                <a href="blog-integra.php?id=<?=$id_post?>">
                  <div class="ait-content__blog__card__img" style="background-image: url('gcs/img/blog_post/<?=$imagem?>');">
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
              <?
                }else if($id_categoria==2){
              ?>
                <div class="ait-content__blog__card">
                  <a href="#" class="ait-modal-open" ait-modal="modalVideo1<?=$id_post?>">
                    <div class="ait-content__blog__card__img" style="background-image: url('gcs/img/blog_post/<?=$imagem?>');">
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
                <div ait-modal="modalVideo1<?=$id_post?>" class="ait-component__modal">
                  <div class="ait-component__modal__wrapper">
                    <div class="ait-component__modal__content">
                      <span class="ait-component__modal__close ait-modal-close"></span>
                      <div class="ait-component__modal__body">
                        <?if($urlvideo!=""){?>
                          <iframe width="100%" height="538" src="<?=$urlvideo?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?}?>
                        <?if($video!=""){?>
                          <video width="100%" height="538" controls>
                            <source src="gcs/img/blog_post/<?=$video?>" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>
                        <?}?>
                      </div>
                    </div>
                  </div>
                </div>
              <?}?>
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
                  <div class="ait-content__blog__card__img" style="background-image: url('gcs/img/blog_post/<?=$imagem?>');">
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
              $sql = "SELECT id_post, titulo, segmento, imagem, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, conteudo, video, linkvideo
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
                $video = $row["video"];
                $linkvideo = $row["linkvideo"];
                $d = explode("/", $linkvideo);
                $linkvideo  = $d[3];
                $urlvideo = "https://www.youtube.com/embed/".$linkvideo;

                $d = explode("-", $data_cadastro);
                $data_cadastro = $d[2]."/".$d[1]."/".$d[0];
            ?>        
              <div class="ait-content__blog__card">
                <a href="#" class="ait-modal-open" ait-modal="modalVideo0<?=$id_post?>">
                  <div class="ait-content__blog__card__img" style="background-image: url('gcs/img/blog_post/<?=$imagem?>');">
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
              <div ait-modal="modalVideo0<?=$id_post?>" class="ait-component__modal">
                <div class="ait-component__modal__wrapper">
                  <div class="ait-component__modal__content">
                    <span class="ait-component__modal__close ait-modal-close"></span>
                    <div class="ait-component__modal__body">
                      <?if($urlvideo!=""){?>
                        <iframe width="100%" height="538" src="<?=$urlvideo?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      <?}?>
                      <?if($video!=""){?>
                        <video width="100%" height="538" controls>
                          <source src="gcs/img/blog_post/<?=$video?>" type="video/mp4">
                          Your browser does not support the video tag.
                        </video>
                      <?}?>
                    </div>
                  </div>
                </div>
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