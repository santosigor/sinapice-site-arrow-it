<?
	include("pe_classes.php");

	$objpe = new Pe_class();

	if(@$_POST["acao"]==1){
		$cpf = $_POST["cpf"];
		$nome = $_POST["nome"];
		$idade = $_POST["idade"];
		$celular = $_POST["celular"];
		$email = $_POST["email"];
		$cidade = $_POST["cidade"];
		$estado = $_POST["estado"];
		$obs_experiencia = $_POST["obs_experiencia"];
		$terapia = $_POST["terapia"];
		$terapia_curso = $_POST["terapia_curso"];
		$medicamento = $_POST["medicamento"];
		$obs_medicamento = $_POST["obs_medicamento"];
		$obs_curso = $_POST["obs_curso"];
		$aluno_existente = $_POST["aluno_existente"];

		$objpe->fazerInscricao($cpf, $nome, $idade, $celular, $email, $cidade, $estado, $obs_experiencia, $terapia, $terapia_curso, $medicamento, $obs_medicamento, $obs_curso);
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Título da página</title>
  </head> 
  <body>
	<form name="form" id="form" method="post" action="pe_inscricao.php">
		<input type="text" id="cpf" name="cpf" placeholder="cpf" maxlength="11" onblur="VerificaCpf();BuscaCpf();"><br/>
		<input type="text" id="nome" name="nome" placeholder="nome"><br/>
		<input type="text" id="idade" name="idade" placeholder="idade"><br/>
		<input type="text" id="celular" name="celular" placeholder="celular"><br/>
		<input type="text" id="email" name="email" placeholder="email" onblur="VerificaEmail(this.value);"><br/>
		<input type="text" id="cidade" name="cidade" placeholder="cidade"><br/>
		<input type="text" id="estado" name="estado" placeholder="estado"><br/>
		<input type="text" id="obs_experiencia" name="obs_experiencia" placeholder="obs_experiencia"><br/>

		<input type="radio" id="terapia" name="terapia" value="1"><br/>
		<input type="radio" id="terapia" name="terapia" value="2"><br/>

		<input type="radio" id="terapia_curso" name="terapia_curso" value="1"><br/>
		<input type="radio" id="terapia_curso" name="terapia_curso" value="2"><br/>

		<input type="radio" id="medicamento" name="medicamento" value="1"><br/>
		<input type="radio" id="medicamento" name="medicamento" value="2"><br/>

		<input type="text" id="obs_medicamento" name="obs_medicamento" placeholder="obs_medicamento"><br/>

		<input type="text" id="obs_curso" name="obs_curso" placeholder="obs_curso"><br/>

		<button onclick="javascript:FazerInscricao();" >cadastrar</button>

		<input type="hidden" id="acao" name="acao" value="0">
		<input type="hidden" id="aluno_existente" name="aluno_existente" value="0">
	</form>

	<script src="js/pe_script.js" type="text/javascript"></script>
	<script src="js/jquery.min.js" type="text/javascript" ></script>
  </body>
</html>