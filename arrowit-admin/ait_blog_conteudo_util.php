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
                <tr class="tr-shadow">
                  <td>Titulo do póst</td>
                  <td>Segmento</td>
                  <td>Sim (10)</td>
                  <td>
                    <div class="table-data-feature" style="-webkit-box-pack: start;-webkit-justify-content: start;-moz-box-pack: start;-ms-flex-pack: start;justify-content: start;">
                      
                    <span style="padding: 4px 20px 4px 0;">Não (2)</span> 
                    <span class="item" data-toggle="tooltip" data-placement="top" title="Ver comentários">
                        <button data-toggle="modal" data-target="#mediumModalUtil">
                          <i class="zmdi zmdi-link"></i>
                        </button>
                      </span>
                    </div>
                  </td>
                </tr>
                <tr class="spacer"></tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="mediumModalUtil" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
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
              <tr class="tr-shadow">
                <td>12/05/2021</td>
                <td>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </td>
              </tr>
              <tr class="spacer"></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>