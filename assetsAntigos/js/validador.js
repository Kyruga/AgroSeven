
function Validador() {

	//registra variáveis globais;
	var g_Usuario = false;
	var erro = new Erro();

	this.boot = function () {
			this.bootAjustaForms();
			$('#toast').css('visibility', '');
			// this.checaLogin();
			alert('teste');
			this.mostraModal($('#login'));
		// 	//$("link[rel*='icon']").attr("href", "img/tiger.ico");Alterar ícone
	}

	this.bootAjustaForms = function () {
		$('form .mdl-card__supporting-text').find('.material-icons').each(function (idx, de) {
			div = $(de).next();
			input = div.find('input,select,textarea').first();
			$(this).attr('title', input.attr('title'));//icone pega titulo do input
			div.attr('title', input.attr('title'));//div do input pega seu titulo
			$(de).on('click', function () {//Clicar no ícone foca o input
				input.focus();
			});
		});
		//Retira erro dos campos REQUIRED ao carregar
		MaterialTextfield.prototype.checkValidity = function () {
			if (this.input_.validity.valid) this.element_.classList.remove(this.CssClasses_.IS_INVALID);
			else if (this.element_.getElementsByTagName('input')[0].value.length > 0) this.element_.classList.add(this.CssClasses_.IS_INVALID);
		};
		$("form .mdl-textfield__input").blur(function () {
			this.validaInput($(this));//valida input ao sair
			this.formataInput($(this));//formata ao sair
		});
		$("form input,form select,form textarea").change(function () {
			this.validaInput($(this));//Valida input ao alterar
		});
		$("form input,form select,form textarea").on('change textInput input', function () {
			//validaInput($(this));//valida input ao digitar
		});
		$('form input,form select,form textarea').keyup(function (event) {
			this.validaInput($(this));//valida input ao digitar
		});
		$('form input,form select,form textarea, form button').keydown(function (event) {
			//enter atua como TAB e no ultimo clica em OK
			var form = $(this).closest('form');
			if (event.keyCode == 13) {
				event.preventDefault();
				var elementos = form.find('input,select,textarea,button');
				var ultimo = form.find('.ultimo-input');
				var thisIndex = elementos.index($(this));
				var ultimoIndex = elementos.index(ultimo);
				if (event.ctrlKey || event.altKey || thisIndex >= ultimoIndex) {
					var btnok = form.find('button.ok');
					if (btnok.attr('DISABLED')) form.find('.is-invalid').find('input,select,textarea').first().focus();
					else btnok.click();
				} else elementos.eq(thisIndex + 1).focus();
				return false;
				//Tecla ESC para cancelar
			} else if (event.keyCode == 27) {
				event.preventDefault();
				form.find('.cancelar').click();
			} else {
				//Aviso de Caps-lock ligado
				if ($(this).hasClass('avisaCaps') && $(this).attr('type') == 'password' && event.originalEvent.getModifierState && event.originalEvent.getModifierState('CapsLock') && !$('#toast').hasClass('mdl-snackbar--active')) {
					erro.toast("Caps Lock Ligado", 3000, 'keyboard_capslock');
				}
			}
		});
		//habilita botão mostrar senha
		$('form button.mostraSenha').click(function () {
			var icone = $(this).find('.material-icons');
			var campo = $(this).parent().find('input');
			var form = $(this).closest('form');
			var campos = form.find('input.mostraSenha');
			var plural = '';
			if (campos.length > 1) plural = 's';
			if (icone.html() == 'visibility_off') {
				icone.html('visibility');
				icone.attr("title", "Mostrar Senha" + plural);
				campos.each(function () {
					$(this).attr('type', 'password');
				});
			} else {
				icone.html('visibility_off');
				icone.attr("title", "Ocultar Senha" + plural);
				campos.each(function () {
					$(this).attr('type', 'text');
				});
			}
			campo.focus();
		});
		//habilita mostrar força da senha
		$('form input.medeSenha').on('change textInput input', function () {
			var info = $(this).parent().find('.mdl-textfield__info>.info');
			var barra = $(this).parent().find('.mdl-textfield__info>.barra>span');
			var forca = this.medeSenha($(this).val());
			if (forca <= 25) {
				info.html('Muito Fraca(' + forca + '%)');
				barra.css('background', 'red');
			} else if (forca <= 50) {
				info.html('Fraca(' + forca + '%)');
				barra.css('background', 'orange');
			} else if (forca <= 75) {
				info.html('Forte(' + forca + '%)');
				barra.css('background', 'blue');
			} else {
				info.html('Muito forte(' + forca + '%)');
				barra.css('background', 'green');
			}
			barra.css('width', forca + '%');

			//console.log(medeSenha($(this).val()));
			//contaSequencia('a',['itael','06856333650']);
		});
	}

	this.checaLogin = function () {
		$.ajax({
			url: 'ajax.php?tarefa=checaLogin',
			type: 'POST',
			data: $('form#login').serialize(),
			success: function (r) {
				$('#preLoading').css('visibility', 'hidden');
				try {
					js = jQuery.parseJSON(r);
					console.log(js);
					if (js.Resposta == 'LOGAR') {
						this.mostraModal($('#login'));
					}
					else if (js.Resposta == 'SUCESSO') {
						G_Usuario = js.Usuario;
						if (G_Usuario.TipoAcesso == 'Provisoria') this.mostraModal($('#trocarSenha'));
						else {
							$('#corpo').css('visibility', 'visible');
						}
					} else erro.erro('Resposta inesperada', js, r);
				} catch (e) {
					erro.erro('Não é json:', r, e);
				}
			},
			error: function (a, b, c) { erro.erro(a, b, c) }
		});
	}

	this.contaContem = function (str, strCheck) {
		var nCount = 0;
		for (i = 0; i < str.length; i++)if (strCheck.indexOf(str.charAt(i)) > -1) nCount++;
		return nCount;
	}

	this.contaSequencia = function (str, mais) {
		mais = mais ? 'true' : 'false';

		//case insensitive
		str = str.toLowerCase();
		//define sequencias padrão
		var seq = [
			"abcdefghijklmnopqrstuvwxyza",//letras
			"01234567890",//números
			"qwertyuiopq",//1ª linha teclado
			"asdfghjkla",//2ª linha teclado
			"zxcvbnmz",//3ª linha teclado
			"1q2w3e4r5t6y7u8i9o0p1",//1ªcombinação teclado
			"q1w2e3r4t5y6u7i8o9p0q",//2ªcombinação teclado
			"1qaz2wsx3edc4rfv5tgb6yhn7ujm8ik9o0p1",//3ªcombinação teclado
			"zaq1xsw2cde3vfr4bgt5nhy6mju7ki8lo9p0z",//4ªcombinação teclado
		];
		//adiciona sequencias variáveis, tipo nome, cpf, email, data de nascimento...
		if (Array.isArray(mais)) for (i = 0; i <= mais.length - 1; i++)seq.push(mais[i].toLowerCase());//se array concatena
		else if (typeof mais === 'string') seq.push(mais.toLowerCase());//se string adiciona
		//adiciona reverso das sequencias
		var rev = [];
		seq.forEach(function (item, index) {
			rev.push(this.reverso(item));
		});
		seq = seq.concat(rev);
		//percorre str
		var contagem = 0;
		for (j = 0; j < seq.length; j++) {
			var A = seq[j];
			for (i = 0; i < str.length - 1; i++) {
				var achou = A.indexOf(str.charAt(i));
				if (achou > -1 && achou < A.length - 1 && str.charAt(i + 1) === A.charAt(achou + 1)) contagem++;
			}
		}
		if (contagem >= str.length) contagem = str.length - 1;
		return contagem;
	}

	this.medeSenha = function (senha, mais) {
		mais = mais ? 'true' : 'false';

		var score = 0;
		var uppers = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		var lowers = "abcdefghijklmnopqrstuvwxyz";
		var numbers = "0123456789";
		var senhaL = senha.toLowerCase();
		var tamanho = senha.length;
		var maiusculas = this.contaContem(senha, uppers);
		var minusculas = this.contaContem(senha, lowers);
		var numeros = this.contaContem(senha, numbers);
		var outros = tamanho - maiusculas - minusculas - numeros;
		var emSequencia = this.contaSequencia(senha, mais);
		var repeticoes = 0;
		for (i = 0; i < tamanho - 1; i++)if (senha.charAt(i) == senha.charAt(i + 1)) repeticoes++;
		var repetipares = 0;
		for (i = 0; i < tamanho - 1; i++)for (j = i + 1; j < tamanho - 1; j++)if (i != j && senha.substr(i, 2) == senha.substr(j, 2)) repetipares++;
		if (repetipares > tamanho) repetipares = tamanho - 1;
		else if (repetipares > 0) repetipares++;
		var listaPalavras = ["acesso", "admin", "amor", "deus", "familia", "família", "fuck", "google", "guest", "love", "jesus", "cristo", "letmein", "letmepass", "password", "please", "segredo", "senha", "sexo", "favor", "licença", "licenca"];
		var emLista = 0;
		for (i = 0; i < listaPalavras.length; i++)if (senhaL.indexOf(listaPalavras[i]) > -1) emLista += listaPalavras[i].length - 1;
		if (emLista > tamanho) emLista = tamanho - 1;
		var divisor = 5;
		if (maiusculas) divisor--;
		if (minusculas) divisor--;
		if (numeros) divisor--;
		if (outros) divisor--;
		score = (tamanho - emSequencia - repeticoes - repetipares - emLista) / divisor;
		console.log("score:" + score + " tamanho:" + tamanho + " seq:" + emSequencia + " rep:" + repeticoes + " repetipares:" + repetipares + " emLista:" + emLista + " divisor:" + divisor);
		//nivela score
		score = Math.round(score * 10);
		if (score > 99) score = 99;
		else if (score < 1) score = 1;
		return score;
	}

	this.validaInput = function (inp) {
		var inpNome = inp.attr('name');
		var msgVazio = 'Deve ser informado';
		var msgInvalido = 'Inválido'
		var par = inp.parent();
		var form = inp.closest('form');
		var err = par.find('.mdl-textfield__error');
		if (inp.val() == '' && inp.prop('required') == true) {//se estiver em branco e for obrigatório
			par.addClass('is-invalid');
			err.html(msgVazio);
		} else {
			if (inpNome == 'Telefone') {
			} else if (inpNome == 'Repita') {
				var nova = form.find("input[name='Nova']");
				if (inp.val() != nova.val()) {
					par.addClass('is-invalid');
					msgInvalido = 'Deve ser igual "Senha Nova"';
				} else par.removeClass('is-invalid');

			} else if (inpNome == 'CPF') {
				if (!this.validaCPF(inp.val())) par.addClass('is-invalid');
				else par.removeClass('is-invalid');
			}
			if (err.html() == msgVazio) err.html(msgInvalido);
		}
		this.validaForm(par.closest('form'));
	}

	this.validaForm = function (form) {
		//return true;//TODO remover esta linha para impedir envio sem validação local
		//TODO verificar if(tipo(form)!=jqueryForm)return false;
		var valido = true;
		form.find('input,select,textarea').each(function () {
			if ($(this).parent().hasClass('is-invalid')) valido = false;
		});
		if (valido) {
			var btnok = form.find('.ok');
			if (!btnok.hasClass('carregando')) btnok.removeAttr('disabled');
			form.find('.erros').slideUp();
		} else form.find('.ok').attr('disabled', 'disabled');
		return valido;
	}

	this.formataInput = function (inp) {
		if (inp.parent().hasClass('is-invalid')) return false;//finaliza se não estiver válido
		if (inp.attr('name') == 'CPF') inp.val(this.formataCPF(inp.val()));
	}

	this.sonumeros = function (str) {
		var r = '';
		for (var i = 0; i < str.length; i++)if (Number.isInteger(parseInt(str[i]))) r += str[i];
		return r;
	}

	this.validaCPF = function (CPF) {
		CPF = this.sonumeros(CPF);
		if (CPF.length != 11) return false;
		var iguais = true;
		for (i = 0; i < CPF.length - 1; i++)if (CPF[i] != CPF[i + 1]) {
			iguais = false;
			break;
		}
		if (iguais) return false;
		var Soma = 0;
		var Resto;
		for (i = 1; i <= 9; i++)Soma = Soma + parseInt(CPF.substring(i - 1, i)) * (11 - i);
		Resto = (Soma * 10) % 11;
		if ((Resto == 10) || (Resto == 11)) Resto = 0;
		if (Resto != parseInt(CPF.substring(9, 10))) return false;
		Soma = 0;
		for (i = 1; i <= 10; i++)Soma = Soma + parseInt(CPF.substring(i - 1, i)) * (12 - i);
		Resto = (Soma * 10) % 11;
		if ((Resto == 10) || (Resto == 11)) Resto = 0;
		if (Resto != parseInt(CPF.substring(10, 11))) return false;
		return true;
	}

	this.formataCPF = function (CPF) {
		CPF = this.sonumeros(CPF);
		return CPF.substr(0, 3) + '.' + CPF.substr(3, 3) + '.' + CPF.substr(6, 3) + '-' + CPF.substr(9, 2);
	}

	this.permitePopUp = function (str) {
		var popupWindow = window.open();
		if (!popupWindow) return false;
		else {
			popupWindow.close();
			return true;
		}
	}

	this.mostraModal = function (modal) {
		var modalNome = modal.attr('id');
		var isForm = modal.is('form');
		if (modalNome == 'trocarSenha') {
			var atual = modal.find("input[name='Atual']");
			var atualParent = atual.parent();
			var atualIco = atual.parent().prev();
			var painel = atualIco.parent();
			var btnCancel = modal.find('button.cancelar');
			var btnMostar = painel.find('button.mostraSenha');
			if (G_Usuario.TipoAcesso != 3) {//!=padrão
				atual.removeAttr('required');
				atualParent.hide();
				atualIco.hide();
				btnCancel.attr('disabled', 'disabled');
				atualIco.appendTo(painel);
				atualParent.appendTo(painel);
				btnMostar.appendTo(modal.find("input[name='Nova']").parent());
			} else if (atualParent.is(':last-child')) {
				atual.attr('required', 'required');
				atualParent.prependTo(painel);
				atualIco.prependTo(painel);
				btnMostar.appendTo(atualParent);
				atualParent.show();
				atualIco.show();
				btnCancel.removeAttr('disabled');
			}
		}
		modal.addClass('mostrar');
		if (isForm) modal.find('input,select,textarea').first().focus();
		else modal.find('button.ok').first().focus();
	}

	this.escondeModal = function (modal) {
		modal.removeClass('mostrar');
		this.mostraModal($('.modal.mostrar').first());
	}

	this.postaForm = function (form) {
		var formNome = form.attr('id');
		var btnok = form.find('.ok');
		var erros = form.find('.erros');
		form.find('input,select,textarea').each(function () {
			//valida todos inputs do form
			this.validaInput($(this));
		});
		if (btnok.attr('disabled') || !this.validaForm(form)) {
			form.find('.is-invalid').focus();
			return false;
		}
		erros.slideUp();
		erros.empty();
		btnok.attr('disabled', 'disabled');
		btnok.addClass('carregando');
		$.ajax({
			url: 'ajax.php?form=' + formNome,
			type: 'POST',
			data: form.serialize(),
			success: function (r) {
				try {
					js = jQuery.parseJSON(r);
					if (js.Resposta == 'FALHA') {
						if (js.Erros) for (i = 0; i < js.Erros.length; ++i) {
							if (js.Erros[i].Campo == 'form') $("<li>" + js.Erros[i].Erro + "</li>").appendTo(erros);
							else {
								var par = form.find("input[name=" + js.Erros[i].Campo + "]").parent();
								if (!par.hasClass('is-invalid')) par.addClass('is-invalid');
								var err = par.find('.mdl-textfield__error');
								err.html(js.Erros[i].Erro);
							}
						}
						if (erros.html() != '') {
							var container = erros.parent();
							erros.slideDown('fast', function () { container.animate({ scrollTop: erros.offset().top - container.offset().top + container.scrollTop() - 30 }); });
						}
						form.find('.is-invalid').first().find('input,select,textarea').first().focus();
					} else if (js.Resposta == 'LOGAR') {
						this.escondeModal(form);
						this.mostraModal($('#login'));
						erro.toast(js.Menssagem, 10000, 'info');
					} else if (js.Resposta == 'SUCESSO') {
						this.escondeModal(form);
						erro.toast(js.Menssagem, 10000, 'info');
						if (formNome == 'login' || formNome == 'trocarSenha') this.checaLogin();
					} else erro.erro('Resposta inesperada', js, r);
				} catch (e) {
					erro.erro('Não é json:', r, e);
				}
				btnok.removeClass('carregando');
			},
			error: function (a, b, c) {
				erro.erro(a, b, c);
				btnok.removeAttr('disabled');
				btnok.removeClass('carregando');
			}
		});
	}

	this.teste = async function () {
		await this.sleep(1001);
		console.warning('permitePopUp', this.permitePopUp());
	}

	this.sleep = function (ms) {
		return new Promise(resolve => setTimeout(resolve, ms));
	}

	this.reverso = function (s) {
		return (s === '') ? '' : reverso(s.substr(1)) + s.charAt(0);
	}

	window.onload = this.boot();

}


