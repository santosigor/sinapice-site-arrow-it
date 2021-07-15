<? include("header.php"); ?>

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
                  <img src="gcs/img/projetos/<?=$imagem?>" alt="">
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
              <?
                $sql = "SELECT id_depoimento, texto, cliente, cargo
                FROM ait_depoimentos 
                WHERE 1
                ORDER BY id_depoimento DESC";
                $rs = mysqli_query($con, $sql); 
                while($row = mysqli_fetch_array($rs)){
                  $id_depoimento = $row["id_depoimento"];
                  $texto = $row["texto"];
                  $cliente = $row["cliente"];
                  $cargo = $row["cargo"];
              ?>
                <div class="ait-content__projetos__depoimento__item">
                  <p><?=$texto?></p>
                  <strong>
                    <?=$cliente?>
                    <span><?=$cargo?></span>
                  </strong>
                </div>
              <?}?>
            </div>
          </div>
        </div>
      </div>
    </section>

<? include("footer.php"); ?>