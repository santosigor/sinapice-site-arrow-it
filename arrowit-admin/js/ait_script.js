// Geral
function irPara(tp, pag){
	if(tp==1){
		location.href = pag;
	}else if(tp==2){
		window.open(pag);
	}
}

function VerificaCpf() {
	d=document.form;

	cpf = d.cpf.value;
	cpf=cpf.replace("-", "");
	cpf=cpf.replace(".", "");
	cpf=cpf.replace(".", "");

	if(cpf!=""){
	if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
		$(document).ready(function() {
			$(document).ready(function() {
				alert("CPF inválido!");
				return false;
		});
		return false;
	});
	d.cpf.value='';return false;}
	add = 0;
	for (i=0; i < 9; i ++)
	add += parseInt(cpf.charAt(i)) * (10 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
	rev = 0;
	if (rev != parseInt(cpf.charAt(9)))
	{
	d.cpf.value='';
	$(document).ready(function() {
			alert("CPF inválido!");
			return false;
	});
	return false;
	}
	add = 0;
	for (i = 0; i < 10; i ++)
	add += parseInt(cpf.charAt(i)) * (11 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
	rev = 0;
	if (rev != parseInt(cpf.charAt(10)))
	{
	d.cpf.value='';
	$(document).ready(function() {
			alert("CPF inválido!");
			return false;
	});
	return false;
	}
	return true;
	}
}

function VerificaEmail(){
	d = document.form;
	campo = d.email.value;

	if((campo.indexOf(".")==-1 || campo.indexOf("@")==-1) && campo != ""){
		$(document).ready(function() {
				alert("Email inválido!");
				return false;
		});
		d.email.value = '';
	}
}

/* PE Login(index) */

function Logar(){
		d = document.form;
		d.submit();
}

function getCookie(cname) {
	 var name = cname + "=";
	 var decodedCookie = decodeURIComponent(document.cookie);
	 var ca = decodedCookie.split(';');
	 for(var i = 0; i <ca.length; i++) {
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

function lerexcel(){
	d = document.form;
	d.acao.value = 2;
	d.submit();
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

if(getCookie("ait_res")==1){
  alert("Usuário e senha inválido!");
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