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

    <section class="ait-content__projetos">
      <div class="ait-component__tab">
        <div class="ait-component__tab__nav">
          <div class="ait-container">
            <ul>
              <li class="active" ait-tab-item="tab1">Projetos</li>
              <li ait-tab-item="tab2">Depoimentos</li>
            </ul>
          </div>
        </div>
        <div class="ait-container">
          <div class="ait-component__tab__content active" ait-tab-content="tab1">
            <?
              include("arrowit-admin/config.php");

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
            <div class="ait-content__projetos__item">
              <a href="projetos-integra.php?id=<?=$id_projeto?>">
                <div class="ait-content__projetos__item__img">
                  <img src="arrowit-admin/img/projetos/<?=$imagem?>" alt="">
                </div>
                <strong><?=$titulo?></strong>
                <span><?=$setor?></span>
                <div class="row">
                  <div class="col-lg-6">
                    <span class="ait-content__projetos__item__icon tempo"></span>
                    <strong>Tempo de processo</strong>
                    <p><?=$tempo_processo?></p>
                  </div>
                  <div class="col-lg-6">
                    <span class="ait-content__projetos__item__icon ambiente"></span>
                    <strong>Ambiente</strong>
                    <p><?=$ambiente?></p>
                  </div>
                </div>
                <div class="ait-utilities__text-align__center">
                  <span class="ait-component__button outline">Saiba Mais</span>
                </div>
              </a>
            </div>
            <?}?>
          </div>
          <div class="ait-component__tab__content" ait-tab-content="tab2">
            <div class="ait-content__projetos__depoimento">
              <div class="ait-content__projetos__depoimento__item">
                <p>
                  “O apoio e flexibilidade da Arrow IT, no entendimento da nossa situação e disponibilização ágil de recursos com o perfil que procurávamos, foi essencial para reverter a imagem do novo Service Desk, aumentar a satisfação dos nossos usuários e agregar valor ao nosso negócio.”
                </p>
                <strong>
                  Cláudia Marquesani 
                  <span>Gerente Executiva de Serviços e Operações de TI</span>
                </strong>
              </div>
              <div class="ait-content__projetos__depoimento__item">
                <p>
                  “Fizemos uma grande parceria, uma empresa que só agregou para empresa MA&A, nós estamos muito satisfeitos com todo serviço oferecido a dedicação que a Arrow tem conosco e o que melhor ainda, é ver os meus clientes satisfeitos com o serviço.”
                </p>
                <strong>
                   Adriana Lima 
                  <span>Proprietária</span>
                </strong>
              </div>
              <div class="ait-content__projetos__depoimento__item">
                <p>
                  “A Arrow IT trouxe a nós o que mais precisava: tempo, eficiência e agilidade.<br>Essas são as palavras que podemos definir sobre a parceria.”
                </p>
                <strong>
                   Gustavo Moraes
                  <span>Infraestrutura de TI</span>
                </strong>
              </div>
              <div class="ait-content__projetos__depoimento__item">
                <p>
                  “A Arrow IT trouxe a nós o que mais precisava: tempo, eficiência e agilidade. Essas são as palavras que podemos definir sobre a parceria.”
                </p>
                <strong>
                   Gustavo Moraes
                  <span>Infraestrutura de TI</span>
                </strong>
              </div>
              <div class="ait-content__projetos__depoimento__item">
                <p>
                  “Com a parceria da empresa Arrow IT conseguimos consolidar o nosso parque de máquinas (servidores), para um ambiente virtualizado, trazendo maior produtividade, segurança e economia, sendo de infraestrutura e manutenção. Atendimento rápido e com excelente tempo de resposta nos atendimentos.”
                </p>
                <strong>
                   Salmo Donizeti da Silva
                  <span>Gestão de TI</span>
                </strong>
              </div>
              <div class="ait-content__projetos__depoimento__item">
                <p>
                  “Depositamos na Arrow IT a confiança e responsabilidade de cuidar de nossa infraestrutura na parte de servidores, dados e controle de usuários estabelecendo uma parceria na prestação de serviços em T.I.”
                </p>
                <strong>
                   Gestão de Tecnologia 
                  <span>Drypol Industria e Comércio de Polímeros</span>
                </strong>
              </div>
              <div class="ait-content__projetos__depoimento__item">
                <p>
                  “A Arrow IT é uma das principais parceiras da empresa na área de TI. Sempre estão prontos para auxiliar no que for necessário, independentemente do dia e horário. Há suporte 24 horas do dia, todos os dias da semana e o profissionalismo e capacidade técnica dos especialistas é indiscutível.”
                </p>
                <strong>
                   Eliton Bissoli
                  <span>Gerente de TI</span>
                </strong>
              </div>
              <div class="ait-content__projetos__depoimento__item">
                <p>
                  “O Gerenciamento de nosso ambiente de infraestrutura de servidores virtuais é feito pela Arrow IT. Iniciamos esta parceria em 2016 e o resultado está sendo muito satisfatório. A capacitação profissional nestas áreas é fundamental e são muito bem exercidos pela Arrow, o que nos dá muita segurança e confiança.”
                </p>
                <strong>
                   Emerson Martes
                  <span>Coordenador de Suporte Grupo Ráscal</span>
                </strong>
              </div>
            </div>
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