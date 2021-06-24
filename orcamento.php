<?php 
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
<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>ARROWIT</title>

     <link href="./dist/images/" rel="icon" sizes="16x16" type="image/png">

    <!-- share -->
    <meta property="og:title" content="Arrow IT" />
    <meta property="og:description" content="O seu objetivo é o nosso caminho" />
    <meta property="og:url" content="https://www.arrowit.com.br/" />
    <meta property="og:image" content="https://www.arrowit.com.br/dist/images/ait-image-compartilhar.jpg" />

    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./dist/css/ait.min.css">

  </head>
  <body>

    <div class="ait-loading">
      <div class="ait-loading__container">
        <div class="ait-loading__porcentagem">100</div>
        <div class="ait-loading__logo"></div>
        <div class="ait-loading__barra"></div>
      </div>
    </div>

    <header class="ait-structure__header"></header>

    <section class="ait-content__orcamento">
      <div class="ait-container">
        <div class="ait-utilities__text-align__center ait-utilities__pdd__30-0">
          <div class="ait-typography__h1">Orçamento</div>
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

    <footer class="ait-structure__footer"></footer>

    <!-- jquery e plugins -->
    <script src="./dist/js/jquery.min.js"></script>

     <!-- header e footer estatico -->
     <script>
      $('.ait-structure__header').load('header.html');
      $('.ait-structure__footer').load('footer.html');
    </script>
    
    <!-- AIT JS -->    
    <script src="./dist/js/ait.min.js"></script>
    <script src="arrowit-admin/js/ait_script.js"></script>

  </body>
</html>
