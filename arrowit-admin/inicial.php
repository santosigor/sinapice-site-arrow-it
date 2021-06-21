<?php 
  include("ait_classes.php");

	$objait = new Ait_class();

	if(@$_POST["acao"]==1){

    $id_aluno = $_POST["idaluno"];
    $id_curso = $_POST["idcurso"];

		$objait->confirmarAluno($id_aluno, $id_curso);
  }

  include('header.php'); 
?>

<form id="form" name="form" action="" method="post" enctype="multipart/form-data">
  <section class="m-b-40 m-t-45">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
					  <h3 class="title-5 m-b-35">Inscrições <strong>Curso X-123456</strong></h3>
					  <div class="table-responsive table-responsive-data2">
					    <table class="table table-data2">
					      <thead>
					        <tr>
					          <th>nome</th>
					          <th>e-mail</th>
					          <th>pagamento</th>
					          <th>data</th>
					          <th>status</th>
					          <th></th>
					        </tr>
					      </thead>
					      <tbody>
								<?
							

								?>
					        <tr class="tr-shadow">
					          <td><?=$nome?></td>
					          <td>
					            <span class="block-email">lori@example.com</span>
					          </td>
					          <td class="desc">TED</td>
					          <td>2018-09-27 02:12</td>
					          <td>
					            <span class="<?=$nameclass?>"><?=$namestatus?></span>
					          </td>
					          <td>
					            <div class="table-data-feature">
					              <button onclick="confirmarAluno('<?=$id_aluno?>','<?=$id_curso?>');" class="item" data-toggle="tooltip" data-placement="top" title="Enviar e-mail de confirmação">
					                <i class="zmdi zmdi-mail-send"></i>
					              </button>
					              <button class="item" data-toggle="tooltip" data-placement="top" title="Cancelar">
					                <i class="zmdi zmdi-close"></i>
					              </button>
					            </div>
					          </td>
					        </tr>
					        <tr class="spacer"></tr>
					      </tbody>
					    </table>
					  </div>
					</div>
					<input type="hidden" id="acao" name="acao" value="0">
					<input type="hidden" id="idaluno" name="idaluno" value="0">
					<input type="hidden" id="idcurso" name="idcurso" value="0">

        </div>
      </div>
    </div>
  </section>
</form>
<?php include('footer.php'); ?>