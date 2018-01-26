$(".btn-menu").click(function(event) {
	$(".menu-lateral").toggleClass('abrir-menu');
});

$(".btn-fechar-menu").click(function(event) {
	$(".menu-lateral").removeClass('abrir-menu');
});

$(".notificacoes a").click(function(event) {
	$(".area-notificacoes").toggleClass('abrir-notificacoes');
	return false;
});

$("body").click(function(event) {
	$(".area-notificacoes").removeClass('abrir-notificacoes');
});

$(".propriedades").click(function(event) {
	$(this).toggleClass('active');
	$(".dropdown-fazendas").toggleClass('abrir-drop');
});

$(".btn-alterar-meus-dados").click(function(event) {
	$(this).hide();
	$(this).parents("form").find(".btns-editar").show();
	$(this).parents("form").find("input[type='text']").prop( "readonly", false );
	$(this).parents("form").find("input[type='email']").prop( "readonly", false );
	$(this).parents("form").find("input[type='password']").prop( "readonly", false );
	$(this).parents("form").find("textarea").prop( "readonly", false );
	$(this).parents("form").find('#input-confirmar-senha').show();
});

$(".btn-cancelar-alteracoes").click(function(event) {
	$(this).parents("form").find("input[type='text']").prop( "readonly", true );
	$(this).parents("form").find("input[type='email']").prop( "readonly", true );
	$(this).parents("form").find("input[type='password']").prop( "readonly", true );
	$(this).parents("form").find("textarea").prop( "readonly", true );
	$(this).parents("form").find('.btn-alterar-meus-dados').show();
	$(this).parents("form").find(".btns-editar").hide();
	$(this).parents("form").find('#input-confirmar-senha').hide();
});


$(".btn-add-existente").click(function(event) {
	$('#modalAddUsuario').modal('hide');
	$('#modalAddExistente').modal('show');
	return false;
});

$(".btn-add-func").click(function(event) {
	$('#modalAddExistente').modal('hide');
	$('#modalSucesso').modal('show');
});

$(".btn-finalizar-cadastro").click(function(event) {
	$('#modalSucesso').modal('hide');
});

$(".usuario-adds .box-funcionario").click(function(event) {
	$(this).addClass('active-box').siblings('.active-box').removeClass('active-box');
});


function logout(){
	$('#preLoading').removeClass('esconde');
	ajax('logout','',function(r){
		$('#preLoading').addClass('esconde');
		console.log(r);
	});
}