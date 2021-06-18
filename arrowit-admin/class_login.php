<?php

	session_start();

	class Login{

		function anti_sql_injection($str) {
			include("config.php");

			if (!is_numeric($str)) {
					$str = stripslashes($str);
					$str = mysqli_real_escape_string($con, $str);
			}
			return $str;
		}

		function efetuarLogin($usuario, $password){

			include("config.php");

			$usuario = $this->anti_sql_injection($usuario);
			$password = $this->anti_sql_injection($password);

			$password = md5($password);

			$sql = "SELECT id_usuario FROM ait_usuarios WHERE login = '$usuario' AND password = '$password'";
			$rs = mysqli_query($con, $sql);
			if(mysqli_num_rows($rs)==1){
				$row = mysqli_fetch_array($rs);
				$id_usuario = $row["id_usuario"];

				$_SESSION["nomesessao"] = "arrowit-admin";		
				$_SESSION["logged_".$_SESSION["nomesessao"]] = 1;
				$_SESSION["id_usuario_".$_SESSION["nomesessao"]] = $id_usuario;
				
				$ip = $_SERVER['REMOTE_ADDR'];

				$user_os = $this->getOS();
				$user_browser = $this->getBrowser();

				$modelo = $user_os." / ".$user_browser;
				
				$sqllog = "INSERT INTO ait_log_acesso(id_log, id_usuario, ip_usuario, modelo, data_login) VALUES (NULL,'$id_usuario','$ip','$modelo', NOW())";
				mysqli_query($con, $sqllog);

				if($_SESSION["logged_".$_SESSION["nomesessao"]]==1){
					Header("Location: inicial.php");
				}
				
				//apagar coockie
				setcookie("ait_res", "", -1);
			}else{
				//criar coockie
				setcookie("ait_res", "1", time() + (86400 * 30));
			}

		}

		function deslogar(){

			include("config.php");
			
			if($_SESSION["logged_".$_SESSION["nomesessao"]] == 1){

				$_SESSION["logged_".$_SESSION["nomesessao"]] = false;
				$id_usuario = $_SESSION["id_usuario_".$_SESSION["nomesessao"]];
				$ip = $_SERVER['REMOTE_ADDR'];

				$user_os = $this->getOS();
				$user_browser = $this->getBrowser();

				$modelo = $user_os." / ".$user_browser;
				
				$sqllog = "INSERT INTO pe_log_acesso(id_log, id_usuario, ip_usuario, modelo, data_login) VALUES (NULL,'$id_usuario','$ip','$modelo', NOW())";
				mysqli_query($con, $sqllog);
					
				session_destroy();
				Header("Location: index.php");
			}
		}

		function deslogarPortal(){

			include("config.php");
			
			if($_SESSION["logged_".$_SESSION["nomesessao"]] == 1){					
				session_destroy();
				Header("Location: index.php");
			}
		}

		function getOS() { 

			$user_agent = $_SERVER['HTTP_USER_AGENT'];

			$os_platform = "Unknown OS Platform";

			$os_array = array(
					'/windows nt 10/i'     =>  'Windows 10',
					'/windows nt 6.3/i'     =>  'Windows 8.1',
					'/windows nt 6.2/i'     =>  'Windows 8',
					'/windows nt 6.1/i'     =>  'Windows 7',
					'/windows nt 6.0/i'     =>  'Windows Vista',
					'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
					'/windows nt 5.1/i'     =>  'Windows XP',
					'/windows xp/i'         =>  'Windows XP',
					'/windows nt 5.0/i'     =>  'Windows 2000',
					'/windows me/i'         =>  'Windows ME',
					'/win98/i'              =>  'Windows 98',
					'/win95/i'              =>  'Windows 95',
					'/win16/i'              =>  'Windows 3.11',
					'/macintosh|mac os x/i' =>  'Mac OS X',
					'/mac_powerpc/i'        =>  'Mac OS 9',
					'/linux/i'              =>  'Linux',
					'/ubuntu/i'             =>  'Ubuntu',
					'/iphone/i'             =>  'iPhone',
					'/ipod/i'               =>  'iPod',
					'/ipad/i'               =>  'iPad',
					'/android/i'            =>  'Android',
					'/blackberry/i'         =>  'BlackBerry',
					'/webos/i'              =>  'Mobile'
			);

			foreach ($os_array as $regex => $value) {
					if (preg_match($regex, $user_agent)) {
							$os_platform    =   $value;
					}
			}   

			return $os_platform;
		}

		function getBrowser() {

			$user_agent = $_SERVER['HTTP_USER_AGENT'];

			$browser = "Unknown Browser";

			$browser_array = array(
					'/msie/i'       =>  'Internet Explorer',
					'/firefox/i'    =>  'Firefox',
					'/safari/i'     =>  'Safari',
					'/chrome/i'     =>  'Chrome',
					'/Edg/i'       =>  'Edge',
					'/opera/i'      =>  'Opera',
					'/netscape/i'   =>  'Netscape',
					'/maxthon/i'    =>  'Maxthon',
					'/konqueror/i'  =>  'Konqueror',
					'/mobile/i'     =>  'Mobile Browser'
			);

			foreach ($browser_array as $regex => $value) { 
					if (preg_match($regex, $user_agent)) {
							$browser    =   $value;
					}
			}

			return $browser;
		}
	}
?>