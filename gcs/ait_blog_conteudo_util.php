<?php 
  include('header.php'); 
?>

<section class="m-b-40 m-t-45">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Conteúdo útil</h3>
          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>Post</th>
                  <th>Segmento</th>
                  <th>Útil</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_post, titulo, segmento
                  FROM ait_blog_post 
                  WHERE id_post IN (SELECT id_post FROM ait_conteudo_util)
                  ORDER BY id_post DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_post = $row["id_post"];
                    $titulo = $row["titulo"];
                    $segmento = $row["segmento"];

                    $sqlutil = "SELECT 1
                    FROM ait_conteudo_util 
                    WHERE id_post = $id_post AND tipo = 1";
                    $rsutil = mysqli_query($con, $sqlutil);
                    $countsim = mysqli_num_rows($rsutil);

                    $sqlutil = "SELECT 1
                    FROM ait_conteudo_util 
                    WHERE id_post = $id_post AND tipo = 2";
                    $rsutil = mysqli_query($con, $sqlutil);
                    $countnao = mysqli_num_rows($rsutil);
                ?>
                  <tr class="tr-shadow">
                    <td><?=$titulo?></td>
                    <td><?=$segmento?></td>
                    <td>Sim (<?=$countsim?>)</td>
                    <td>
                      <div class="table-data-feature" style="-webkit-box-pack: start;-webkit-justify-content: start;-moz-box-pack: start;-ms-flex-pack: start;justify-content: start;">
                        
                      <span style="padding: 4px 20px 4px 0;">Não (<?=$countnao?>)</span> 
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Ver comentários">
                          <button data-toggle="modal" data-target="#mediumModalUtil<?=$id_post?>">
                            <i class="zmdi zmdi-link"></i>
                          </button>
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr class="spacer"></tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>



<?
  $sql = "SELECT id_post
  FROM ait_blog_post 
  WHERE id_post IN (SELECT id_post FROM ait_conteudo_util WHERE tipo = 2)";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_post = $row["id_post"];
?>
<div class="modal fade" id="mediumModalUtil<?=$id_post?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Comentários - Titulo do post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive table-responsive-data2">
          <table class="table table-data2">
            <thead>
              <tr>
                <th>Data</th>
                <th>Comentário</th>
              </tr>
            </thead>
            <tbody>
              <?
                $sql = "SELECT id_post, comentario, DATE_FORMAT(data_cadastro, '%Y-%m-%d') as datacad
                FROM ait_conteudo_util 
                WHERE tipo = 2 AND id_post = $id_post";
                $rs = mysqli_query($con, $sql); 
                while($row = mysqli_fetch_array($rs)){
                  $id_post = $row["id_post"];
                  $comentario = $row["comentario"];
                  $data_cadastro = $row["datacad"];

                  $d = explode("-", $data_cadastro);
                  $data_cadastro = $d[2]."/".$d[1]."/".$d[0];
              ?>
                <tr class="tr-shadow">
                  <td><?=$data_cadastro?></td>
                  <td><?=$comentario?></td>
                </tr>
                <tr class="spacer"></tr>
              <?}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>