<? include("header.php"); ?>

  <section class="ait-component__banner">
    <div class="ait-component__banner__carousel">
      <?
        $sql = "SELECT imagem, imagemmobile, imagemtablet
        FROM ait_home_banner
        WHERE 1
        ORDER BY data_cadastro, destaque DESC
        LIMIT 4";
        $rs = mysqli_query($con, $sql); 
        while($row = mysqli_fetch_array($rs)){
          $imagem = $row["imagem"];
          $imagemmobile = $row["imagemmobile"];
          $imagemtablet = $row["imagemtablet"];
      ?>
      <div>
        <picture>
        <?if($imagemmobile!=""){?>
          <source media="(min-width: 0) and (max-width: 767.98px)" srcset="gcs/img/home_banner/<?=$imagemmobile?>" />
        <?}?>
        <?if($imagemtablet!=""){?>
          <source media="(min-width: 768px) and (max-width: 991.98px)" srcset="gcs/img/home_banner/<?=$imagemtablet?>" />
        <?}?>
          <img src="gcs/img/home_banner/<?=$imagem?>" alt="" />
        </picture>
      </div>
      <?}?>
    </div>
  </section>

  <section class="ait-content__arrow-it-eo-futuro">
    <div class="ait-container">
      <div class="row">
        <div class="col-md-6 ait-utilities__text-align__right">
          <img src="./dist/images/home/futuro/ait-svg-arrow-futuro.svg" alt="">
        </div>
        <div class="col-md-6">
          <div class="ait-utilities__align-items-center">
            <div>
              <span class="ait-component__tag">Essência</span>
              <div class="ait-typography__h1">Arrow IT <br>é o futuro</div>
              <img src="./dist/images/home/futuro/ait-svg-arrow-futuro.svg" alt="">
              <p>
                Oferecemos serviços e soluções de tecnologia, tendo como foco principal <span class="ait-utilities__palavra-chave">entender a fundo a necessidade</span> ou problema do seu negócio, a fim de desenvolver e entregar a melhor solução para você.
              </p>
              <a href="sobre-arrow-it.php" class="ait-component__link">Conheça a arrow it</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ait-content__arrow-it-eo-futuro__experiencia">
      <div class="ait-container">
        <div class="ait-content__arrow-it-eo-futuro__experiencia__shadow">
          <div class="row">
            <div class="col-lg-6">
            <span class="ait-component__tag">Experência</span>
            <div class="ait-typography__h3">
              Agilizando e fortalecendo as entregas <br>tecnológicas para transformar<br> o seu negócio
            </div>
              <img src="./dist/images/home/futuro/ait-svg-experiencia.svg" alt="" class="ait-utilities__img-fluid">
            </div>
            <div class="col-lg-6">
              <div class="ait-content__arrow-it-eo-futuro__experiencia__item">
                <img src="./dist/images/home/futuro/ait-svg-eficiencia.svg" alt="">
                <div>
                  <span class="ait-component__tag">Eficiência</span>
                  <strong>+ 3.000 ativos <br><span>Monitorados</span></strong>
                </div>
              </div>
              <div class="ait-content__arrow-it-eo-futuro__experiencia__item">
                <img src="./dist/images/home/futuro/ait-svg-transformacao.svg" alt="">
                <div>
                  <span class="ait-component__tag">Transformação</span>
                  <strong><span>Atuação</span> <br>Multicloud e <br>On-Premise</strong>
                </div>
              </div>
              <div class="ait-content__arrow-it-eo-futuro__experiencia__item">
                <img src="./dist/images/home/futuro/ait-svg-rapidez.svg" alt="">
                <div>
                  <span class="ait-component__tag">Rapidez</span>
                  <strong><span>SLA para primeiro atendimento de</span> <br>15 minutos</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ait-content__arrow-it-eo-futuro__experiencia__parceria">
          <div class="ait-typography__h5 ait-utilities__text-align__center">Parceria sólida com os maiores players</div>
          <div class="ait-component__carousel center">
            <?
              $sql = "SELECT imagem
              FROM ait_parceiros
              WHERE 1
              ORDER BY id_parceiro DESC";
              $rs = mysqli_query($con, $sql); 
              while($row = mysqli_fetch_array($rs)){
                $imagem = $row["imagem"];
            ?>
              <div>
                <img src="gcs/img/parceiros/<?=$imagem?>" alt="" width="200px">
              </div>
            <?}?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ait-content__nossos-servicos">
    <div class="ait-container">
      <div class="row">
        <div class="col-md-6">
          <span class="ait-component__tag">Nossos serviços</span>
          <div class="ait-content__nossos-servicos__logo">Arrow Plataform</div>
          <img src="./dist/images/home/servicos/ait-svg-nossos-servicos.svg" alt="">
          <p>
            É um conjunto de peças que garante as <span class="ait-utilities__palavra-chave bg"><i>entregas</i> <strong>proativas,</strong></span> simplificando o seu ciclo de sustentação tecnológica.
          </p>
          <p>
            Atuando nas camadas estratégicas, técnicas e operacionais, a <strong>Arrow.Platform</strong>, garante uma sustentação completa do seu ambiente de TI, garantindo uma <strong>gestão centralizada, reduzindo gastos operacionais, melhorando a segurança, aumentando o desempenho e a continuidade do seu negócio.</strong>
          </p>
          <ul>
            <li>
              <img src="./dist/images/home/servicos/1.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/2.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/3.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/4.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/5.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/6.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/7.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/8.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/9.svg" alt="">
            </li>
            <li>
              <img src="./dist/images/home/servicos/10.svg" alt="">
            </li>
          </ul>
          <a href="servicos.php" class="ait-component__link white">Conheça os serviços</a>
        </div>
        <div class="col-md-6">
          <div class="ait-utilities__align-items-center">
            <img src="./dist/images/home/servicos/ait-svg-nossos-servicos.svg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ait-content__cases">
    <div class="ait-container">
      <div class="ait-content__cases__carrossel">
        <div class="ait-typography__h1 ait-utilities__text-align__center">Cases Arrow IT</div>
        <div class="ait-component__carousel center white">
          <?
            $sql = "SELECT id_projeto, titulo, setor, imagem, tempo_processo, ambiente
            FROM ait_projetos
            WHERE 1
            ORDER BY id_projeto DESC";
            $rs = mysqli_query($con, $sql); 
            while($row = mysqli_fetch_array($rs)){
              $id_projeto = $row["id_projeto"];
              $titulo = $row["titulo"];
              $setor = $row["setor"];
              $imagem = $row["imagem"];
              $tempo_processo = $row["tempo_processo"];
              $ambiente = $row["ambiente"];
          ?>
          <div>
            <a href="projetos-integra.php?id=<?=$id_projeto?>" class="ait-content__cases__carrossel__item">
              <div><img src="gcs/img/projetos/<?=$imagem?>" alt=""></div>
              <strong><?=$titulo?></strong>
              <span><?=$setor?></span>
            </a>
          </div>
          <?}?>
        </div>
      </div>
      <div class="ait-content__cases__potencializacao ait-utilities__text-align__center">
        <span class="ait-component__tag">Potêncialização</span>
        <div class="ait-typography__h3">
          Fazemos um planejamento ajustado à realidade <br>da sua empresa.
        </div>
        <a href="orcamento.php" class="ait-component__link">Venha fazer um orçamento</a>
      </div>
    </div>
  </section>

  <section class="ait-content__confianca">
    <div class="ait-container">
      <span class="ait-component__tag">Quem confia na arrow it</span>
      <div class="ait-component__carousel center">
        <?
          $sql = "SELECT imagem
          FROM ait_clientes
          WHERE 1
          ORDER BY id_cliente DESC";
          $rs = mysqli_query($con, $sql); 
          while($row = mysqli_fetch_array($rs)){
            $imagem = $row["imagem"];
        ?>
          <div>
            <img src="gcs/img/clientes/<?=$imagem?>" alt="" width="140px">
          </div>
        <?}?>
      </div>
    </div>
  </section>
  <?
    $sql = "SELECT id_post, titulo, segmento, imagem, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad, conteudo, id_categoria
            FROM ait_blog_post
            WHERE 1
            ORDER BY id_post DESC
            LIMIT 8";
    $rs = mysqli_query($con, $sql); 
    if(mysqli_num_rows($rs)>0){
  ?>
  <section class="ait-content__home-blog">
    <div class="ait-content__home-blog__bg">
      <div class="ait-container">
        <span class="ait-component__tag">Conhecimento</span>
        <div class="ait-typography__h1">Arrow.Blog</div>
      </div>
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
                <span><?=$data_cadastro?></span>
                <strong><?=$titulo?></strong>
              </div>
            </a>
          </div>
        </div>
        <?}?>
      </div>
    </div>
    <div class="ait-utilities__text-align__center"><br>
      <a href="blog.php" class="ait-component__link">Leia mais</a>
    </div>
  </section>
  <?}?>

  <?
   $sql = "SELECT id_dados, endereco, telefone, celular, email, facebook, instagram, linkedin
   FROM ait_dadosgerais 
   WHERE 1";
   $rs = mysqli_query($con, $sql); 
   $row = mysqli_fetch_array($rs);
   $endereco = $row["endereco"];
   $telefone = $row["telefone"];
   $celular = $row["celular"];
   $email = $row["email"];
   $facebook = $row["facebook"];
   $instagram = $row["instagram"];
   $linkedin = $row["linkedin"];

   $telform = "(".substr($telefone,0,2).") <strong>".substr($telefone,2,-4)." - ".substr($telefone,-4)."</strong>";
   $celform = "(".substr($celular,0,2).") <strong>".substr($celular,2,-4)." - ".substr($celular,-4)."</strong>";
  ?>

  <section class="ait-content__contato">
    <div class="ait-container">
      <div class="ait-utilities__text-align__center">
        <span class="ait-component__tag">Contato</span>
        <div class="ait-typography__h1">Quando vamos tomar um café?</div>
      </div>
      <div class="row"> 
        <div class="col-md-5">
          <ul>
            <li>
              <a href="https://goo.gl/maps/bB93DWEQBm7ytmNAA" target="_blank"><?=$endereco?></a>
            </li>
            <li>
              <a href="tel:+55<?=$telefone?>"><?=$telform?></a>
            </li>
            <li>
              <a  href="https://api.whatsapp.com/send?phone=55<?=$celular?>" target="_blank"><?=$celform?></a>
              <p>
                WhatsApp <span>Suporte em atendimento 24 x 7</span>
              </p>
            </li>
            <li>
              <a href="mailto:<?=$email?>"><?=$email?></a>
            </li>
            <li>
              <a href="<?=$facebook?>" target="_blank" title="Facebook">
                <img src="./dist/images/icons/ait-svg-facebook.svg" alt="">
              </a>
              <a href="<?=$instagram?>" target="_blank" title="Instagram">
                <img src="./dist/images/icons/ait-svg-instagram.svg" alt="">
              </a>
              <a href="<?=$linkedin?>" target="_blank" title="Linkedin">
                <img src="./dist/images/icons/ait-svg-linkedin.svg" alt="">
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-7">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.7219460368365!2d-46.87049478502309!3d-23.50652268471013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf03d22ffb1e47%3A0x872f33af5d4784aa!2sAv.%20Trindade%2C%20254%20-%20Bethaville%20I%2C%20Barueri%20-%20SP%2C%2006404-326!5e0!3m2!1spt-BR!2sbr!4v1620818264948!5m2!1spt-BR!2sbr" width="100%" height="445" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>  
    </div>
  </section>

<? include("footer.php"); ?>