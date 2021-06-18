<?php 
  include("pe_classes.php");

	$objpe = new Pe_class();

	if(@$_POST["acao"]==1){
		@$titulo = $_POST["titulo"];
		@$texto = $_POST["texto"];
		@$subtitulo = $_POST["subtitulo"];
		@$video = $_POST["video"];
    
    $nomeimagem = "";
    if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
    
        $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imagem' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = uniqid ( time () ).'.'.$extensao;
            $destino = 'img/temas/'.$novoNome;
            
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                $nomeimagem = $novoNome;
            }
        }
    }
    
    $nomeaudio = "";
    if ( isset( $_FILES[ 'audio' ][ 'name' ] ) && $_FILES[ 'audio' ][ 'error' ] == 0 ) {
      $arquivo_tmp = $_FILES[ 'audio' ][ 'tmp_name' ];
      $nome = $_FILES[ 'audio' ][ 'name' ];
  
      $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
      $extensao = strtolower ( $extensao );

      $novoNome = uniqid ( time () ).'.'.$extensao;
      $destino = 'img/temas/audio/'.$novoNome;
      
      if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
          $nomeaudio = $novoNome;
      }
    }

		$objpe->registerTemas('', $titulo, $texto, $nomeimagem, $subtitulo, $video, $nomeaudio);

    @$_POST["acao"] = 0;
	}else if(@$_POST["acao"]==2){
		@$id_tema = $_POST["idtema"];
		@$titulo = $_POST["titulo"];
		@$texto = $_POST["textomodal".$id_tema];
		@$subtitulo = $_POST["subtitulo"];
		@$video = $_POST["video"];
    
    $nomeimagem = "";
    if($_FILES[ 'imagem' ][ 'name' ]!=""){
      if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
      
          $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
          $nome = $_FILES[ 'imagem' ][ 'name' ];
      
          $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
          $extensao = strtolower ( $extensao );

          if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
              $novoNome = uniqid ( time () ).'.'.$extensao;
              $destino = 'img/temas/'.$novoNome;
              
              if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                  $nomeimagem = $novoNome;
              }
          }
      }
    }

    $nomeaudio = "";
    if($_FILES[ 'audio' ][ 'name' ]!=""){
      if ( isset( $_FILES[ 'audio' ][ 'name' ] ) && $_FILES[ 'audio' ][ 'error' ] == 0 ) {
        $arquivo_tmp = $_FILES[ 'audio' ][ 'tmp_name' ];
        $nome = $_FILES[ 'audio' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/temas/audio/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomeaudio = $novoNome;
        }
      }
    }

    $objpe->registerTemas($id_tema, $titulo, $texto, $nomeimagem, $subtitulo, $video, $nomeaudio);

  }else if(@$_POST["acao"]==3){

    $id_tema = $_POST["idtema"];

		$objpe->deleteTemas($id_tema);
  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Novo Tema</h3>
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
                  <label for="text-input" class="form-control-label">Subtitulo</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="subtitulo" name="subtitulo" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="file-input" class="form-control-label">Imagem</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="file" id="imagem" name="imagem" class="form-control-file imagesize m-b-10" />
                  <small class="form-text text-muted">Dimensões: 1280px / 572px</small>
                  <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
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
                  <label for="text-input" class="form-control-label">Video</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="video" name="video" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="file-input" class="form-control-label">Audio</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="file" id="audio" name="audio" class="form-control-file imagesize m-b-10" />
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="idtema" name="idtema" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button onclick="acaoTemas('1', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
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
                  <th>imagem</th>
                  <th width="50%">texto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_tema, titulo, texto, imagem
                  FROM pe_temas 
                  WHERE 1
                  ORDER BY id_tema DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_tema = $row["id_tema"];
                    $titulo = $row["titulo"];
                    $texto = $row["texto"];
                    $imagem = $row["imagem"];
                ?>
                <tr class="tr-shadow">
                  <td><?=$titulo?></td>
                  <td>
                    <img src="img/temas/<?=$imagem?>" alt="" width="150px" />
                  </td>
                  <td><?=$texto?></td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_tema?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoTemas('3', <?=$id_tema?>, '1');">
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
  $sql = "SELECT id_tema, titulo, texto, subtitulo, video
  FROM pe_temas 
  WHERE 1
  ORDER BY id_tema DESC";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_tema = $row["id_tema"];
    $titulo = $row["titulo"];
    $texto = $row["texto"];
    $subtitulo = $row["subtitulo"];
    $video = $row["video"];
?>
<div class="modal fade" id="mediumModal<?=$id_tema?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
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
        <form id="formmodal<?=$id_tema?>" name="formmodal<?=$id_tema?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
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
              <label for="text-input" class="form-control-label">Subtitulo</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="subtitulo" name="subtitulo" class="form-control" value="<?=$subtitulo?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class="form-control-label">Imagem</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="imagem" name="imagem" class="form-control-file imagesize m-b-10" />
              <small class="form-text text-muted">Dimensões: 1280px / 572px</small>
              <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Texto</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea class="peTextAreaEditText" id="textomodal<?=$id_tema?>" name="textomodal<?=$id_tema?>"><?=$texto?></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Video</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="video" name="video" class="form-control" value="<?=$video?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class="form-control-label">Audio</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="audio" name="audio" class="form-control-file imagesize m-b-10" />
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="idtema" name="idtema" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoTemas('2', '<?=$id_tema?>', '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>