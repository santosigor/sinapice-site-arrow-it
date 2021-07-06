<? include("header.php"); ?>

    <section class="ait-content__servicos">
      <div class="ait-content__servicos__container">
        <div class="ait-container">
          <div class="ait-content__servicos__container__carrossel">
          <?
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
                <img src="gcs/img/servicos/<?=$imagem?>" alt="">
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

<? include("footer.php"); ?>