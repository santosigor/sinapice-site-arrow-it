<?php 
  include("ait_classes.php");

  if($_SESSION["id_perfil_".$_SESSION["nomesessao"]]!=1){
    Header("Location: ait_dadosgerais.php");
  }

  $objait = new Ait_class();

  if(@$_POST["acao"]==1){
    @$texto = $_POST["texto"];
    @$cliente = $_POST["cliente"];
    @$cargo = $_POST["cargo"];
    @$id_projeto = $_POST["id_projeto"];

    $nomevideo = "";
    if ( isset( $_FILES[ 'video' ][ 'name' ] ) && $_FILES[ 'video' ][ 'error' ] == 0 ) {
    
        $arquivo_tmp = $_FILES[ 'video' ][ 'tmp_name' ];
        $nome = $_FILES[ 'video' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/depoimentos/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomevideo = $novoNome;
        }
    }

    $objait->registerDepoimentos("", $texto, $cliente, $cargo, $id_projeto, $nomevideo);

    header('Location: ait_depoimentos.php');
  }else if(@$_POST["acao"]==2){
    @$id_depoimento = $_POST["iddepoimento"];
    @$texto = $_POST["texto"];
    @$cliente = $_POST["cliente"];
    @$cargo = $_POST["cargo"];
    @$id_projeto = $_POST["id_projeto"];

    $nomevideo = "";
    if($_FILES[ 'video' ][ 'name' ]!=""){
      if ( isset( $_FILES[ 'video' ][ 'name' ] ) && $_FILES[ 'video' ][ 'error' ] == 0 ) {
        $arquivo_tmp = $_FILES[ 'video' ][ 'tmp_name' ];
        $nome = $_FILES[ 'video' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );
        
        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/depoimentos/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomevideo = $novoNome;
        }
      }
    }

    $objait->registerDepoimentos($id_depoimento, $texto, $cliente, $cargo, $id_projeto, $nomevideo);

  }else if(@$_POST["acao"]==3){

    $iddepoimento = $_POST["iddepoimento"];

    $objait->deleteDepoimentos($iddepoimento);
  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Novo Depoimento</h3>
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row form-group" style="display:none;">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Projeto</label>
                </div>
                <div class="col-12 col-md-9">
                  <select name="id_projeto" id="id_projeto" class="form-control">
                      <option value="0">Selecione o projeto</option>
                      <?
                        $sqlprojeto = "SELECT id_projeto, titulo
                        FROM ait_projetos
                        WHERE 1
                        ORDER BY titulo ASC";
                        $rsprojeto = mysqli_query($con, $sqlprojeto);
                        while($rowprojeto = mysqli_fetch_array($rsprojeto)){
                          $idprojeto = $rowprojeto["id_projeto"];
                          $titulo = $rowprojeto["titulo"];
                      ?>
                        <option value="<?=$idprojeto?>"><?=$titulo?></option>
                      <?}?>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Texto</label>
                </div>
                <div class="col-12 col-md-9">
                  <textarea id="texto" name="texto" rows="4" cols="50" class="form-control no-edit" style="resize: none;height: 150px;"></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Cliente</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="cliente" name="cliente" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Cargo</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="cargo" name="cargo" class="form-control" />
                </div>
              </div>
              <div class="row form-group" style="display:none;">
                <div class="col col-md-3">
                  <label for="file-input" class="form-control-label">Video</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="file" id="video" name="video" class="form-control-file videosize m-b-10" />
                  <small class="form-text text-muted">Tamanho máximo: 5mb</small><hr>
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="iddepoimento" name="iddepoimento" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button type="button" onclick="acaoDepoimentos('1', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="m-b-40 m-t-45">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Relatório</h3>
          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>Texto</th>
                  <th>Cliente</th>
                  <th>Cargo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
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
                <tr class="tr-shadow">
                  <td><?=$texto?></td>
                  <td><?=$cliente?></td>
                  <td><?=$cargo?></td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_depoimento?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoDepoimentos('3', <?=$id_depoimento?>, '1');">
                        <i class="zmdi zmdi-delete"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="spacer"></tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?
  $sql = "SELECT id_depoimento, texto, cliente, cargo, id_projeto
  FROM ait_depoimentos 
  WHERE 1
  ORDER BY id_depoimento DESC";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_depoimento = $row["id_depoimento"];
    $texto = $row["texto"];
    $cliente = $row["cliente"];
    $cargo = $row["cargo"];
    $id_projeto = $row["id_projeto"];
?>
<div class="modal fade" id="mediumModal<?=$id_depoimento?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Atualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="formmodal<?=$id_depoimento?>" name="form<?=$id_depoimento?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group" style="display:none;">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Projeto</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="id_projeto" id="id_projeto" class="form-control">
                  <option value="0">Selecione o projeto</option>
                  <?
                    $sqlprojeto = "SELECT id_projeto, titulo
                    FROM ait_projetos
                    WHERE 1
                    ORDER BY titulo ASC";
                    $rsprojeto = mysqli_query($con, $sqlprojeto);
                    while($rowprojeto = mysqli_fetch_array($rsprojeto)){
                      $idprojeto = $rowprojeto["id_projeto"];
                      $titulo = $rowprojeto["titulo"];
                  ?>
                    <option value="<?=$idprojeto?>" <?if($id_projeto==$idprojeto){?>selected<?}?>><?=$titulo?></option>
                  <?}?>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Texto</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea id="texto" name="texto" rows="4" cols="50" class="form-control no-edit" style="resize: none;height: 150px;"><?=$texto?></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Cliente</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="cliente" name="cliente" class="form-control" value="<?=$cliente?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Cargo</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="cargo" name="cargo" class="form-control" value="<?=$cargo?>" />
            </div>
          </div>
          <div class="row form-group"  style="display:none;">
            <div class="col col-md-3">
              <label for="file-input" class="form-control-label">Video</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="video" name="video" class="form-control-file videosize m-b-10" />
              <small class="form-text text-muted">Tamanho máximo: 5mb</small><hr>
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="iddepoimento" name="iddepoimento" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoDepoimentos('2', <?=$id_depoimento?>, '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>