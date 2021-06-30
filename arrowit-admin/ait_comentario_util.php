<?php

  include('config.php');

  $tipo = $_POST["tipo"];
  $id_post = $_POST["id_post"];
  $ipnow = $_SERVER["REMOTE_ADDR"];

  if(@$_POST["tipo"]==1){
    $update = "INSERT INTO ait_conteudo_util (id_conteudo, id_post, tipo, ip_cadastro, data_cadastro) VALUES (NULL, '$id_post', '1', '$ipnow', NOW())";
    mysqli_query($con, $update);
  }else if(@$_POST["tipo"]==2){
    $comentario = $_POST["comentario"];

    $update = "INSERT INTO ait_conteudo_util (id_conteudo, id_post, tipo, comentario, ip_cadastro, data_cadastro) VALUES (NULL, '$id_post', '2', '$comentario', '$ipnow', NOW())";
    mysqli_query($con, $update);
  }
?>