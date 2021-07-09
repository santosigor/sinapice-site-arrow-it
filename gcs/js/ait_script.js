/* Login(index) */
function loginIn(){
	d = document.form;
	erro = false;

	if(d.usuario.value==''){
		erro = true;
	}
	
	if(d.password.value==''){
		erro = true;
	}

	if(erro===false){
		d.acao.value = 1;
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function irPara(tp, pag){
	if(tp==1){
		location.href = pag;
	}else if(tp==2){
		window.open(pag);
	}
}

/* General	*/
$('.imagesize').change(function(){
	const file = $(this)[0].files[0]
	if(file.size>4000000){
		$('.imagesize').val('');
	  alertify.warning("O tamanho do arquivo excede 4mb!");
	}
});

$('.videosize').change(function(){
	const file = $(this)[0].files[0]
	if(file.size>10000000){
		$('.videosize').val('');
	  alertify.warning("O tamanho do arquivo excede 10mb!");
	}
});

function cadastroSubmit(){
	d = document.form;
	erro = false;

	if(d.legenda.value==''){
		erro = true;
	}

	if(d.imagembanner.value==''){
		erro = true;
	}

	if(erro===false){
		d.acao.value = 1;
		peSetCookie("ait_res", "2", 1);
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function acaoServico(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.idservico.value = id;
	d.submit();
}

function acaoProjetos(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.idprojeto.value = id;
	d.submit();
}

function mascaraTexto(evento, mascara){   
  var campo, valor, i, tam, caracter;   
    
  if (document.all) // Internet Explorer   
    campo = evento.srcElement;   
  else // Nestcape, Mozzila   
     campo= evento.target;   
      
  valor = campo.value;   
  tam = valor.length;   
    
  for(i=0;i<mascara.length;i++){   
    caracter = mascara.charAt(i);   
    if(caracter!="9")    
      if(i<tam & caracter!=valor.charAt(i))   
        campo.value = valor.substring(0,i) + caracter + valor.substring(i,tam);   
          
  }     
}

function BloquearLetras(e){  
  if(window.e){
  var tecla = window.e.keyCode;
    if (!((tecla>=48 && tecla<=57) || (tecla==8) || (tecla==0))) {
      window.e.keyCode=0;
    }
  }else{
    var tecla = e.which
    var ctrl=e.ctrlKey;
    if (!((tecla>=48 && tecla<=57) || (tecla==8) || (tecla==0) || (ctrl && tecla==118) || (ctrl && tecla==99)))
    {
      e.preventDefault();
    }
  }
}

function acaoCursos(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.idcurso.value = id;
	d.submit();
}

function acaoFormPag(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.idforma.value = id;
	d.submit();
}

function acaoExercicios(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.idexercicio.value = id;
	d.submit();
}

function updateDadosGerais(){
	d = document.form;
	peSetCookie("ait_res", "3", 1);
	d.acao.value = 1;
	d.submit();
}

function BuscaCpf(){
	d = document.form;

	if(d.cpf.value.length==14){
		$.ajax({
			type: 'POST',
			url: 'pe_ajax.php',
			data: {buscarCPF: "1", cpf:d.cpf.value},
			success: function(response) {
				if(response!=""){
					var teste = response.split('|');

					$("#name").val(teste[0]);
					$("#email").val(teste[1]);
					$("#cel").val(teste[2]);
					$("#nascimento").val(teste[3]);
					$("#cidade").val(teste[4]);
					$("#estado").val(teste[5]);
					$("#experiencia").val(teste[6]);

					if(teste[7]==1){
						var $radios = $('input:radio[name=terapia]');
						$radios.filter('[value=1]').prop('checked', true);
					}else if(teste[7]==2){
						var $radios = $('input:radio[name=terapia]');
						$radios.filter('[value=2]').prop('checked', true);
					}else{
						var $radios = $('input:radio[name=terapia]');
						$radios.filter('[value=1]').prop('checked', false);
						$radios.filter('[value=2]').prop('checked', false);
          }
					
					if(teste[8]==1){
						var $radios = $('input:radio[name=terapeuta]');
						$radios.filter('[value=1]').prop('checked', true);
					}else if(teste[8]==2){
						var $radios = $('input:radio[name=terapeuta]');
						$radios.filter('[value=2]').prop('checked', true);
					}else{
						var $radios = $('input:radio[name=terapeuta]');
						$radios.filter('[value=1]').prop('checked', false);
						$radios.filter('[value=2]').prop('checked', false);
          }
					
					if(teste[9]==1){
						var $radios = $('input:radio[name=medicamento]');
						$radios.filter('[value=1]').prop('checked', true);
					}else if(teste[9]==2){
						var $radios = $('input:radio[name=medicamento]');
						$radios.filter('[value=2]').prop('checked', true);
					}else{
						var $radios = $('input:radio[name=medicamento]');
						$radios.filter('[value=1]').prop('checked', false);
						$radios.filter('[value=2]').prop('checked', false);
          }

					$("#qualmedicamento").val(teste[10]);
					$("#autoconhecimento").val(teste[11]);
					$("#rg").val(teste[12]);
					$("#aluno_existente").val(teste[13]);
				}
			}
		});
	}
}

function FazerInscricao(){
  d = document.form;

	if($("#pagamento-1").hasClass("active")){
		forma_pagamento = 1;
	}else if($("#pagamento-2").hasClass("active")){
		forma_pagamento = 2;
	}
  
  $.ajax({
    type: "POST",
    url: "pe_ajax.php",
    data: { finalizarInscricao: "1", cpf: d.cpf.value, rg: d.rg.value, name: d.name.value, 
      nascimento: d.nascimento.value, cel: d.cel.value, email: d.email.value, 
      cidade: d.cidade.value, estado: d.estado.value, experiencia: d.experiencia.value, 
      terapia: d.terapia.value, terapeuta: d.terapeuta.value, medicamento: d.medicamento.value, 
      qualmedicamento: d.qualmedicamento.value, autoconhecimento: d.autoconhecimento.value, 
      aluno_existente: d.aluno_existente.value, forma_pagamento: forma_pagamento, id_curso: d.id_curso.value},
    success: function (response){
      if(response==1){
        $("#cpf").val("");
        $("#name").val("");
        $("#email").val("");
        $("#cel").val("");
        $("#nascimento").val("");
        $("#cidade").val("");
        $("#estado").val("");
        $("#experiencia").val("");
        var $radios = $('input:radio[name=terapia]');
        $radios.filter('[value=1]').prop('checked', false);
        $radios.filter('[value=2]').prop('checked', false);

        var $radios = $('input:radio[name=terapeuta]');
        $radios.filter('[value=1]').prop('checked', false);
        $radios.filter('[value=2]').prop('checked', false);

        var $radios = $('input:radio[name=medicamento]');
        $radios.filter('[value=1]').prop('checked', false);
        $radios.filter('[value=2]').prop('checked', false);

        $("#qualmedicamento").val("");
        $("#autoconhecimento").val("");
        $("#rg").val("");
        $("#aluno_existente").val("0 ");
        $("#modalInscricao").fadeIn("fast").addClass("active");
      }else{
        alert("erro");
      }
    }
  });
}

function acaoTemas(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}
	d.acao.value = t;
	d.idtema.value = id;
	d.submit();
}

function enviarExercicio(){
	d = document.form;
	d.acao.value = 1;
	d.submit();
}

function aceitarAcordo(){
  d = document.form;
	
	if(!document.getElementById("acordo").checked){
		alert("preencha o check");
		return;
	}

  $.ajax({
    type: "POST",
    url: "pe_ajax.php",
    data: { aceitarAcordo: 1, id_aluno: d.idalunologado.value, acordo: d.acordo.value},
    success: function (response){
      if(response==1){
        $('#modalAcordo').fadeOut('fast').removeClass('active');
				$('html, body').css('overflow','');
      }
    }
  });
}

function enviarOrcamento(){
	d = document.form;
	erro = false;

	if(d.nome.value==''){
		erro = true;
	}

	if(d.email.value==''){
		erro = true;
	}

	if(d.empresa.value==''){
		erro = true;
	}

	if(d.telefone.value==''){
		erro = true;
	}

	if(d.cargo.value==''){
		erro = true;
	}

	if(d.solucao.value==''){
		erro = true;
	}

	if(!d.consentimento.checked){
		erro = true;
	}

	if(!d.privacidade.checked){
		erro = true;
	}

	if(erro===false){
		d.acao.value = 1;
		peSetCookie("ait_res", "5", 1);
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function acaoBanner(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		if(d.imagem.value==''){
			erro = true;
		}
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}	
	erro = false;

	if(erro===false){
		if(tipo==1){
			peSetCookie("ait_res", "2", 1);
		}else if(tipo==2){
			peSetCookie("ait_res", "3", 1);
		}	
		d.acao.value = t;
		d.idbanner.value = id;
		d.submit();
	}else{
		alertify.warning("Selecione a imagem Desktop!");
	}
}

function acaoPost(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.idpost.value = id;
	d.submit();
}

function updatePassword(){
	d = document.form;
	erro = false;

	if(d.senha.value==''){
		erro = true;
	}else	if(d.confirmarsenha.value==''){
		erro = true;
	}else	if(d.senha.value!=d.confirmarsenha.value){
		alertify.warning("As senhas não conferem!");
		return;
	}

	if(erro===false){
		d.acao.value = 1;
		peSetCookie("ait_res", "3", 1);
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function chooseCategoria(){
	d = document.form;

	if(d.id_categoria.value==1){
		document.getElementById("divdestaque").style.display = '';
		document.getElementById("divvideo").style.display = 'none';
		$('.esconde-video').show();
	}else if(d.id_categoria.value==2){
		document.getElementById("divvideo").style.display = '';
		document.getElementById("divdestaque").style.display = 'none';
		$('.esconde-video').hide();
	}else{
		document.getElementById("divvideo").style.display = 'none';
		document.getElementById("divdestaque").style.display = 'none';
		$('.esconde-video').show();
	}
}

function chooseTipo(){
	d = document.form;

	if(d.id_tipo.value==1){
		document.getElementById("divarq").style.display = '';
		document.getElementById("divlink").style.display = 'none';
	}else if(d.id_tipo.value==2){
		document.getElementById("divlink").style.display = '';
		document.getElementById("divarq").style.display = 'none';
	}else{
		document.getElementById("divlink").style.display = 'none';
		document.getElementById("divarq").style.display = 'none';
	}
}

function chooseTipoModal(id){
	var d = document.getElementById('formmodal'+id);

	if(d.id_tipo.value==1){
		document.getElementById("divarqmodal").style.display = '';
		document.getElementById("divlinkmodal").style.display = 'none';
	}else if(d.id_tipo.value==2){
		document.getElementById("divlinkmodal").style.display = '';
		document.getElementById("divarqmodal").style.display = 'none';
	}else{
		document.getElementById("divlinkmodal").style.display = 'none';
		document.getElementById("divarqmodal").style.display = 'none';
	}
}

function registerAutor(){
	d = document.form;

	if(d.id_autor.value==999){
		document.getElementById("divautor").style.display = '';
	}else{
		document.getElementById("divautor").style.display = 'none';
	}
}

function acaoParceiros(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.idparceiro.value = id;
	d.submit();
}

function acaoClientes(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.idcliente.value = id;
	d.submit();
}

function acaoDepoimentos(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
		peSetCookie("ait_res", "2", 1);
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		peSetCookie("ait_res", "3", 1);
	}
	d.acao.value = t;
	d.iddepoimento.value = id;
	d.submit();
}




//COOKIES
var domain = window.location.hostname;

function peSetCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";domain=;" + domain + ";" + expires + ";path=/";
}

function peGetCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

if(peGetCookie("ait_res")){
	var cookie = peGetCookie("ait_res");

	if(cookie==1){
		alertify.error('Usuário e senha inválido!');
	}else if(cookie==2){
		alertify.success('Cadastrado com sucesso!');
	}else if(cookie==3){
		alertify.message('Atualizado com sucesso!');
	}else if(cookie==4){
		alertify.error('Excluído com sucesso!');
	}else if(cookie==5){
		alertify.success('E-mail enviado com sucesso!');
	}
	peSetCookie("ait_res", "", -1);
}