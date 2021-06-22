<?php 
  include("pe_classes.php");

	$objpe = new Pe_class();

	if(@$_POST["acao"]==1){
		@$legenda = $_POST["legenda"];
		@$destaque = $_POST["destaque"];

    $nomeimagem = "";
    if ( isset( $_FILES[ 'imagembanner' ][ 'name' ] ) && $_FILES[ 'imagembanner' ][ 'error' ] == 0 ) {
    
        $arquivo_tmp = $_FILES[ 'imagembanner' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imagembanner' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = uniqid ( time () ).'.'.$extensao;
            $destino = 'img/banner/'.$novoNome;
            
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                $nomeimagem = $novoNome;
            }
        }
    }

		$objpe->registerBanner($legenda, $destaque, $nomeimagem);

    @$_POST["acao"] = 0;
	}else if(@$_POST["acao"]==2){
    $idbanner = $_POST["idbannermodal"];
		@$legenda = $_POST["legenda"];
		@$destaque = $_POST["destaque"];

    $nomeimagem = "";
    if($_FILES[ 'imagembanner' ][ 'name' ]!=""){
      if ( isset( $_FILES[ 'imagembanner' ][ 'name' ] ) && $_FILES[ 'imagembanner' ][ 'error' ] == 0 ) {
      
          $arquivo_tmp = $_FILES[ 'imagembanner' ][ 'tmp_name' ];
          $nome = $_FILES[ 'imagembanner' ][ 'name' ];
      
          $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
          $extensao = strtolower ( $extensao );

          if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
              $novoNome = uniqid ( time () ).'.'.$extensao;
              $destino = 'img/banner/'.$novoNome;
              
              if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                  $nomeimagem = $novoNome;
              }
          }
      }
    }

		$objpe->updateBanner($idbanner, $legenda, $destaque, $nomeimagem);

  }else if(@$_POST["acao"]==3){

    $idbanner = $_POST["idbanner"];
		$objpe->deleteBanner($idbanner);

  }else if(@$_POST["acao"]==4||@$_POST["acao"]==6){

    $id_link = $_POST["id_link"];
    @$codigo_video = $_POST["codigo_video"];
    @$destaque = $_POST["destaque"];

		$objpe->insertLink($id_link, $codigo_video, $destaque);

  }else if(@$_POST["acao"]==5){

    $id_link = $_POST["id_link"];

		$objpe->deleteLink($id_link);

  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Novo Banner</h3>
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Legenda</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="legenda" name="legenda" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label class=" form-control-label">Destaque</label>
                </div>
                <div class="col col-md-9">
                  <div class="form-check">
                      <div class="checkbox">
                          <label for="checkbox1" class="form-check-label ">
                              <input type="checkbox" id="destaque" name="destaque" value="1" class="form-check-input">Sim
                          </label>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="file-input" class="form-control-label">Imagem</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="file" id="imagembanner" name="imagembanner" class="form-control-file imagesize m-b-10" />
                  <small class="form-text text-muted">Dimensões: 1280px / 572px</small>
                  <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="idbanner" name="idbanner" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button onclick="cadastroSubmit();" class="btn btn-success btn-md"> Cadastrar</button>
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
                  <th width="50%">legenda</th>
                  <th>destaque</th>
                  <th>imagem</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_banner, legenda, destaque, imagem
                  FROM pe_banner_home 
                  WHERE 1
                  ORDER BY id_banner DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_banner = $row["id_banner"];
                    $legenda = $row["legenda"];
                    $destaque = $row["destaque"];
                    $imagem = $row["imagem"];
                ?>
                <tr class="tr-shadow">
                  <td><?=$legenda?></td>
                  <?if($destaque == 1){?>
                  <td class="desc">SIM</td>
                  <?}else{?>
                  <td>NÃO</td>
                  <?}?>
                  <td>
                    <img src="img/banner/<?=$imagem?>" alt="<?=$legenda?>" width="150px" />
                  </td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_banner?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="deleteBanner(<?=$id_banner?>);">
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
  $sql = "SELECT id_banner, legenda, destaque, imagem
  FROM pe_banner_home 
  WHERE 1";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $idban = $row["id_banner"];
    $legenda = $row["legenda"];
    $destaque = $row["destaque"];
    $imagem = $row["imagem"];
?>
<div class="modal fade" id="mediumModal<?=$idban?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
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
        <form id="formmodal<?=$idban?>" name="formmodal<?=$idban?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Legenda</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="legenda" name="legenda" class="form-control" value="<?=$legenda?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label class=" form-control-label">Destaque</label>
            </div>
            <div class="col col-md-9">
              <div class="form-check">
                  <div class="checkbox">
                      <label for="checkbox1" class="form-check-label ">
                          <input type="checkbox" id="destaque" name="destaque" value="1" class="form-check-input" <?if($destaque==1){?>checked<?}?>>Sim
                      </label>
                  </div>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class="form-control-label">Imagem</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="imagembanner" name="imagembanner" class="form-control-file imagesize m-b-10" />
              <small class="form-text text-muted">Dimensões: 1280px / 572px</small>
              <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="idbannermodal" name="idbannermodal" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="updateBanner('<?=$idban?>');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<hr>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Novo Video</h3>
            <form id="formlinks" name="formlinks" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Codigo do video</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="codigo_video" name="codigo_video" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label class=" form-control-label">Destaque</label>
                </div>
                <div class="col col-md-9">
                  <div class="form-check">
                      <div class="checkbox">
                          <label for="checkbox1" class="form-check-label ">
                              <input type="checkbox" id="destaque" name="destaque" value="1" class="form-check-input">Sim
                          </label>
                      </div>
                  </div>
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="id_link" name="id_link" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button onclick="acaoLink('4', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
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
                  <th width="50%">Codigo do video</th>
                  <th>destaque</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_link, codigo_video, destaque
                  FROM pe_links_home 
                  WHERE 1
                  ORDER BY id_link DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_link = $row["id_link"];
                    $codigo_video = $row["codigo_video"];
                    $destaque = $row["destaque"];
                ?>
                <tr class="tr-shadow">
                  <td><?=$codigo_video?></td>
                  <?if($destaque == 1){?>
                  <td class="desc">SIM</td>
                  <?}else{?>
                  <td>NÃO</td>
                  <?}?>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_link?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoLink('5', <?=$id_link?>, '1');">
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
  $sql = "SELECT id_link, codigo_video, destaque
  FROM pe_links_home 
  WHERE 1";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_link = $row["id_link"];
    $codigo_video = $row["codigo_video"];
    $destaque = $row["destaque"];
?>
<div class="modal fade" id="mediumModal<?=$id_link?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
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
        <form id="formlinksmodal<?=$id_link?>" name="formlinksmodal<?=$id_link?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Codigo do video</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="codigo_video" name="codigo_video" class="form-control" value="<?=$codigo_video?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label class=" form-control-label">Destaque</label>
            </div>
            <div class="col col-md-9">
              <div class="form-check">
                  <div class="checkbox">
                      <label for="checkbox1" class="form-check-label ">
                          <input type="checkbox" id="destaque" name="destaque" value="1" class="form-check-input" <?if($destaque==1){?>checked<?}?>>Sim
                      </label>
                  </div>
              </div>
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="id_link" name="id_link" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoLink('6', '<?=$id_link?>', '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>