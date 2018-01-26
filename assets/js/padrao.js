// function ajax(caminho, dados, callback){
function ajax(dados){
	var par = '';
	var ok = false;
	var cancelar = false;

	// if(typeof caminho.tarefa === 'string'|| caminho.tarefa instanceof String){
	// 	par = "?tarefa=" + caminho.tarefa;
	// 	$('#preLoading').removeClass('esconde');
	// }else{
	// 	var form = caminho.tarefa;
	// 	ok = form.find('.ok');
	// 	cancelar = form.find('.cancelar');
	// 	par = "?form=" + form.attr('id');
	// 	cancelar.attr('disabled','disabled');
	// 	ok.addClass('carregando').attr('disabled','disabled');
	// }

	$.ajax({
		url:'http://localhost/agroseven/ajax.php',
		type:'POST',
		data:dados,
		success:function(r){
			debugger;
			console.log(r);
			try{
				js = jQuery.parseJSON(r);
				if(ok){
					ok.removeClass('carregando').removeAttr('disabled');
					cancelar.removeAttr('disabled');
				}else $('#preLoading').addClass('esconde');
				callback(js);
			}catch(e){
				if(ok){
					ok.removeClass('carregando').removeAttr('disabled');
					cancelar.removeAttr('disabled');
				}else $('#preLoading').addClass('esconde');
			//  erro('Não é json:',r,e);
			}
		},
		error:function(a,b,c){
			if(ok){
				ok.removeClass('carregando').removeAttr('disabled');
				cancelar.removeAttr('disabled');
			}else $('#preLoading').addClass('esconde');
			// erro(a,b,c);
		}
	});
}
