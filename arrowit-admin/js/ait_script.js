/* PE Login(index) */
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

/* General	*/
$('.imagesize').change(function(){
	const file = $(this)[0].files[0]
	if(file.size>4000000){
		$('.imagesize').val('');
	  alert("O tamanho do arquivo excede 4mb!");
	}
});

function cadastroSubmit(){
	d = document.form;
	erro = false;

	text = "";
	if(d.legenda.value==''){
		erro = true;
		text += "- Legenda \n";
	}

	if(d.imagembanner.value==''){
		erro = true;
		text += "- Imagem \n";
	}

	if(erro===false){
		d.acao.value = 1;
		d.submit();
	}else{
		alert(text);
	}
}

function acaoServico(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}
	d.acao.value = t;
	d.idservico.value = id;
	d.submit();
}

function acaoProjetos(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
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
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}
	d.acao.value = t;
	d.idcurso.value = id;
	d.submit();
}

function acaoFormPag(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}
	d.acao.value = t;
	d.idforma.value = id;
	d.submit();
}

function acaoExercicios(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
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

	text = "preencha os campos abaixo:\n";
	if(d.nome.value==''){
		erro = true;
		text += "- Nome \n";
	}

	if(d.email.value==''){
		erro = true;
		text += "- E-mail \n";
	}

	if(d.empresa.value==''){
		erro = true;
		text += "- Empresa \n";
	}

	if(d.telefone.value==''){
		erro = true;
		text += "- Telefone \n";
	}

	if(d.cargo.value==''){
		erro = true;
		text += "- Cargo \n";
	}

	if(d.solucao.value==''){
		erro = true;
		text += "- Solução \n";
	}

	if(!d.consentimento.checked){
		erro = true;
		text += "- Consentimento \n";
	}

	if(!d.privacidade.checked){
		erro = true;
		text += "- Privacidade \n";
	}

	if(erro===false){
		d.acao.value = 1;
		d.submit();
	}else{
		alert(text);
	}
}

function acaoBanner(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}
	d.acao.value = t;
	d.idbanner.value = id;
	d.submit();
}

function acaoPost(t, id, tipo){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
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
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
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
	}
	peSetCookie("ait_res", "", -1);
}