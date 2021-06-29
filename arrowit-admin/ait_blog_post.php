<?php 
  include("ait_classes.php");

	$objait = new Ait_class();

	if(@$_POST["acao"]==1){
		@$titulo = $_POST["titulo"];
		@$segmento = $_POST["segmento"];
		@$id_categoria = $_POST["id_categoria"];
		@$autor = $_POST["autor"];
		@$cargo_autor = $_POST["cargo_autor"];
		@$conteudo = $_POST["conteudo"];

    $nomeimagem = "";
    if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
    
        $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imagem' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/blog_post/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomeimagem = $novoNome;
        }
    }

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

		$objait->registerPost("", $titulo, $segmento, $id_categoria, $autor, $cargo_autor, $conteudo, $nomeimagem, $nomefotoautor);

    header('Location: ait_blog_post.php');
	}else if(@$_POST["acao"]==2){
    @$id_post = $_POST["idpost"];
		@$titulo = $_POST["titulo"];
		@$segmento = $_POST["segmento"];
		@$id_categoria = $_POST["id_categoria"];
		@$autor = $_POST["autor"];
		@$cargo_autor = $_POST["cargo_autor"];
		@$conteudo = $_POST["conteudo".$id_post];

    $nomeimagem = "";
    if($_FILES[ 'imagem' ][ 'name' ]!=""){
      if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
        $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imagem' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );
        
        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/blog_post/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomeimagem = $novoNome;
        }
      }
    }

    $nomefotoautor = "";
    if($_FILES[ 'foto_autor' ][ 'name' ]!=""){
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
    }

    $objait->registerPost($id_post, $titulo, $segmento, $id_categoria, $autor, $cargo_autor, $conteudo, $nomeimagem, $nomefotoautor);

  }else if(@$_POST["acao"]==3){

    $idpost = $_POST["idpost"];

		$objait->deletePost($idpost);
  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Novo Post</h3>
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
                  <label for="text-input" class="form-control-label">Segmento</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="segmento" name="segmento" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Categoria</label>
                </div>
                <div class="col-12 col-md-9">
                  <select name="id_categoria" id="id_categoria" class="form-control" onchange="chooseCategoria()">
                      <option value="0">Selecione a categoria</option>
                      <option value="1">Artigo</option>
                      <option value="2">Video</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="file-input" class="form-control-label">Imagem</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="file" id="imagem" name="imagem" class="form-control-file imagesize m-b-10" />
                  <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
                </div>
              </div>
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
                  <label for="text-input" class="form-control-label">Cargo autor</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="cargo_autor" name="cargo_autor" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="file-input" class="form-control-label">Foto autor</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="file" id="foto_autor" name="foto_autor" class="form-control-file imagesize m-b-10" />
                  <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Conteúdo</label>
                </div>
                <div class="col-12 col-md-9">
                  <textarea class="peTextAreaEditText" id="conteudo" name="conteudo"></textarea>
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="idpost" name="idpost" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button type="button" onclick="acaoPost('1', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
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
                  <th>categoria</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_post, titulo, id_categoria
                  FROM ait_blog_post 
                  WHERE 1
                  ORDER BY id_post DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_post = $row["id_post"];
                    $titulo = $row["titulo"];
                    $id_categoria = $row["id_categoria"];

                    if($id_categoria==1){
                      $nomecategoria = "Artigo";
                    }else if($id_categoria==2){
                      $nomecategoria = "Video";
                    }
                ?>
                <tr class="tr-shadow">
                  <td><?=$titulo?></td>
                  <td><?=$nomecategoria?></td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_post?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoPost('3', <?=$id_post?>, '1');">
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
  $sql = "SELECT id_post, titulo, segmento, id_categoria, autor, cargo_autor, conteudo
  FROM ait_blog_post 
  WHERE 1
  ORDER BY id_post DESC";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_post = $row["id_post"];
    $titulo = $row["titulo"];
    $segmento = $row["segmento"];
    $id_categoria = $row["id_categoria"];
    $autor = $row["autor"];
    $cargo_autor = $row["cargo_autor"];
    $conteudo = $row["conteudo"];
?>
<div class="modal fade" id="mediumModal<?=$id_post?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="formmodal<?=$id_post?>" name="form<?=$id_post?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
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
              <label for="text-input" class="form-control-label">Segmento</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="segmento" name="segmento" class="form-control" value="<?=$segmento?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Categoria</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="id_categoria" id="id_categoria" class="form-control">
                  <option value="0">Selecione a categoria</option>
                  <option value="1" <?if($id_categoria==1){?>selected<?}?>>Artigo</option>
                  <option value="2" <?if($id_categoria==2){?>selected<?}?>>Video</option>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class="form-control-label">Imagem</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="imagem" name="imagem" class="form-control-file imagesize m-b-10" />
              <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Autor</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="autor" name="autor" class="form-control" value="<?=$autor?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Cargo autor</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="cargo_autor" name="cargo_autor" class="form-control" value="<?=$cargo_autor?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class="form-control-label">Foto autor</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="foto_autor" name="foto_autor" class="form-control-file imagesize m-b-10" />
              <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Conteúdo</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea class="peTextAreaEditText" id="conteudo<?=$id_post?>" name="conteudo<?=$id_post?>"><?=$conteudo?></textarea>
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="idpost" name="idpost" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoPost('2', <?=$id_post?>, '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>