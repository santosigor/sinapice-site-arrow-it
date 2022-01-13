<?php 
  include("ait_classes.php");

  if($_SESSION["id_perfil_".$_SESSION["nomesessao"]]!=1){
    Header("Location: ait_dadosgerais.php");
  }

	$objait = new Ait_class();

	if(@$_POST["acao"]==1){
		@$idautor = $_POST["id_autor"];
    @$autor = $_POST["autor"];
    @$cargo_autor = $_POST["cargo_autor"];

    $nomefotoautor = "";
    if ( isset( $_FILES[ 'foto_autor' ][ 'name' ] ) && $_FILES[ 'foto_autor' ][ 'error' ] == 0 ) {
    
        $arquivo_tmp = $_FILES[ 'foto_autor' ][ 'tmp_name' ];
        $nome = $_FILES[ 'foto_autor' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/blog_post/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomefotoautor = $novoNome;
        }
    }

		$objait->registerAutor("", $autor, $cargo_autor, $nomefotoautor);

    header('Location: ait_autor.php');
	}else if(@$_POST["acao"]==2){
   @$idautor = $_POST["id_autor"];
    @$autor = $_POST["autor"];
    @$cargo_autor = $_POST["cargo_autor"];

    $nomefotoautor = "";
    if ( isset( $_FILES[ 'foto_autor' ][ 'name' ] ) && $_FILES[ 'foto_autor' ][ 'error' ] == 0 ) {
    
        $arquivo_tmp = $_FILES[ 'foto_autor' ][ 'tmp_name' ];
        $nome = $_FILES[ 'foto_autor' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/blog_post/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomefotoautor = $novoNome;
        }
    }

    $objait->registerAutor($idautor, $autor, $cargo_autor, $nomefotoautor);

  }else if(@$_POST["acao"]==3){

    $idautor = $_POST["idautor"];

		$objait->deleteAutor($idautor);
  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Inserir Autor</h3>
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Autor</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="autor" name="autor" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Cargo</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="cargo_autor" name="cargo_autor" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="file-input" class="form-control-label">Foto</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="file" id="foto_autor" name="foto_autor" class="form-control-file imagesize m-b-10" />
                  <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="idautor" name="idautor" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button type="button" onclick="acaoAutor('1', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
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
                  <th>Autor</th>
                  <th>Cargo</th>
                  <th>Foto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sqlautor = "SELECT id_autor, nome, cargo, foto
                    FROM ait_autor
                    WHERE 1
                    ORDER BY nome ASC";
                    $rsautor = mysqli_query($con, $sqlautor);
                    while($rowautor = mysqli_fetch_array($rsautor)){
                      $idautor = $rowautor["id_autor"];
                      $foto_autor = $rowautor["foto"];
                      $nome_autor = $rowautor["nome"];
                      $cargo_autor = $rowautor["cargo"];
                ?>
                <tr class="tr-shadow">
                  <td><?=$nome_autor?></td>
                  <td><?=$cargo_autor?></td>
                  <td>
                  <?if($foto_autor!=""){?>
                    <img src="img/blog_post/<?=$foto_autor?>" alt="" width="68px" />
                  <?}?>
                  </td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$idautor?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoAutor('3', <?=$idautor?>, '1');">
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
   $sqlautor = "SELECT id_autor, nome, cargo
                FROM ait_autor
                WHERE 1
                ORDER BY nome ASC";
                $rsautor = mysqli_query($con, $sqlautor);
                while($rowautor = mysqli_fetch_array($rsautor)){
                  $idautor = $rowautor["id_autor"];
                  $nome_autor = $rowautor["nome"];
                  $cargo_autor = $rowautor["cargo"];
?>
<div class="modal fade" id="mediumModal<?=$idautor?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
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
       <form id="formmodal<?=$idautor?>" name="form<?=$idautor?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Autor</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="autor" name="autor" class="form-control" value="<?=$nome_autor?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Cargo</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="cargo_autor" name="cargo_autor" class="form-control" value="<?=$cargo_autor?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class="form-control-label">Foto</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="foto_autor" name="foto_autor" class="form-control-file imagesize m-b-10" />
              <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="idautor" name="idautor" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoAutor('2', <?=$idautor?>, '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>