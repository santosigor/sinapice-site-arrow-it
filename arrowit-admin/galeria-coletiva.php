<?php include('header.php'); ?>

  <section class="m-b-40 m-t-45">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
					  <h3 class="title-5 m-b-35">Galeria Coletiva</h3>
					  <div class="table-responsive table-responsive-data2">
					    <table class="table table-data2">
					      <thead>
					        <tr>
					          <th>nome</th>
					          <th>e-mail</th>
					          <th>Imagem</th>
					          <th>status</th>
					          <th></th>
					        </tr>
					      </thead>
					      <tbody>
								<?
									$sql = "SELECT id_aluno, nome, cpf, celular
									FROM pe_alunos 
									WHERE 1";
									$rs = mysqli_query($con, $sql); 
									while($row = mysqli_fetch_array($rs)){
										$id_aluno = $row["id_aluno"];
										$nome = $row["nome"];
										$cpf = $row["cpf"];
										$celular = $row["celular"];
								?>
					        <tr class="tr-shadow">
					          <td><?=$nome?></td>
					          <td>
					            <span class="block-email">lori@example.com</span>
					          </td>
					          <td class="desc">TED</td>
					          <td>2018-09-27 02:12</td>
					          <td>
					            <span class="status--denied">Pendente</span>
					          </td>
					          <td>
					            <div class="table-data-feature">
					              <button class="item" data-toggle="tooltip" data-placement="top" title="Enviar e-mail de confirmação">
					                <i class="zmdi zmdi-mail-send"></i>
					              </button>
					              <button class="item" data-toggle="tooltip" data-placement="top" title="Cancelar">
					                <i class="zmdi zmdi-close"></i>
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

<?php include('footer.php'); ?>