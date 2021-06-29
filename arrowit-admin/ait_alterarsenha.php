<?php 

  include('header.php');

  include("ait_classes.php");

  $objait = new Ait_class();

  if(@$_POST["acao"]==1){
    @$senha = $_POST["senha"];

    $objait->updatePassword($senha);
  }
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <h3 class="title-5 m-b-35">Atualizar Senha</h3>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Senha</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="senha" name="senha" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Confirmar Senha</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="confirmarsenha" name="confirmarsenha" class="form-control" />
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button type="button" onclick="updatePassword();" class="btn btn-primary btn-md">Atualizar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('footer.php'); ?>