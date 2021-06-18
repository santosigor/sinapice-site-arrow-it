<?
	include("pe_classes.php");

	$objpe = new Pe_class();

	if(@$_POST["acao"]==1){
		$nome = $_POST["nome"];
		$cpf = $_POST["cpf"];
		$email = $_POST["email"];
		$celular = $_POST["celular"];
		$perfil = $_POST["perfil"];
		$usuario = $_POST["usuario"];
		$senha = $_POST["senha"];

		$objpe->cadastrarUsuario($nome, $cpf, $email, $celular, $perfil, $usuario, $senha);
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Título da página</title>
  </head>
  <body>
	<form name="form" id="form" method="post" action="pe-usuario.php">
		<input type="text" id="nome" name="nome" placeholder="nome"><br/>
		<input type="text" id="cpf" name="cpf" placeholder="cpf"><br/>
		<input type="text" id="email" name="email" placeholder="email"><br/>
		<input type="text" id="celular" name="celular" placeholder="celular"><br/>

		<div class="campo-texto">
							
			<label>Perfil</label>
			
			<select name="perfil" id="perfil"  >
				<option selected="selected" value="0">Selecione o perfil</option>
				<option value="1" <?if(@$perfil=="1"){echo"selected='selected'";}?>>ADMINISTRADOR</option>
				<option value="2" <?if(@$perfil=="2"){echo"selected='selected'";}?>>EDITOR</option>
			</select>						
		
		</div>
		
		<br/>

		<input type="text" id="usuario" name="usuario" placeholder="usuario"><br/>
		<input type="text" id="senha" name="senha" placeholder="senha"><br/>

		<button onclick="javascript:cadastrarUsuario();" >cadastrar</button>

		<input type="hidden" id="acao" name="acao">
	</form>
		
	<script src="js/jquery.min.js" type="text/javascript" ></script>
	<script src="js/pe_script.js" type="text/javascript" ></script>
	
  </body>
</html>