<?php 
  include("ait_classes.php");

  $objait = new Ait_class();

  if(@$_POST["acao"]==1){
    @$nome = $_POST["nome"];
    @$id_perfil = $_POST["id_perfil"];
    @$usuario = $_POST["usuario"];
    @$senha = $_POST["senha"];

    $objait->registerUsuario("", $nome, $id_perfil, $usuario, $senha);

    header('Location: ait_usuarios.php');
  }else if(@$_POST["acao"]==2){
    @$id_user = $_POST["idusuario"];
    @$nome = $_POST["nome"];
    @$id_perfil = $_POST["id_perfil"];
    @$usuario = $_POST["usuario"];
    @$senha = $_POST["senha"];

    $objait->registerUsuario($id_user, $nome, $id_perfil, $usuario, $senha);

  }else if(@$_POST["acao"]==3){

    $idusuario = $_POST["idusuario"];

    $objait->deleteUsuario($idusuario);
  }

  include('header.php'); 
?>

<section class="m-t-45 m-b-40">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="pe-box">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Novo Usuário</h3>
            <form id="form" name="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Nome</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="nome" name="nome" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Perfil</label>
                </div>
                <div class="col-12 col-md-9">
                  <select name="id_perfil" id="id_perfil" class="form-control">
                      <option value="0">Selecione o perfil</option>
                      <option value="1">Administrador</option>
                      <option value="2">Editor</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Usuário</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="text" id="usuario" name="usuario" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Senha</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="password" id="senha" name="senha" class="form-control" />
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="text-input" class="form-control-label">Confirmar Senha</label>
                </div>
                <div class="col-12 col-md-9">
                  <input type="password" id="confirmarsenha" name="confirmarsenha" class="form-control" />
                </div>
              </div>
              <input type="hidden" id="acao" name="acao" value="0">
              <input type="hidden" id="idusuario" name="idusuario" value="0">
              <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-9">
                  <button type="button" onclick="acaoUsuarios('1', '', '1');" class="btn btn-success btn-md"> Cadastrar</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="m-b-40 m-t-45">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Relatório</h3>
          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Usuário</th>
                  <th>Perfil</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?
                  $sql = "SELECT id_usuario, nome, login, id_perfil
                  FROM ait_usuarios 
                  WHERE 1
                  ORDER BY id_usuario DESC";
                  $rs = mysqli_query($con, $sql); 
                  while($row = mysqli_fetch_array($rs)){
                    $id_user = $row["id_usuario"];
                    $nome = $row["nome"];
                    $login = $row["login"];
                    $id_perfil = $row["id_perfil"];

                    if($id_perfil==1){
                      $nomeperfil = "Admin";
                    }else if($id_perfil==2){
                      $nomeperfil = "Editor";
                    }
                ?>
                <tr class="tr-shadow">
                  <td><?=$nome?></td>
                  <td><?=$login?></td>
                  <td><?=$nomeperfil?></td>
                  <td>
                    <div class="table-data-feature">
                      <span class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                        <button data-toggle="modal" data-target="#mediumModal<?=$id_user?>">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </span>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="acaoUsuarios('3', <?=$id_user?>, '1');">
                        <i class="zmdi zmdi-delete"></i>
                      </button>
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
  $sql = "SELECT id_usuario, nome, login, id_perfil
  FROM ait_usuarios 
  WHERE 1
  ORDER BY id_usuario DESC";
  $rs = mysqli_query($con, $sql); 
  while($row = mysqli_fetch_array($rs)){
    $id_user = $row["id_usuario"];
    $nome = $row["nome"];
    $login = $row["login"];
    $id_perfil = $row["id_perfil"];
?>
<div class="modal fade" id="mediumModal<?=$id_user?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Atualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="formmodal<?=$id_user?>" name="form<?=$id_user?>" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
              <div class="col col-md-3">
                <label for="text-input" class="form-control-label">Nome</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="nome" name="nome" class="form-control" value="<?=$nome?>" />
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <label for="text-input" class="form-control-label">Perfil</label>
              </div>
              <div class="col-12 col-md-9">
                <select name="id_perfil" id="id_perfil" class="form-control">
                    <option value="0">Selecione o perfil</option>
                    <option value="1" <?if($id_perfil==1){?>selected<?}?>>Administrador</option>
                    <option value="2" <?if($id_perfil==2){?>selected<?}?>>Editor</option>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <label for="text-input" class="form-control-label">Usuário</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="usuario" name="usuario" class="form-control" value="<?=$login?>" />
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <label for="text-input" class="form-control-label">Senha</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="password" id="senha" name="senha" class="form-control"/>
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <label for="text-input" class="form-control-label">Confirmar Senha</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="password" id="confirmarsenha" name="confirmarsenha" class="form-control" />
              </div>
          </div>
          <input type="hidden" id="acao" name="acao" value="0">
          <input type="hidden" id="idusuario" name="idusuario" value="0">
          <div class="row form-group">
            <div class="col col-md-3"></div>
            <div class="col-12 col-md-9">
              <button type="button" onclick="acaoUsuarios('2', <?=$id_user?>, '2');" class="btn btn-primary">Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?}?>

<?php include('footer.php'); ?>