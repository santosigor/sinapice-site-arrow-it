<?php 
  include("ait_classes.php");

	$objait = new Ait_class();

	if(@$_POST["acao"]==1){
		@$titulo = $_POST["titulo"];
		@$texto = $_POST["texto"];
		@$destaque = $_POST["destaque"];

		$objait->registerProjetos('', $titulo, $texto, $destaque);

    @$_POST["acao"] = 0;
	}else if(@$_POST["acao"]==2){
		@$id_projeto = $_POST["idprojeto"];
		@$titulo = $_POST["titulo"];
		@$texto = $_POST["textomodal".$id_projeto];
		@$destaque = $_POST["destaque"];

		$objait->registerProjetos($id_projeto, $titulo, $texto, $destaque);

  }else if(@$_POST["acao"]==3){

    $id_projeto = $_POST["idprojeto"];

		$objait->deleteProjetos($id_projeto);
  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Novo Projeto</h3>
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Titulo</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="titulo" name="titulo" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Texto</label>
                </div>
                <div class="col-12 col-md-9">
                  <textarea class="peTextAreaEditText" id="texto" name="texto"></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Destaque</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="destaque" name="destaque" class="form-control" />
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="idprojeto" name="idprojeto" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button onclick="acaoProjetos('1', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
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
                  <th>titulo</th>
                  <th width="50%">texto</th>
                  <th>destaque</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_projeto, titulo, texto, destaque
                  FROM pe_projetos 
                  WHERE 1
                  ORDER BY id_projeto DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_projeto = $row["id_projeto"];
                    $titulo = $row["titulo"];
                    $texto = $row["texto"];
                    $destaque = $row["destaque"];
                ?>
                <tr class="tr-shadow">
                  <td><?=$titulo?></td>
                  <td><?=$texto?></td>
                  <td><?=$destaque?></td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_projeto?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoProjetos('3', <?=$id_projeto?>, '1');">
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
  $sql = "SELECT id_projeto, titulo, texto, destaque
  FROM pe_projetos 
  WHERE 1
  ORDER BY id_projeto DESC";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_projeto = $row["id_projeto"];
    $titulo = $row["titulo"];
    $texto = $row["texto"];
    $destaque = $row["destaque"];
?>
<div class="modal fade" id="mediumModal<?=$id_projeto?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Legenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formmodal<?=$id_projeto?>" name="formmodal<?=$id_projeto?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Titulo</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="titulo" name="titulo" class="form-control" value="<?=$titulo?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Texto</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea class="peTextAreaEditText" id="textomodal<?=$id_projeto?>" name="textomodal<?=$id_projeto?>"><?=$texto?></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Destaque</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="destaque" name="destaque" class="form-control" value="<?=$destaque?>" />
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="idprojeto" name="idprojeto" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoProjetos('2', '<?=$id_projeto?>', '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>