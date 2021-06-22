<?
	class Ait_class{

		function anti_sql_injection($str) {
			include("config.php");
			if (!is_numeric($str)) {
					$str = stripslashes($str);
					$str = mysqli_real_escape_string($con, $str);
			}
			mysqli_close($con);
			return $str;
		}

		function registerServicos($id_servico, $titulo, $descricao, $diferenciais, $objetivo, $beneficios, $nomeimagem){

			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_servico = $this->anti_sql_injection($id_servico);
			$titulo = $this->anti_sql_injection($titulo);
			$descricao = $this->anti_sql_injection($descricao);
			$diferenciais = $this->anti_sql_injection($diferenciais);
			$objetivo = $this->anti_sql_injection($objetivo);
			$beneficios = $this->anti_sql_injection($beneficios);
			$nomeimagem = $this->anti_sql_injection($nomeimagem);

			if($id_servico!=""){
				$sqladd = "";
				if($nomeimagem!=""){
					$sql = "SELECT imagem
					FROM ait_servicos 
					WHERE id_servico = $id_servico";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagem = $row["imagem"];

					unlink("img/servicos/".$imagem);
					$sqladd = ", imagem = '$nomeimagem'";
				}

				$sql = "UPDATE ait_servicos SET titulo = '$titulo', descricao = '$descricao', diferenciais = '$diferenciais', objetivo = '$objetivo', beneficios = '$beneficios' $sqladd WHERE id_servico = $id_servico";
				mysqli_query($con, $sql);
			}else{
				$sql = "INSERT INTO ait_servicos(id_servico, titulo, descricao, diferenciais, objetivo, beneficios, imagem, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$titulo', '$descricao', '$diferenciais', '$objetivo', '$beneficios', '$nomeimagem', NOW(), '$usernow', '$ipnow')";
				mysqli_query($con, $sql);
			}

			mysqli_close($con);
		}

		function deleteServicos($id_servico){

			include("config.php");

			$sql = "DELETE FROM ait_servicos WHERE id_servico = $id_servico";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}

		function updateDadosGerais($id_dados, $endereco, $telefone, $celular, $email, $facebook, $instagram, $linkedin){

			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_dados = $this->anti_sql_injection($id_dados);
			$endereco = $this->anti_sql_injection($endereco);
			$telefone = $this->anti_sql_injection($telefone);
			$celular = $this->anti_sql_injection($celular);
			$email = $this->anti_sql_injection($email);
			$facebook = $this->anti_sql_injection($facebook);
			$instagram = $this->anti_sql_injection($instagram);
			$linkedin = $this->anti_sql_injection($linkedin);

			$sql = "UPDATE ait_dadosgerais SET endereco = '$endereco', telefone = '$telefone', celular = '$celular', email = '$email', facebook = '$facebook', instagram = '$instagram', linkedin = '$linkedin' WHERE id_dados = $id_dados";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}

		function registerProjetos($id_projeto, $titulo, $setor, $tempo_processo, $ambiente, $desafios, $solucao, $resultados, $nomeimagem){

			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_projeto = $this->anti_sql_injection($id_projeto);
			$titulo = $this->anti_sql_injection($titulo);
			$setor = $this->anti_sql_injection($setor);
			$tempo_processo = $this->anti_sql_injection($tempo_processo);
			$ambiente = $this->anti_sql_injection($ambiente);
			$desafios = $this->anti_sql_injection($desafios);
			$solucao = $this->anti_sql_injection($solucao);
			$resultados = $this->anti_sql_injection($resultados);
			$nomeimagem = $this->anti_sql_injection($nomeimagem);

			if($id_projeto!=""){
				$sqladd = "";
				if($nomeimagem!=""){
					$sql = "SELECT imagem
					FROM ait_projetos 
					WHERE id_projeto = $id_projeto";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagem = $row["imagem"];

					unlink("img/projetos/".$imagem);
					$sqladd = ", imagem = '$nomeimagem'";
				}

				$sql = "UPDATE ait_projetos SET titulo = '$titulo', setor = '$setor', tempo_processo = '$tempo_processo', ambiente = '$ambiente', desafios = '$desafios', solucao = '$solucao', resultados = '$resultados' $sqladd WHERE id_projeto = $id_projeto";
				mysqli_query($con, $sql);
			}else{
				$sql = "INSERT INTO ait_projetos(id_projeto, titulo, setor, tempo_processo, ambiente, desafios, solucao, resultados, imagem, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$titulo', '$setor', '$tempo_processo', '$ambiente', '$desafios', '$solucao', '$resultados', '$nomeimagem', NOW(), '$usernow', '$ipnow')";
				mysqli_query($con, $sql);
				$idprojeto = mysqli_insert_id($con);

				$update = "UPDATE ait_projeto_servicos SET id_projeto = $idprojeto WHERE id_projeto = 0 AND quem_cadastrou = $usernow";
				mysqli_query($con, $update);
			}

			mysqli_close($con);
		}

		function deleteProjetos($id_projeto){

			include("config.php");

			$sql = "DELETE FROM ait_projetos WHERE id_projeto = $id_projeto";
			mysqli_query($con, $sql);

			$sql = "DELETE FROM ait_projeto_servicos WHERE id_projeto = $id_projeto";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}
	}
?>