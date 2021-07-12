<?

	include('config.php'); 
	
	session_start();
	
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

					if($imagem!=""){
						unlink("img/servicos/".$imagem);
					}
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

					if($imagem!=""){
						unlink("img/projetos/".$imagem);
					}
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
			$mail->Username   = 'santosigor013@gmail.com';                     //SMTP username
			$mail->Password   = 'Fsw18@gmail';                               //SMTP password
			// $mail->Username   = 'site@arrowit.com.br';                     //SMTP username
			// $mail->Password   = '$1T3@$3rv1c0$@rr0wIT9';                               //SMTP password
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
			$mail->setFrom('santosigor013@gmail.com', 'Igor');
			$mail->addAddress('santosigor013@gmail.com', 'Igor');
			$mail->addAddress('hugonex2000@gmail.com', 'Hugo');
			// $mail->addAddress('ola@sinapice.com.br', 'Sinapice');
			// $mail->addAddress($email, $nome);     //Add a recipient


			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = utf8_decode('[Site Arrow IT] Orçamento');

			$html = '<!DOCTYPE html><html lang="pt-br"><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="x-apple-disable-message-reformatting" /><title></title><style>html,body{margin:0 auto !important;padding:0 !important;height:100% !important;width:100% !important}*{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}table,td{mso-table-lspace:0pt !important;mso-table-rspace:0pt !important}table{border-spacing:0 !important;border-collapse:collapse !important;table-layout:fixed !important;margin:0 auto !important}img{-ms-interpolation-mode:bicubic}a{text-decoration:none}</style><meta name="robots" content="noindex, follow" /></head><body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;font-family: sans-serif;"><table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"><tbody><tr><td><div style="text-align: center;height: 112px;background-image: url(\'https://clientesinapice.com.br/sites/arrow-it/dist/images/email/ait-bg-header.png\');background-position: top center;"> <img src="https://clientesinapice.com.br/sites/arrow-it/dist/images/email/ait-logo-header.png"></div></td></tr></tbody></table><div style="max-width: 800px; margin: 0 auto;"><table align="center" role="presentation" cellspacing="0" cellpadding="30px" border="0" width="100%" style="margin: auto;"><tbody><tr><td valign="middle" style="text-align: center;"><h2 style="font-weight: 700;color: #303bfe;">Olá, '.$nome.'</h2><p style="color: #a9b3bd;"><br><br><b>OBRIGADO PELO SEU CONTATO!</b><br><br>Recebemos a sua mensagem.<br>Em breve um de nossos especialistas retornará a sua mensagem.<br><br>Até logo!</p><br></td></tr></tbody></table> <br><hr style="border: 0; border-top: 1px solid #ddd;"><br><br><table align="center" role="presentation" cellspacing="" cellpadding="30px" border="0" width="100%" style="margin: auto;font-size: .9rem;"><tbody><tr><td valign="middle" style="color: #0d1522;text-align: center;"><table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td> <a href="https://www.arrowit.com.br/" target="_blank"> <img src="https://clientesinapice.com.br/sites/arrow-it/dist/images/email/ait-logo.png"> </a></td></tr><tr><td valign="middle"> <br><h3 style="font-weight: 600;background-image: url(\'https://clientesinapice.com.br/sites/arrow-it/dist/images/email/ait-icon-pin.png\');background-position: center left;background-repeat: no-repeat;padding-left: 30px;display: inline-block;">Av. Trindade, 254 <strong style="font-weight: 400;">- Sala 1208 Bethaville I - Barueri - SP</strong></h3></td></tr><tr><td valign="middle"><h3 style="font-weight: 600;background-image: url(\'https://clientesinapice.com.br/sites/arrow-it/dist/images/email/ait-icon-email.png\');background-position: center left;background-repeat: no-repeat;padding-left: 30px;display: inline-block;">contato<strong style="font-weight: 400;">&#64;arrowit&#46;com&#46;br</strong></h3></td></tr><tr><td valign="middle"><h3 style="font-weight: 600;background-image: url(\'https://clientesinapice.com.br/sites/arrow-it/dist/images/email/ait-icon-phone.png\');background-position: center left;background-repeat: no-repeat;padding-left: 30px;display: inline-block;">(11) 2321-0031</h3></td></tr></tbody></table></td></tr></tbody></table> <br><br></div></body></html>';

			$html = utf8_decode($html);

			$mail->Body = $html;

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
			$mail->Username   = 'santosigor013@gmail.com';                     //SMTP username
			$mail->Password   = 'Fsw18@gmail';                               //SMTP password
			// $mail->Username   = 'site@arrowit.com.br';                     //SMTP username
			// $mail->Password   = '$1T3@$3rv1c0$@rr0wIT9';                               //SMTP password
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
			$mail->setFrom('santosigor013@gmail.com', 'Igor');
			$mail->addAddress('santosigor013@gmail.com', 'Igor');
			$mail->addAddress('hugonex2000@gmail.com', 'Hugo');
			// $mail->addAddress('ola@sinapice.com.br', 'Sinapice');
			// $mail->addAddress('comercial@arrowit.com.br', 'Comercial ArrowIT');
			
			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = utf8_decode('[Site Arrow IT] Orçamento');

			$html = '<!DOCTYPE html><html lang="pt-br"><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="x-apple-disable-message-reformatting" /><title></title><style>html,body{margin:0 auto !important;padding:0 !important;height:100% !important;width:100% !important}*{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}table,td{mso-table-lspace:0pt !important;mso-table-rspace:0pt !important}table{border-spacing:0 !important;border-collapse:collapse !important;table-layout:fixed !important;margin:0 auto !important}img{-ms-interpolation-mode:bicubic}a{text-decoration:none}</style><meta name="robots" content="noindex, follow" /></head><body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;font-family: sans-serif;"><table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"><tbody><tr><td><div style="text-align: center;height: 112px;background-image: url(\'https://clientesinapice.com.br/sites/arrow-it/dist/images/email/ait-bg-header.png\');background-position: top center;"> <img src="https://clientesinapice.com.br/sites/arrow-it/dist/images/email/ait-logo-header.png"></div></td></tr></tbody></table><div style="max-width: 800px; margin: 0 auto;"><table align="center" role="presentation" cellspacing="0" cellpadding="30px" border="0" width="100%" style="margin: auto;"><tbody><tr><td valign="middle"><h2 style="font-weight: 700;color: #303bfe;">Nome</h2><p style="color: #a9b3bd;">'.$nome.'</p><br><h2 style="font-weight: 700;color: #303bfe;">Empresa</h2><p style="color: #a9b3bd;">'.$empresa.'</p><br><h2 style="font-weight: 700;color: #303bfe;">E-mail (Corporativo)</h2><p style="color: #a9b3bd;">'.$email.'</p><br><h2 style="font-weight: 700;color: #303bfe;">Cargo</h2><p style="color: #a9b3bd;">'.$cargo.'</p><br><h2 style="font-weight: 700;color: #303bfe;">Telefone comercial</h2><p style="color: #a9b3bd;">'.$telefone.'</p><br><h2 style="font-weight: 700;color: #303bfe;">Qual soluçao está buscando</h2><p style="color: #a9b3bd;">'.$solucao.'</p><br></td></tr></tbody></table> <br></div></body></html>';
			
			$html = utf8_decode($html);

			$mail->Body = $html;

			$mail->send();
		}

		function registerBanner($id_banner, $titulo, $destaque, $nomeimagem, $nomeimagemmobile, $nomeimagemtablet){

			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_banner = $this->anti_sql_injection($id_banner);
			$titulo = $this->anti_sql_injection($titulo);
			$destaque = $this->anti_sql_injection($destaque);
			$nomeimagem = $this->anti_sql_injection($nomeimagem);
			$nomeimagemmobile = $this->anti_sql_injection($nomeimagemmobile);
			$nomeimagemtablet = $this->anti_sql_injection($nomeimagemtablet);

			if($id_banner!=""){
				$sqladd = "";
				if($nomeimagem!=""){
					$sql = "SELECT imagem
					FROM ait_home_banner 
					WHERE id_banner = $id_banner";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagem = $row["imagem"];

					if($imagem!=""){
						unlink("img/home_banner/".$imagem);
					}
					$sqladd = ", imagem = '$nomeimagem', data_cadastro = NOW()";
				}
				if($nomeimagemmobile!=""){
					$sql = "SELECT imagemmobile
					FROM ait_home_banner 
					WHERE id_banner = $id_banner";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagemmobile = $row["imagemmobile"];

					if($imagemmobile!=""){
						unlink("img/home_banner/".$imagemmobile);
					}
					$sqladd = ", imagemmobile = '$nomeimagemmobile', data_cadastro = NOW()";
				}
				if($nomeimagemtablet!=""){
					$sql = "SELECT imagemtablet
					FROM ait_home_banner 
					WHERE id_banner = $id_banner";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagemtablet = $row["imagemtablet"];

					if($imagemtablet!=""){
						unlink("img/home_banner/".$imagemtablet);
					}
					$sqladd = ", imagemtablet = '$nomeimagemtablet', data_cadastro = NOW()";
				}

				$sql = "UPDATE ait_home_banner SET titulo = '$titulo', destaque = '$destaque' $sqladd WHERE id_banner = $id_banner";
				mysqli_query($con, $sql);
			}else{
				$sql = "INSERT INTO ait_home_banner(id_banner, titulo, destaque, imagem, imagemmobile, imagemtablet, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$titulo', '$destaque', '$nomeimagem', '$nomeimagemmobile', '$nomeimagemtablet', NOW(), '$usernow', '$ipnow')";
				mysqli_query($con, $sql);
			}

			mysqli_close($con);
		}

		function deleteBanner($idbanner){

			include("config.php");

			$sql = "SELECT imagem
			FROM ait_home_banner 
			WHERE id_banner = $idbanner";
			$rs = mysqli_query($con, $sql); 
			$row = mysqli_fetch_array($rs);
			$imagem = $row["imagem"];

			if($imagem!=""){
				unlink("img/home_banner/".$imagem);
			}

			$sql = "DELETE FROM ait_home_banner WHERE id_banner = $idbanner";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}

		function registerPost($id_post, $titulo, $segmento, $id_categoria, $autor, $cargo_autor, $conteudo, $nomeimagem, $nomefotoautor, $destaque, $linkvideo, $nomevideo, $id_autor){
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
			$destaque = $this->anti_sql_injection($destaque);
			$linkvideo = $this->anti_sql_injection($linkvideo);
			$nomevideo = $this->anti_sql_injection($nomevideo);
			$id_autor = $this->anti_sql_injection($id_autor);

			$sql = "SELECT 1
			FROM ait_blog_post 
			WHERE destaque = 1";
			$rs = mysqli_query($con, $sql); 
			if(mysqli_num_rows($rs)==4){
				$sql = "SELECT id_post
				FROM ait_blog_post 
				WHERE destaque = 1
				ORDER BY data_cadastro ASC";
				$rs = mysqli_query($con, $sql); 
				$row = mysqli_fetch_array($rs);
				$idpost = $row["id_post"];

				$sql = "UPDATE ait_blog_post SET destaque = '0' WHERE id_post = $idpost";
				mysqli_query($con, $sql);
			}

			if($id_autor==999){
				$sql = "SELECT id_autor
				FROM ait_autor 
				WHERE nome = '$autor' AND cargo = '$cargo_autor'";
				$rs = mysqli_query($con, $sql); 
				if(mysqli_num_rows($rs)==0){
					$sql = "INSERT INTO ait_autor(id_autor, nome, cargo, foto, data_cadastro, quem_cadastrou, ip_cadastro) 
					VALUES (NULL, '$autor', '$cargo_autor', '$nomefotoautor', NOW(), '$usernow', '$ipnow')";
					mysqli_query($con, $sql);
				}else{ 
					$row = mysqli_fetch_array($rs);
					$id_autor = $row["id_autor"];
				}
			}

			if($id_post!=""){
				$sqladd = "";
				if($nomeimagem!=""){
					$sql = "SELECT imagem
					FROM ait_blog_post 
					WHERE id_post = $id_post";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagem = $row["imagem"];

					if($imagem!=""){
						unlink("img/blog_post/".$imagem);
					}
					$sqladd = ", imagem = '$nomeimagem'";
				}

				if($nomevideo!=""){
					$sql = "SELECT video
					FROM ait_blog_post 
					WHERE id_post = $id_post";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$video = $row["video"];

					if($video!=""){
						unlink("img/blog_post/".$video);
					}
					$sqladd = ", video = '$nomevideo'";
				}

				$sql = "UPDATE ait_blog_post SET titulo = '$titulo', segmento = '$segmento', id_categoria = '$id_categoria', id_autor = '$id_autor', conteudo = '$conteudo', destaque = '$destaque', linkvideo = '$linkvideo' $sqladd WHERE id_post = $id_post";
				mysqli_query($con, $sql);
			}else{
				$sql = "INSERT INTO ait_blog_post(id_post, titulo, segmento, id_categoria, conteudo, imagem, id_autor, destaque, linkvideo, video, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$titulo', '$segmento', '$id_categoria', '$conteudo', '$nomeimagem', '$id_autor', '$destaque', '$linkvideo', '$nomevideo', NOW(), '$usernow', '$ipnow')";
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

				if($imagem!=""){
					unlink("img/blog_post/".$imagem);
				}
			}

			$sql = "DELETE FROM ait_blog_post WHERE id_post = $id_post";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}

		function updatePassword($senha){

			include("config.php");

			$senha = md5($senha);
			$usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];

			$sql = "UPDATE ait_usuarios SET password = '$senha' WHERE id_usuario = $usernow";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}

		function registerParceiro($id_parceiro, $titulo, $nomeimagem){

			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_parceiro = $this->anti_sql_injection($id_parceiro);
			$titulo = $this->anti_sql_injection($titulo);
			$nomeimagem = $this->anti_sql_injection($nomeimagem);

			if($id_parceiro!=""){
				$sqladd = "";
				if($nomeimagem!=""){
					$sql = "SELECT imagem
					FROM ait_parceiros 
					WHERE id_parceiro = $id_parceiro";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagem = $row["imagem"];

					if($imagem!=""){
						unlink("img/parceiros/".$imagem);
					}
					$sqladd = ", imagem = '$nomeimagem'";
				}

				$sql = "UPDATE ait_parceiros SET titulo = '$titulo' $sqladd WHERE id_parceiro = $id_parceiro";
				mysqli_query($con, $sql);
			}else{
				$sql = "INSERT INTO ait_parceiros(id_parceiro, titulo, imagem, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$titulo', '$nomeimagem', NOW(), '$usernow', '$ipnow')";
				mysqli_query($con, $sql);
			}

			mysqli_close($con);
		}

		function deleteParceiro($idparceiro){

			include("config.php");

			$sql = "DELETE FROM ait_parceiros WHERE id_parceiro = $idparceiro";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}

		function registerCliente($id_cliente, $titulo, $nomeimagem){

			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_cliente = $this->anti_sql_injection($id_cliente);
			$titulo = $this->anti_sql_injection($titulo);
			$nomeimagem = $this->anti_sql_injection($nomeimagem);

			if($id_cliente!=""){
				$sqladd = "";
				if($nomeimagem!=""){
					$sql = "SELECT imagem
					FROM ait_clientes 
					WHERE id_cliente = $id_cliente";
					$rs = mysqli_query($con, $sql); 
					$row = mysqli_fetch_array($rs);
					$imagem = $row["imagem"];

					if($imagem!=""){
						unlink("img/clientes/".$imagem);
					}
					$sqladd = ", imagem = '$nomeimagem'";
				}

				$sql = "UPDATE ait_clientes SET titulo = '$titulo' $sqladd WHERE id_cliente = $id_cliente";
				mysqli_query($con, $sql);
			}else{
				$sql = "INSERT INTO ait_clientes(id_cliente, titulo, imagem, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$titulo', '$nomeimagem', NOW(), '$usernow', '$ipnow')";
				mysqli_query($con, $sql);
			}

			mysqli_close($con);
		}

		function deleteCliente($idcliente){

			include("config.php");

			$sql = "DELETE FROM ait_clientes WHERE id_cliente = $idcliente";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}

		function registerDepoimentos($id_depoimento, $texto, $cliente, $cargo){

			include("config.php");

			// $usernow = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
			// $ipnow = $_SERVER["REMOTE_ADDR"];
			$usernow = 1;
			$ipnow = "123.123.123";

			$id_depoimento = $this->anti_sql_injection($id_depoimento);
			$texto = $this->anti_sql_injection($texto);
			$cliente = $this->anti_sql_injection($cliente);
			$cargo = $this->anti_sql_injection($cargo);

			if($id_depoimento!=""){
				$sql = "UPDATE ait_depoimentos SET texto = '$texto', cliente = '$cliente', cargo = '$cargo' WHERE id_depoimento = $id_depoimento";
				mysqli_query($con, $sql);
			}else{
				$sql = "INSERT INTO ait_depoimentos(id_depoimento, texto, cliente, cargo, data_cadastro, quem_cadastrou, ip_cadastro) 
				VALUES (NULL, '$texto', '$cliente', '$cargo', NOW(), '$usernow', '$ipnow')";
				mysqli_query($con, $sql);
			}

			mysqli_close($con);
		}

		function deleteDepoimentos($iddepoimento){

			include("config.php");

			$sql = "DELETE FROM ait_depoimentos WHERE id_depoimento = $iddepoimento";
			mysqli_query($con, $sql);

			mysqli_close($con);
		}
	}
?>