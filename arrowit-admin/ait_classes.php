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

		function enviarEmailCliente($nome, $email, $empresa, $telefone, $cargo, $solucao, $consentimento, $privacidade){

			if (!class_exists('PHPMailer\PHPMailer\PHPMailer')){
				require("php-mailer/src/PHPMailer.php");
			}

			if (!class_exists('PHPMailer\PHPMailer\SMTP')){
				require("php-mailer/src/SMTP.php");
			}

			//Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer\PHPMailer\PHPMailer();

			//Server settings
			// $mail->SMTPDebug = 2;               //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'mrsantoshugo04@gmail.com';                     //SMTP username
			$mail->Password   = 'desix123@@';                               //SMTP password
			$mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->SMTPOptions = array(
					'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
					)
			);

			//Recipients
			$mail->setFrom('mrsantoshugo04@gmail.com', 'Hugo');
			$mail->addAddress($email, $nome);     //Add a recipient
			// $mail->addAddress('ellen@example.com');               //Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'OLÁ '.$nome.' TUDO BEM?';
			$mail->Body    = 'recebemos seus dados';
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();

			$this->enviarEmailArrow($nome, $email, $empresa, $telefone, $cargo, $solucao, $consentimento, $privacidade);
		}

		function enviarEmailArrow($nome, $email, $empresa, $telefone, $cargo, $solucao, $consentimento, $privacidade){

			if (!class_exists('PHPMailer\PHPMailer\PHPMailer')){
				require("php-mailer/src/PHPMailer.php");
			}

			if (!class_exists('PHPMailer\PHPMailer\SMTP')){
				require("php-mailer/src/SMTP.php");
			}

			//Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer\PHPMailer\PHPMailer();

			//Server settings
			// $mail->SMTPDebug = 2;               //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'mrsantoshugo04@gmail.com';                     //SMTP username
			$mail->Password   = 'desix123@@';                               //SMTP password
			$mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->SMTPOptions = array(
					'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
					)
			);

			//Recipients
			$mail->setFrom('mrsantoshugo04@gmail.com', 'Hugo');
			$mail->addAddress('santosigor013@gmail.com', 'igornebiantos');     //Add a recipient
			// $mail->addAddress('ellen@example.com');               //Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'OLÁ '.$nome.' TUDO BEM?';
			$mail->Body    = 'empresa:'.$empresa.' '.$telefone.' '.$cargo.' '.$solucao.' '.$consentimento.' '.$privacidade.' ';
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
		}

		function registerBanner($id_banner, $nomeimagem){

			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_banner = $this->anti_sql_injection($id_banner);
			$nomeimagem = $this->anti_sql_injection($nomeimagem);

			if($id_banner!=""){
				$sqladd = "";
				if($nomeimagem!=""){
					$sql = "SELECT imagem
					FROM ait_blog_banner 
					WHERE id_banner = $id_banner";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagem = $row["imagem"];

					unlink("img/blog_banner/".$imagem);

					$sql = "UPDATE ait_blog_banner SET imagem = '$nomeimagem' WHERE id_banner = $id_banner";
					mysqli_query($con, $sql);
				}
			}else{
				$sql = "INSERT INTO ait_blog_banner(id_banner, imagem, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$nomeimagem', NOW(), '$usernow', '$ipnow')";
				mysqli_query($con, $sql);
			}

			mysqli_close($con);
		}

		function deleteBanner($idbanner){

			include("config.php");

			$sql = "SELECT imagem
			FROM ait_blog_banner 
			WHERE id_banner = $idbanner";
			$rs = mysqli_query($con, $sql); 
			$row = mysqli_fetch_array($rs);
			$imagem = $row["imagem"];

			unlink("img/blog_banner/".$imagem);

			$sql = "DELETE FROM ait_blog_banner WHERE id_banner = $idbanner";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}

		function registerPost($id_post, $titulo, $segmento, $id_categoria, $autor, $cargo_autor, $conteudo, $nomeimagem, $nomefotoautor){
			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_post = $this->anti_sql_injection($id_post);
			$titulo = $this->anti_sql_injection($titulo);
			$segmento = $this->anti_sql_injection($segmento);
			$id_categoria = $this->anti_sql_injection($id_categoria);
			$autor = $this->anti_sql_injection($autor);
			$cargo_autor = $this->anti_sql_injection($cargo_autor);
			$conteudo = $this->anti_sql_injection($conteudo);
			$nomeimagem = $this->anti_sql_injection($nomeimagem);
			$nomefotoautor = $this->anti_sql_injection($nomefotoautor);

			if($id_post!=""){
				$sqladd = "";
				if($nomeimagem!=""){
					$sql = "SELECT imagem
					FROM ait_blog_post 
					WHERE id_post = $id_post";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagem = $row["imagem"];

					unlink("img/blog_post/".$imagem);
					$sqladd = ", imagem = '$nomeimagem'";
				}

				if($nomefotoautor!=""){
					$sql = "SELECT foto_autor
					FROM ait_blog_post 
					WHERE id_post = $id_post";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$foto_autor = $row["foto_autor"];

					unlink("img/blog_post/".$foto_autor);
					$sqladd = ", foto_autor = '$nomefotoautor'";
				}

				$sql = "UPDATE ait_blog_post SET titulo = '$titulo', segmento = '$segmento', id_categoria = '$id_categoria', autor = '$autor', cargo_autor = '$cargo_autor', conteudo = '$conteudo' $sqladd WHERE id_post = $id_post";
				mysqli_query($con, $sql);
			}else{
				$sql = "INSERT INTO ait_blog_post(id_post, titulo, segmento, id_categoria, autor, cargo_autor, conteudo, imagem, foto_autor, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$titulo', '$segmento', '$id_categoria', '$autor', '$cargo_autor', '$conteudo', '$nomeimagem', '$nomefotoautor', NOW(), '$usernow', '$ipnow')";
				mysqli_query($con, $sql);
			}

			mysqli_close($con);
		}

		function deletePost($id_post){

			include("config.php");

			$sql = "SELECT imagem
			FROM ait_blog_post 
			WHERE id_post = $id_post";
			$rs = mysqli_query($con, $sql); 
			while($row = mysqli_fetch_array($rs)){
				$imagem = $row["imagem"];

				unlink("img/blog_post/".$imagem);
			}

			$sql = "DELETE FROM ait_blog_post WHERE id_post = $id_post";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}
	}
?>