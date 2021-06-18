<?php 
  include("pe_classes.php");

	$objpe = new Pe_class();

	if(@$_POST["acao"]==1){

		@$titulo = $_POST["titulo"];
		@$descricao = $_POST["descricao"];
		@$datade = $_POST["datade"];
		@$dataate = $_POST["dataate"];
		@$valor = $_POST["valor"];
		@$valor_matricula = $_POST["valor_matricula"];
		@$parcelas = $_POST["parcelas"];
		@$vagas = $_POST["vagas"];

		$objpe->registerCursos('', $titulo, $descricao, $datade, $dataate, $valor, $valor_matricula, $parcelas, $vagas);

    @$_POST["acao"] = 0;
	}else if(@$_POST["acao"]==2){
    include("config.php");

		@$id_curso = $_POST["idcurso"];
		@$titulo = $_POST["titulo"];
		@$descricao = $_POST["descricao"];
		@$datade = $_POST["datade"];
		@$dataate = $_POST["dataate"];
		@$valor = $_POST["valor"];
		@$valor_matricula = $_POST["valor_matricula"];
		@$parcelas = $_POST["parcelas"];
		@$vagas = $_POST["vagas"];

    $sql = "SELECT id_exercicio
    FROM pe_exercicios 
    WHERE 1
    ORDER BY id_exercicio DESC";
    $rs = mysqli_query($con, $sql); 
    while($row = mysqli_fetch_array($rs)){
      $id_exercicio = $row["id_exercicio"];

      if(isset($_POST['exercicio'.$id_exercicio])){
        $sqlverifica = "SELECT 1
        FROM pe_curso_exercicios 
        WHERE id_curso = $id_curso AND id_exercicio = $id_exercicio";
        $rsverifica = mysqli_query($con, $sqlverifica); 
        if(mysqli_num_rows($rsverifica)==0){
          $insert = "INSERT INTO pe_curso_exercicios (id, id_curso, id_exercicio) VALUES(NULL, '$id_curso', '$id_exercicio')";
          mysqli_query($con, $insert);
        }
      }else{
        $insert = "DELETE FROM pe_curso_exercicios WHERE id_curso = $id_curso AND id_exercicio = $id_exercicio";
        mysqli_query($con, $insert); 
      }
    }

    $sql = "SELECT id_tema
    FROM pe_temas
    WHERE 1
    ORDER BY id_tema DESC";
    $rs = mysqli_query($con, $sql); 
    while($row = mysqli_fetch_array($rs)){
      $id_tema = $row["id_tema"];

      if(isset($_POST['tema'.$id_tema])){
        $sqlverifica = "SELECT 1
        FROM pe_curso_temas 
        WHERE id_curso = $id_curso AND id_tema = $id_tema";
        $rsverifica = mysqli_query($con, $sqlverifica); 
        if(mysqli_num_rows($rsverifica)==0){
          $insert = "INSERT INTO pe_curso_temas (id, id_curso, id_tema) VALUES(NULL, '$id_curso', '$id_tema')";
          mysqli_query($con, $insert);
        }
      }else{
        $insert = "DELETE FROM pe_curso_temas WHERE id_curso = $id_curso AND id_tema = $id_tema";
        mysqli_query($con, $insert); 
      }
    }

		$objpe->registerCursos($id_curso, $titulo, $descricao, $datade, $dataate, $valor, $valor_matricula, $parcelas, $vagas);

  }else if(@$_POST["acao"]==3){

    $id_curso = $_POST["idcurso"];

		$objpe->deleteCursos($id_curso);
  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Novo Curso</h3>
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
                  <label for="text-input" class="form-control-label">Descrição</label>
                </div>
                <div class="col-12 col-md-9">
                  <textarea  id="descricao" name="descricao" class="form-control" style="resize: none;height: 150px;"></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Duração</label>
                </div>
                <div class="col-12 col-md-9">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" id="datade" name="datade" placeholder="Inicio" class="form-control" onkeyup="mascaraTexto(event,'99/99/9999');" onkeypress="BloquearLetras(event)" maxlength="10" />
                    </div>
                    <div class="col-md-6">
                      <input type="text" id="dataate" name="dataate" placeholder="Termino" class="form-control" onkeyup="mascaraTexto(event,'99/99/9999');" onkeypress="BloquearLetras(event)" maxlength="10" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Valor Total <small>(R$)</small></label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="valor" name="valor" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Matricula</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="valor_matricula" name="valor_matricula" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Parcela</label>
                </div>
                <div class="col-12 col-md-9">
                  <select name="parcelas" id="parcelas" class="form-control">
                      <option value="0">Selecione a parcela</option>
                      <option value="1">1X</option>
                      <option value="2">2X</option>
                      <option value="3">3X</option>
                      <option value="4">4X</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Vagas</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="vagas" name="vagas" class="form-control" />
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="idcurso" name="idcurso" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button onclick="acaoCursos('1', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
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
                  <th width="50%">titulo</th>
                  <th>Inicio</th>
                  <th>Termino</th>
                  <th>Valor</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_curso, titulo, descricao, datade, dataate, valor, matricula, parcelas, vagas
                  FROM pe_cursos 
                  WHERE 1
                  ORDER BY id_curso DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_curso = $row["id_curso"];
                    $titulo = $row["titulo"];

                    if($row["datade"]!="0000-00-00"){
                      $datade = $row["datade"];
                    }else{
                      $datade = "";
                    }

                    if($row["dataate"]!="0000-00-00"){
                      $dataate = $row["dataate"];
                    }else{
                      $dataate = "";
                    }

                    $valor = $row["valor"];

                    if($datade!=""){
                      $d = explode("-", $datade);
                      $datade = $d[2]."/".$d[1]."/".$d[0];
                    }
                
                    if($dataate!=""){
                      $d = explode("-", $dataate);
                      $dataate = $d[2]."/".$d[1]."/".$d[0];
                    }
                ?>
                <tr class="tr-shadow">
                  <td><?=$titulo?></td>
                  <td><?=$datade?></td>
                  <td><?=$dataate?></td>
                  <td><?=$valor?></td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_curso?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoCursos('3', <?=$id_curso?>, '1');">
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
  $sql = "SELECT id_curso, titulo, descricao, datade, dataate, valor, matricula, parcelas, vagas
  FROM pe_cursos 
  WHERE 1
  ORDER BY id_curso DESC";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_curso = $row["id_curso"];
    $titulo = $row["titulo"];
    $descricao = $row["descricao"];
    $datade = $row["datade"];
    $dataate = $row["dataate"];
    $valor = $row["valor"];
    $valor_matricula = $row["matricula"];
    $parcelas = $row["parcelas"];
    $vagas = $row["vagas"];

    if($datade!=""){
      $d = explode("-", $datade);
      $datade = $d[2]."/".$d[1]."/".$d[0];
    }

    if($dataate!=""){
      $d = explode("-", $dataate);
      $dataate = $d[2]."/".$d[1]."/".$d[0];
    }
?>
<div class="modal fade" id="mediumModal<?=$id_curso?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
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
        <form id="formmodal<?=$id_curso?>" name="formmodal<?=$id_curso?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
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
              <label for="text-input" class="form-control-label">Descrição</label>
            </div>
            <div class="col-12 col-md-9">
              <textarea  id="descricao" name="descricao" class="form-control" style="resize: none;height: 150px;"><?=$descricao?></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Duração</label>
            </div>
            <div class="col-12 col-md-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" id="datade" name="datade" placeholder="Inicio" class="form-control" onkeyup="mascaraTexto(event,'99/99/9999');" onkeypress="BloquearLetras(event)" maxlength="10" value="<?=$datade?>" />
                </div>
                <div class="col-md-6">
                  <input type="text" id="dataate" name="dataate" placeholder="Termino" class="form-control" onkeyup="mascaraTexto(event,'99/99/9999');" onkeypress="BloquearLetras(event)" maxlength="10" value="<?=$dataate?>" />
                </div>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Valor</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="valor" name="valor" class="form-control" value="<?=$valor?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Matricula</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="valor_matricula" name="valor_matricula" class="form-control" value="<?=$valor_matricula?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Parcela</label>
            </div>
            <div class="col-12 col-md-9">
              <select name="parcelas" id="parcelas" class="form-control">
                  <option value="0">Selecione a parcela</option>
                  <option value="1" <?if($parcelas==1){?>selected<?}?> >1X</option>
                  <option value="2" <?if($parcelas==2){?>selected<?}?> >2X</option>
                  <option value="3" <?if($parcelas==3){?>selected<?}?> >3X</option>
                  <option value="4" <?if($parcelas==4){?>selected<?}?> >4X</option>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label for="text-input" class="form-control-label">Vagas</label>
            </div>
            <div class="col-12 col-md-9">
              <input type="text" id="vagas" name="vagas" class="form-control" value="<?=$vagas?>" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label class=" form-control-label">Exercícios</label>
            </div>
            <div class="col col-md-9">
              <div class="form-check">
                <?
                  $sqlcheck = "SELECT id_exercicio, titulo
                  FROM pe_exercicios 
                  WHERE 1";
                  $rscheck = mysqli_query($con, $sqlcheck); 
                  while($rowcheck = mysqli_fetch_array($rscheck)){
                    $id_exercicio = $rowcheck["id_exercicio"];
                    $titulocheck = $rowcheck["titulo"];

                    $namechecked = "";
                    $sqlveri = "SELECT id_exercicio
                    FROM pe_curso_exercicios 
                    WHERE id_curso = $id_curso AND id_exercicio = $id_exercicio";
                    $rsveri = mysqli_query($con, $sqlveri); 
                    if($rowveri = mysqli_num_rows($rsveri)>0){
                      $namechecked = "checked";
                    }
                ?>
                  <div class="checkbox">
                      <label for="checkbox1" class="form-check-label ">
                          <input type="checkbox" id="exercicio<?=$id_exercicio?>" name="exercicio<?=$id_exercicio?>" value="<?=$id_exercicio?>" class="form-check-input" <?=$namechecked?>><?=$titulocheck?>
                      </label>
                  </div>
                <?}?>
              </div>
             <hr>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <label class=" form-control-label">Temas</label>
            </div>
            <div class="col col-md-9">
              <div class="form-check">
                <?
                  $sqltema = "SELECT id_tema, titulo
                  FROM pe_temas 
                  WHERE 1";
                  $rstema = mysqli_query($con, $sqltema); 
                  while($rowtema = mysqli_fetch_array($rstema)){
                    $id_tema = $rowtema["id_tema"];
                    $titulotema = $rowtema["titulo"];

                    $namechecked = "";
                    $sqlveri = "SELECT id_tema
                    FROM pe_curso_temas
                    WHERE id_curso = $id_curso AND id_tema = $id_tema";
                    $rsveri = mysqli_query($con, $sqlveri); 
                    if(mysqli_num_rows($rsveri)>0){
                      $namechecked = "checked";
                    }
                ?>
                  <div class="checkbox">
                      <label for="checkbox1" class="form-check-label ">
                          <input type="checkbox" id="tema<?=$id_tema?>" name="tema<?=$id_tema?>" value="<?=$id_tema?>" class="form-check-input" <?=$namechecked?>><?=$titulotema?>
                      </label>
                  </div>
                <?}?>
              </div>
              <hr>
            </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="idcurso" name="idcurso" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoCursos('2', '<?=$id_curso?>', '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>