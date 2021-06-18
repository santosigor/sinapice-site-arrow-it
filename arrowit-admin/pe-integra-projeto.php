<?php 
  include("pe_classes.php");

	$objpe = new Pe_class();

	if(@$_POST["acao"]==1){
		@$id_projeto = $_POST["id_projeto"];
		@$titulo = $_POST["titulo"];
		@$data = $_POST["data"];
		@$legenda = $_POST["legenda"];
		@$texto = $_POST["texto"];

    $nomeimagem = "";
    if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
    
        $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imagem' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = uniqid ( time () ).'.'.$extensao;
            $destino = 'img/integra/'.$novoNome;
            
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                $nomeimagem = $novoNome;
            }
        }
    }

		$objpe->registerIntegraProjeto('', $id_projeto, $titulo, $data, $legenda, $texto, $nomeimagem);

    @$_POST["acao"] = 0;
	}else if(@$_POST["acao"]==2){
		@$id_integra = $_POST["idintegra"];
		@$id_projeto = $_POST["id_projeto"];
		@$titulo = $_POST["titulo"];
		@$data = $_POST["data"];
		@$legenda = $_POST["legenda"];
		@$texto = $_POST["textomodal".$id_integra];

    $nomeimagem = "";
    if($_FILES[ 'imagem' ][ 'name' ]!=""){
      if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
      
        $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imagem' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/integra/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomeimagem = $novoNome;
        }
      }
    }

		$objpe->registerIntegraProjeto($id_integra, $id_projeto, $titulo, $data, $legenda, $texto, $nomeimagem);

  }else if(@$_POST["acao"]==3){

    $id_integra = $_POST["idintegra"];

		$objpe->deleteIntegra($id_integra);
  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
          <h3 class="title-5 m-b-35">Nova Integra</h3>
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row">
                <div class="col-lg-12">
                  <div class="row form-group">
                    <div class="col col-md-3">
                      <label for="text-input" class="form-control-label">Projeto</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <select name="id_projeto" id="id_projeto" class="form-control">
                          <option value="0">Selecione o projeto</option>
                          <?
                            $sqlprojeto = "SELECT id_projeto, titulo
                            FROM pe_projetos 
                            WHERE 1
                            ORDER BY titulo ASC";
                            $rsprojeto = mysqli_query($con, $sqlprojeto); 
                            while($rowprojeto = mysqli_fetch_array($rsprojeto)){
                              $id_projeto = $rowprojeto["id_projeto"];
                              $nomeprojeto = $rowprojeto["titulo"];
                          ?>
                          <option value="<?=$id_projeto?>"><?=$nomeprojeto?></option>
                          <?}?>
                      </select>
                    </div>
                  </div>
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
                      <label for="text-input" class="form-control-label">Data</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="data" name="data" class="form-control" />
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
                      <label for="text-input" class="form-control-label">Legenda</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="legenda" name="legenda" class="form-control" />
                    </div>
                  </div>
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
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="idintegra" name="idintegra" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button onclick="acaoIntegraProjeto('1', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
                </div>
              </div>
            </form>
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
                  <th>projeto</th>
                  <th>titulo</th>
                  <th>data</th>
                  <th>imagem</th>
                  <th>legenda</th>
                  <th>texto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT b.titulo as nomeproj, a.id_integra, a.titulo, a.data, a.imagem, a.legenda, a.texto
                  FROM pe_integra a
                  LEFT JOIN pe_projetos b on a.id_projeto = b.id_projeto
                  WHERE 1
                  ORDER BY a.id_integra DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $nomeproj = $row["nomeproj"];
                    $id_integra = $row["id_integra"];
                    $titulo = $row["titulo"];
                    $data = $row["data"];
                    $imagem = $row["imagem"];
                    $legenda = $row["legenda"];
                    $texto = $row["texto"];
                ?>
                <tr class="tr-shadow">
                  <td><?=$nomeproj?></td>
                  <td><?=$titulo?></td>
                  <td><?=$data?></td>
                  <td>
                    <img src="img/integra/<?=$imagem?>" alt="<?=$legenda?>" width="150px" />
                  </td>
                  <td><?=$legenda?></td>
                  <td><?=$texto?></td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_integra?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoIntegraProjeto('3', <?=$id_integra?>, '1');">
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
  $sql = "SELECT id_integra, titulo, data, imagem, legenda, texto, id_projeto
  FROM pe_integra 
  WHERE 1";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_integra = $row["id_integra"];
    $titulo = $row["titulo"];
    $data = $row["data"];
    $imagem = $row["imagem"];
    $legenda = $row["legenda"];
    $texto = $row["texto"];
    $idproj = $row["id_projeto"];
?>
<div class="modal fade" id="mediumModal<?=$id_integra?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
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
        <form id="formmodal<?=$id_integra?>" name="formmodal<?=$id_integra?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Projeto</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="id_projeto" id="id_projeto" class="form-control">
                  <option value="0">Selecione o projeto</option>
                  <?
                    $sqlprojeto = "SELECT id_projeto, titulo
                    FROM pe_projetos 
                    WHERE 1
                    ORDER BY titulo ASC";
                    $rsprojeto = mysqli_query($con, $sqlprojeto); 
                    while($rowprojeto = mysqli_fetch_array($rsprojeto)){
                      $id_projeto = $rowprojeto["id_projeto"];
                      $nomeprojeto = $rowprojeto["titulo"];
                  ?>
                  <option value="<?=$id_projeto?>" <?if($id_projeto==$idproj){?>selected<?}?>><?=$nomeprojeto?></option>
                  <?}?>
              </select>
            </div>
          </div>
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
              <label for="text-input" class="form-control-label">Data</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="data" name="data" class="form-control" value="<?=$data?>" />
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
              <label for="text-input" class="form-control-label">Legenda</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="legenda" name="legenda" class="form-control" value="<?=$legenda?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Texto</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea class="peTextAreaEditText" id="textomodal<?=$id_integra?>" name="textomodal<?=$id_integra?>"><?=$texto?></textarea>
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="idintegra" name="idintegra" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoIntegraProjeto('2', <?=$id_integra?>, '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>