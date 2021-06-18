<?
	include("pe_classes.php");

	$objpe = new Pe_class();

	if(@$_POST["acao"]==1){
		$id_aluno = $_POST["id_aluno"];

		$objpe->aprovarInscricao($id_aluno);
	}

	if(@$_POST["acao"]==2){
		$id_aluno = $_POST["id_aluno"];

		$objpe->lerexcel();
	}

	include("config.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Título da página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  </head>
  <body>

	<form name="form" id="form" method="post" action="pe_rel_inscricao.php">
  	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">id</th>
	      <th scope="col">Nome</th>
	      <th scope="col">CPF</th>
	      <th scope="col">Celular</th>
	      <th scope="col">Validar</th>
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
	    <tr>
	      <td><?=$id_aluno?></td>
	      <td><?=$nome?></td>
	      <td><?=$cpf?></td>
	      <td><?=$celular?></td>
	      <td>
					<button onclick="aprovarInscricao('<?=$id_aluno?>')" >aprovar</button>
				</td>
	    </tr>
	  <?}?>
	  </tbody>
	</table>

	<input type="hidden" id="acao" name="acao" value="0">
	<input type="hidden" id="id_aluno" name="id_aluno" value="0">
	</form>
					<button onclick="lerexcel()" >ler</button>

	<script src="js/pe_script.js" type="text/javascript" ></script>
	<script src="js/jquery.min.js" type="text/javascript" ></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>