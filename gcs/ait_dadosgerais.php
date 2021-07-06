<?php 

  include("ait_classes.php");

  $objait = new Ait_class();

  if(@$_POST["acao"]==1){
    @$id_dados = $_POST["id_dados"];
    @$endereco = $_POST["endereco"];
    @$telefone = $_POST["telefone"];
    @$celular = $_POST["celular"];
    @$email = $_POST["email"];
    @$facebook = $_POST["facebook"];
    @$instagram = $_POST["instagram"];
    @$linkedin = $_POST["linkedin"];

    $objait->updateDadosGerais($id_dados, $endereco, $telefone, $celular, $email, $facebook, $instagram, $linkedin);
  }

  $sql = "SELECT id_dados, endereco, telefone, celular, email, facebook, instagram, linkedin
  FROM ait_dadosgerais 
  WHERE id_dados = 1";
  $rs = mysqli_query($con, $sql); 
  $row = mysqli_fetch_array($rs);
  $id_dados = $row["id_dados"];
  $endereco = $row["endereco"];
  $telefone = $row["telefone"];
  $celular = $row["celular"];
  $email = $row["email"];
  $facebook = $row["facebook"];
  $instagram = $row["instagram"];
  $linkedin = $row["linkedin"];

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <h3 class="title-5 m-b-35">Atualizar Dados Gerais</h3>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Endereço</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="endereco" name="endereco" class="form-control" value="<?=$endereco?>" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Telefone</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="telefone" name="telefone" class="form-control" value="<?=$telefone?>" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Celular</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="celular" name="celular" class="form-control" value="<?=$celular?>" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">E-mail</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="email" name="email" class="form-control" value="<?=$email?>" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Facebook</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="facebook" name="facebook" class="form-control" value="<?=$facebook?>" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Instagram</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="instagram" name="instagram" class="form-control" value="<?=$instagram?>" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Linkedin</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="linkedin" name="linkedin" class="form-control" value="<?=$linkedin?>" />
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="id_dados" name="id_dados" value="<?=$id_dados?>">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button onclick="updateDadosGerais();" class="btn btn-primary btn-md">Atualizar</button>
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