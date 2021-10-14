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

function acaoServico(t, id, tipo){
	erro = false;

	if(tipo==1){
		var d = document.getElementById('form');
		var diferenciais = tinyMCE.get('diferenciais').getContent();
		var objetivo = tinyMCE.get('objetivo').getContent();
		var beneficios = tinyMCE.get('beneficios').getContent();

		if(d.imagem.value==''){
			erro = true;
		}
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		var diferenciais = tinyMCE.get('diferenciais'+id).getContent();
		var objetivo = tinyMCE.get('objetivo'+id).getContent();
		var beneficios = tinyMCE.get('beneficios'+id).getContent();
	}

	if(d.titulo.value==''){
		erro = true;
	}

	if(d.descricao.value==''){
		erro = true;
	}

	if(diferenciais==''){
		erro = true;
	}

	if(objetivo==''){
		erro = true;
	}

	if(beneficios==''){
		erro = true;
	}

	if(t==3){
		erro = false;
	}

	if(erro===false){
		alertResult(t);
		d.acao.value = t;
		d.idservico.value = id;
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function acaoProjetos(t, id, tipo){
	erro = false;

	if(tipo==1){
		var d = document.getElementById('form');
		var desafios = tinyMCE.get('desafios').getContent();
		var solucao = tinyMCE.get('solucao').getContent();
		var resultados = tinyMCE.get('resultados').getContent();

		if(d.imagem.value==''){
			erro = true;
		}
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
		var desafios = tinyMCE.get('desafios'+id).getContent();
		var solucao = tinyMCE.get('solucao'+id).getContent();
		var resultados = tinyMCE.get('resultados'+id).getContent();
	}

	if(d.titulo.value==''){
		erro = true;
	}

	if(d.setor.value==''){
		erro = true;
	}

	if(d.tempo_processo.value==''){
		erro = true;
	}

	if(d.ambiente.value==''){
		erro = true;
	}

	if(desafios==''){
		erro = true;
	}

	if(solucao==''){
		erro = true;
	}

	if(resultados==''){
		erro = true;
	}

	if(t==3){
		erro = false;
	}

	if(erro===false){
		alertResult(t);
		d.acao.value = t;
		d.idprojeto.value = id;
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
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

function updateDadosGerais(){
	d = document.form;
	erro = false;

	if(d.endereco.value==''){
		erro = true;
	}

	if(d.telefone.value==''){
		erro = true;
	}

	if(d.celular.value==''){
		erro = true;
	}

	if(d.email.value==''){
		erro = true;
	}

	if(d.facebook.value==''){
		erro = true;
	}

	if(d.instagram.value==''){
		erro = true;
	}

	if(d.linkedin.value==''){
		erro = true;
	}

	if(erro===false){
		alertResult(2);
		d.acao.value = 1;
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
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

	// if(!d.privacidade.checked){
	// 	erro = true;
	// }

	if(erro===false){
		d.acao.value = 1;
		peSetCookie("ait_res", "5", 1);
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function acaoBanner(t, id, tipo){
	erro = false;

	if(tipo==1){
		var d = document.getElementById('form');

		if(d.imagem.value==''){
			erro = true;
		}
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}

	if(d.titulo.value==''){
		erro = true;
	}

	if(t==3){
		erro = false;
	}

	if(erro===false){
		alertResult(t);
		d.acao.value = t;
		d.idbanner.value = id;
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function acaoPost(t, id, tipo){
	erro = false;

	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}

	if(d.titulo.value==''){
		erro = true;
	}

	if(d.segmento.value==''){
		erro = true;
	}

	if(tipo==1){
		if(d.id_categoria.value=='0'){
			erro = true;
		}else if(d.id_categoria.value=='1'){
			if(d.id_autor.value=='0'){
				erro = true;
			}
		}else if(d.id_categoria.value=='2'){
			if(d.id_tipo.value=='0'){
				erro = true;
			}else if(d.id_tipo.value=='1'){
				if(d.video.value==''){
					erro = true;
				}
			}else if(d.id_tipo.value=='2'){
				if(d.linkvideo.value==''){
					erro = true;
				}
			}
		}
	}

	if(t==3){
		erro = false;
	}

	if(erro===false){
		alertResult(t);
		d.acao.value = t;
		d.idpost.value = id;
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
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

function chooseCategoria(tipo, id){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}

	if(tipo==1){
		if(d.id_categoria.value==1){
			document.getElementById("divdestaque").style.display = '';
			document.getElementById("divvideo").style.display = 'none';
			$('.esconde-video').show();
			$('#imagemVideoCapa').show();
		}else if(d.id_categoria.value==2){
			document.getElementById("divvideo").style.display = '';
			document.getElementById("divdestaque").style.display = 'none';
			$('.esconde-video').hide();
			$('#imagemVideoCapa').hide();
		}else{
			document.getElementById("divvideo").style.display = 'none';
			document.getElementById("divdestaque").style.display = 'none';
			$('.esconde-video').show();
			$('#imagemVideoCapa').hide();
		}
	}else{
		if(d.id_categoria.value==1){
			document.getElementById("divdestaque"+id).style.display = '';
			document.getElementById("divvideo"+id).style.display = 'none';
			$('.esconde-video').show();
		}else if(d.id_categoria.value==2){
			document.getElementById("divvideo"+id).style.display = '';
			document.getElementById("divdestaque"+id).style.display = 'none';
			$('.esconde-video').hide();
		}else{
			document.getElementById("divvideo"+id).style.display = 'none';
			document.getElementById("divdestaque"+id).style.display = 'none';
			$('.esconde-video').show();
		}
	}
}

function chooseTipo(tipo, id){
	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}

	if(tipo==1){
		if(d.id_tipo.value==1){
			document.getElementById("divarq").style.display = '';
			document.getElementById("divlink").style.display = 'none';
			$('#imagemVideoCapa').show();
		}else if(d.id_tipo.value==2){
			document.getElementById("divlink").style.display = '';
			document.getElementById("divarq").style.display = 'none';
			$('#imagemVideoCapa').hide();
		}else{
			document.getElementById("divlink").style.display = 'none';
			document.getElementById("divarq").style.display = 'none';
			$('#imagemVideoCapa').show();
		}
	}else{
		if(d.id_tipo.value==1){
			document.getElementById("divarq"+id).style.display = '';
			document.getElementById("divlink"+id).style.display = 'none';
			$('#imagemVideoCapa').show();
		}else if(d.id_tipo.value==2){
			document.getElementById("divlink"+id).style.display = '';
			document.getElementById("divarq"+id).style.display = 'none';
			$('#imagemVideoCapa').hide();
		}else{
			document.getElementById("divlink"+id).style.display = 'none';
			document.getElementById("divarq"+id).style.display = 'none';
			$('#imagemVideoCapa').show();
		}
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
	erro = false;

	if(tipo==1){
		var d = document.getElementById('form');

		if(d.imagem.value==''){
			erro = true;
		}
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}

	if(d.titulo.value==''){
		erro = true;
	}

	if(t==3){
		erro = false;
	}

	if(erro===false){
		alertResult(t);
		d.acao.value = t;
		d.idparceiro.value = id;
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function acaoClientes(t, id, tipo){;
	erro = false;

	if(tipo==1){
		var d = document.getElementById('form');

		if(d.imagem.value==''){
			erro = true;
		}
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}

	if(d.titulo.value==''){
		erro = true;
	}

	if(t==3){
		erro = false;
	}

	if(erro===false){
		alertResult(t);
		d.acao.value = t;
		d.idcliente.value = id;
		d.submit()
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function acaoDepoimentos(t, id, tipo){
	erro = false;

	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}

	if(d.texto.value==''){
		erro = true;
	}

	if(d.cliente.value==''){
		erro = true;
	}

	if(d.cargo.value==''){
		erro = true;
	}

	if(t==3){
		erro = false;
	}

	if(erro===false){
		alertResult(t);
		d.acao.value = t;
		d.iddepoimento.value = id;
		d.submit();
	}else{
		alertify.warning("Preencha todos os campos!");
	}
}

function acaoUsuarios(t, id, tipo){
	erro = false;

	if(tipo==1){
		var d = document.getElementById('form');
	}else if(tipo==2){
		var d = document.getElementById('formmodal'+id);
	}

	if(d.nome.value==''){
		erro = true;
	}

	if(d.id_perfil.value=='0'){
		erro = true;
	}

	if(d.usuario.value==''){
		erro = true;
	}

	if(t==1){
		if(d.senha.value==''){
			erro = true;
		}else	if(d.confirmarsenha.value==''){
			erro = true;
		}else	if(d.senha.value!=d.confirmarsenha.value){
			alertify.warning("As senhas não conferem!");
			return;
		}
	}

	if(t==3){
		erro = false;
	}

	if(erro===false){
		alertResult(t);
		d.acao.value = t;
		d.idusuario.value = id;
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
		alertify.success('Cadastrado com sucesso!');
	}else if(cookie==2){
		alertify.message('Atualizado com sucesso!');
	}else if(cookie==3){
		alertify.error('Excluído com sucesso!');
	}else if(cookie==4){
		alertify.error('Usuário e senha inválido!');
	}else if(cookie==5){
		alertify.success('E-mail enviado com sucesso!');
	}
	peSetCookie("ait_res", "", -1);
}

function alertResult(tipo){
	peSetCookie("ait_res", tipo, 1);
}