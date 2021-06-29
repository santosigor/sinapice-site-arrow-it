<?php 

  include("header.php");

  include("arrowit-admin/ait_classes.php");

	$objait = new Ait_class();

	if(@$_POST["acao"]==1){
		@$nome = $_POST["nome"];
		@$email = $_POST["email"];
		@$empresa = $_POST["empresa"];
		@$telefone = $_POST["telefone"];
		@$cargo = $_POST["cargo"];
		@$solucao = $_POST["solucao"];
		@$consentimento = $_POST["consentimento"];
		@$privacidade = $_POST["privacidade"];

    if($consentimento=='on'){
      $consentimento = 1;
    }else{
      $consentimento = 0;
    }

    if($privacidade=='on'){
      $privacidade = 1;
    }else{
      $privacidade = 0;
    }

		$objait->enviarEmailCliente($nome, $email, $empresa, $telefone, $cargo, $solucao, $consentimento, $privacidade);

    @$_POST["acao"] = 0;
	}
?>

    <section class="ait-content__orcamento">
      <div class="ait-container">
        <div class="ait-utilities__text-align__center ait-utilities__pdd__30-0">
          <div class="ait-typography__h1">Orçamento</div>
          <div class="ait-typography__h5">Conte um pouco sobre sua necessidade para indicarmos a melhor solução</div>
        </div>
        <form id="form" name="form" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="ait-component__form">
                <label>Nome</label>
                <input type="text" id="nome" name="nome">
              </div>
            </div>
            <div class="col-md-6">
              <div class="ait-component__form">
                <label>E-mail (Corporativo)</label>
                <input type="text" id="email" name="email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="ait-component__form">
                <label>Empresa</label>
                <input type="text" id="empresa" name="empresa">
              </div>
            </div>
            <div class="col-md-6">
              <div class="ait-component__form">
                <label>Telefone comercial</label>
                <input type="text" id="telefone" name="telefone">
              </div>
            </div>
            <div class="col-md-6">
              <div class="ait-component__form">
                <label>Cargo</label>
                <input type="text" id="cargo" name="cargo">
              </div>
            </div>
          </div>
          <div class="ait-component__form">
            <label>Qual soluçao está buscando?</label>
            <textarea id="solucao" name="solucao"></textarea>
          </div>
          <div class="ait-component__checkbox">
            <label for="consentimento">
              <input type="checkbox" name="consentimento" id="consentimento">
              <span>&nbsp;</span>
              Li e aceito o <a href="#" target="_blank">termo de ciência e consentimento</a>
            </label>
          </div>
          <div class="ait-component__checkbox">
            <label for="privacidade">
              <input type="checkbox" name="privacidade" id="privacidade">
              <span>&nbsp;</span>
              Li e aceito as <a href="#" target="_blank">políticas de privacidade</a>
            </label>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <div class="ait-utilities__pdd__30-0-50-0">
            <a href="javascript:enviarOrcamento();" class="ait-component__button lg">Enviar</a>
          </div>
        </form>
      </div>
    </section>

<? include("footer.php"); ?>