<?php 
  include("ait_classes.php");

	$objait = new Ait_class();

	if(@$_POST["acao"]==1){
		@$titulo = $_POST["titulo"];
		@$setor = $_POST["setor"];
		@$tempo_processo = $_POST["tempo_processo"];
		@$ambiente = $_POST["ambiente"];
		@$desafios = $_POST["desafios"];
		@$solucao = $_POST["solucao"];
		@$resultados = $_POST["resultados"];

    $nomeimagem = "";
    if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
    
        $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imagem' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );

        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/projetos/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomeimagem = $novoNome;
        }
    }
    include("config.php");

    $sql = "SELECT id_servico
    FROM ait_servicos 
    WHERE 1
    ORDER BY id_servico DESC";
    $rs = mysqli_query($con, $sql); 
    while($row = mysqli_fetch_array($rs)){
      $id_servico = $row["id_servico"];

      if(isset($_POST['servico'.$id_servico])){
        $sqlverifica = "SELECT 1
        FROM ait_projeto_servicos 
        WHERE id_projeto = 0 AND id_servico = $id_servico";
        $rsverifica = mysqli_query($con, $sqlverifica); 
        if(mysqli_num_rows($rsverifica)==0){
          $insert = "INSERT INTO ait_projeto_servicos (id, id_projeto, id_servico) VALUES(NULL, '0', '$id_servico')";
          mysqli_query($con, $insert);
        }
      }
    }
    mysqli_close($con);

		$objait->registerProjetos('', $titulo, $setor, $tempo_processo, $ambiente, $desafios, $solucao, $resultados, $nomeimagem);

    header('Location: ait_projetos.php');
	}else if(@$_POST["acao"]==2){
		@$id_projeto = $_POST["idprojeto"];
		@$titulo = $_POST["titulo"];
		@$setor = $_POST["setor"];
		@$tempo_processo = $_POST["tempo_processo"];
		@$ambiente = $_POST["ambiente"];
		@$desafios = $_POST["desafios".$id_projeto];
		@$solucao = $_POST["solucao".$id_projeto];
		@$resultados = $_POST["resultados".$id_projeto];

    $nomeimagem = "";
    if($_FILES[ 'imagem' ][ 'name' ]!=""){
      if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
        $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
        $nome = $_FILES[ 'imagem' ][ 'name' ];
    
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );
        
        $novoNome = uniqid ( time () ).'.'.$extensao;
        $destino = 'img/projetos/'.$novoNome;
        
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            $nomeimagem = $novoNome;
        }
      }
    }
    include("config.php");

    $sql = "SELECT id_servico
    FROM ait_servicos 
    WHERE 1
    ORDER BY id_servico DESC";
    $rs = mysqli_query($con, $sql); 
    while($row = mysqli_fetch_array($rs)){
      $id_servico = $row["id_servico"];

      if(isset($_POST['servico'.$id_servico])){
        $sqlverifica = "SELECT 1
        FROM ait_projeto_servicos 
        WHERE id_projeto = $id_projeto AND id_servico = $id_servico";
        $rsverifica = mysqli_query($con, $sqlverifica); 
        if(mysqli_num_rows($rsverifica)==0){
          $insert = "INSERT INTO ait_projeto_servicos (id, id_projeto, id_servico) VALUES(NULL, '$id_projeto', '$id_servico')";
          mysqli_query($con, $insert);
        }
      }else{
        $insert = "DELETE FROM ait_projeto_servicos WHERE id_projeto = $id_projeto AND id_servico = $id_servico";
        mysqli_query($con, $insert); 
      }
    }
    mysqli_close($con);

		$objait->registerProjetos($id_projeto, $titulo, $setor, $tempo_processo, $ambiente, $desafios, $solucao, $resultados, $nomeimagem);

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
                  <label for="file-input" class="form-control-label">Logo</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="file" id="imagem" name="imagem" class="form-control-file imagesize m-b-10" />
                  <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
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
                  <label for="text-input" class="form-control-label">Setor</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="setor" name="setor" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label class=" form-control-label">Serviços</label>
                </div>
                <div class="col col-md-9">
                  <div class="form-check">
                    <?
                      $sqlcheck = "SELECT id_servico, titulo
                      FROM ait_servicos 
                      WHERE 1
                      ORDER BY id_servico DESC";
                      $rscheck = mysqli_query($con, $sqlcheck); 
                      while($rowcheck = mysqli_fetch_array($rscheck)){
                        $id_servico = $rowcheck["id_servico"];
                        $titulocheck = $rowcheck["titulo"];
                    ?>
                      <div class="checkbox">
                          <label for="checkbox1" class="form-check-label ">
                              <input type="checkbox" id="servico<?=$id_servico?>" name="servico<?=$id_servico?>" value="<?=$id_servico?>" class="form-check-input">#arrow.<?=$titulocheck?>
                          </label>
                      </div>
                    <?}?>
                  </div>
                <hr>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Tempo de processo</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="tempo_processo" name="tempo_processo" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Ambiente</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="ambiente" name="ambiente" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Desafios</label>
                </div>
                <div class="col-12 col-md-9">
                  <textarea class="peTextAreaEditText" id="desafios" name="desafios"></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Solução</label>
                </div>
                <div class="col-12 col-md-9">
                  <textarea class="peTextAreaEditText" id="solucao" name="solucao"></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Resultados</label>
                </div>
                <div class="col-12 col-md-9">
                  <textarea class="peTextAreaEditText" id="resultados" name="resultados"></textarea>
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
                  <th>setor</th>
                  <th>logo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_projeto, titulo, setor, imagem
                  FROM ait_projetos 
                  WHERE 1
                  ORDER BY id_projeto DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_projeto = $row["id_projeto"];
                    $titulo = $row["titulo"];
                    $setor = $row["setor"];
                    $imagem = $row["imagem"];
                ?>
                <tr class="tr-shadow">
                  <td><?=$titulo?></td>
                  <td><?=$setor?></td>
                  <td>
                  <?if($imagem!=""){?>
                    <img src="img/projetos/<?=$imagem?>" alt="" width="150px" />
                  <?}?>
                  </td>
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
  $sql = "SELECT id_projeto, titulo, setor, tempo_processo, ambiente, desafios, solucao, resultados
  FROM ait_projetos 
  WHERE 1
  ORDER BY id_projeto DESC";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_projeto = $row["id_projeto"];
    $titulo = $row["titulo"];
    $setor = $row["setor"];
    $tempo_processo = $row["tempo_processo"];
    $ambiente = $row["ambiente"];
    $desafios = $row["desafios"];
    $solucao = $row["solucao"];
    $resultados = $row["resultados"];
?>
<div class="modal fade" id="mediumModal<?=$id_projeto?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Projeto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formmodal<?=$id_projeto?>" name="formmodal<?=$id_projeto?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="file-input" class="form-control-label">Logo</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="file" id="imagem" name="imagem" class="form-control-file imagesize m-b-10" />
              <small class="form-text text-muted">Tamanho máximo: 4mb</small><hr>
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
              <label for="text-input" class="form-control-label">Setor</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="setor" name="setor" class="form-control" value="<?=$setor?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label class=" form-control-label">Serviços</label>
            </div>
            <div class="col col-md-9">
              <div class="form-check">
                <?
                  $sqlcheck = "SELECT id_servico, titulo
                  FROM ait_servicos 
                  WHERE 1
                  ORDER BY id_servico DESC";
                  $rscheck = mysqli_query($con, $sqlcheck); 
                  while($rowcheck = mysqli_fetch_array($rscheck)){
                    $id_servico = $rowcheck["id_servico"];
                    $titulocheck = $rowcheck["titulo"];

                    $namechecked = "";
                    $sqlveri = "SELECT id_servico
                    FROM ait_projeto_servicos 
                    WHERE id_projeto = $id_projeto AND id_servico = $id_servico";
                    $rsveri = mysqli_query($con, $sqlveri); 
                    if($rowveri = mysqli_num_rows($rsveri)>0){
                      $namechecked = "checked";
                    }
                ?>
                  <div class="checkbox">
                      <label for="checkbox1" class="form-check-label ">
                          <input type="checkbox" id="servico<?=$id_servico?>" name="servico<?=$id_servico?>" value="<?=$id_servico?>" class="form-check-input" <?=$namechecked?> >#arrow.<?=$titulocheck?>
                      </label>
                  </div>
                <?}?>
              </div>
            <hr>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Tempo de processo</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="tempo_processo" name="tempo_processo" class="form-control" value="<?=$tempo_processo?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Ambiente</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="ambiente" name="ambiente" class="form-control" value="<?=$ambiente?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Desafios</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea class="peTextAreaEditText" id="desafios<?=$id_projeto?>" name="desafios<?=$id_projeto?>"><?=$desafios?></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Solução</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea class="peTextAreaEditText" id="solucao<?=$id_projeto?>" name="solucao<?=$id_projeto?>"><?=$solucao?></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Resultados</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea class="peTextAreaEditText" id="resultados<?=$id_projeto?>" name="resultados<?=$id_projeto?>"><?=$resultados?></textarea>
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