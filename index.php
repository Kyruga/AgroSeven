<?php
include_once('Config.php');

//ativa tratamento de erros
$relatar_erros=false;
$registrar_erros='error.log';//nome do arquivo ou false para não registrar

$relatorio_erros="";
error_reporting(-1);
ini_set('display_errors',1);
set_error_handler(function($tipo, $msg, $file, $line){
	$file=str_replace('/var/www/','',$file);
	$data=date("Y-m-d H:i:s");
	$nTipo='BRANCO';
	if($tipo==1)$nTipo='ERROR';elseif($tipo==2)$nTipo='WARNING';elseif($tipo==4)$nTipo='PARSE';elseif($tipo==8)$nTipo='NOTICE';elseif($tipo==16)$nTipo='CORE_ERROR';elseif($tipo==32)$nTipo='CORE_WARNING';elseif($tipo==64)$nTipo='COMPILE_ERROR';elseif($tipo==128)$nTipo='COMPILE_WARNING';elseif($tipo==256)$nTipo='USER_ERROR';elseif($tipo==512)$nTipo='USER_WARNING';elseif($tipo==1024)$nTipo='USER_NOTICE';elseif($tipo==2048)$nTipo='STRICT';elseif($tipo==4096)$nTipo='RECOVERABLE_ERROR';elseif($tipo==8192)$nTipo='DEPRECATED';elseif($tipo==16384)$nTipo='USER_DEPRECATED';elseif($tipo==32767)$nTipo='ALL';else $nTipo='DESCONHECIDO';
	$erro="$data\t$file:$line\t$nTipo:$tipo\t$msg\n";
	if($GLOBALS['registrar_erros'])file_put_contents($GLOBALS['registrar_erros'],$erro,FILE_APPEND);
	if($GLOBALS['relatar_erros'])$GLOBALS['relatorio_erros'].=$erro;
	return TRUE;
},-1);

//variáveis globais
$title="Testes";
$description="Pagina criada para diversos testes";
$keywords="test,html5,php7,mysql";

$reply="contato@7seventrends.com";
$author="7 Seven Trends";
$copyright="7 Seven Trends ©2017";

$id="?id=".date("YmdHis");
$q=isset($_GET['q'])?$_GET['q']:false;

require_once "funcoes.php";
// $fn = new Funcoes();
// $teste = $fn->valida_CPF('1088673543605');
// print_r($teste);

/*
push service.
https://web-push-codelab.glitch.me/
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?php echo $title?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="content-language" content="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="rating" content="general">
	<meta name="author" content="<?php echo $author?>">
	<meta name="reply-to" content="<?php echo $reply?>">
	<meta name="copyright" content="<?php echo $copyright?>">
	<meta name="description" content="<?php echo $description?>">
	<meta name="keywords" content="<?php echo $keywords?>">
	<meta name="theme-color" content="#2196F3">
	<link rel="manifest" href="manifest.json" type="application/x-web-app-manifest+json">
	<link rel="icon" href="img/logo.ico" type="image/x-icon" sizes="16x16 32x32 64x64 128x128 256x256">

	<link rel="icon" sizes="192x192" href="images/android-desktop.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Material Design Lite">
	<link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">
	<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
	<meta name="msapplication-TileColor" content="#3372DF">
	<link rel="shortcut icon" href="images/favicon.png">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium|Roboto+Condensed&amp;lang=pt-br">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
	<link rel="stylesheet" href="https://agroseven.com.br/svn/matheus/main.css"  type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

</head>
<body>

	<div id="preLoading" style="z-index:999;position:absolute;left:0;top:0;width:100vw;height:100vh;display:flex;flex-direction:column;flex-wrap:wrap;justify-content:center;align-items:center;background-color:rgba(255,255,255,0.9)">
		<img src="img/logo.svg" alt="Logotipo" style="width:auto;height:25vmin">
		<h1 style="text-align:center;margin:0;padding:0"><?php echo "$title"?></h1>
		<h2 style="text-align:center;margin:0;padding:0"><?php echo "$description"?></h2>
		<div class="mdl-spinner mdl-js-spinner is-active"></div>
	</div>

	<div id="toast" style="visibility:hidden;" class="centrar mdl-js-snackbar mdl-snackbar">
		<i class="material-icons">lock</i>
		<div class="mdl-snackbar__text"></div>
		<button class="mdl-snackbar__action" type="button"></button>
	</div>

	<form id="login" class="modal centrar">
		<div class="mdl-card mdl-shadow--6dp">
			<div class="centrar mdl-card__title mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text"><i class="material-icons">lock_outline</i>Área restrita</h2>
			</div>
			<div class="mdl-card__supporting-text">
				<i class="material-icons">person</i>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input title="Informe #,Nome,Email ou CPF do Usuário" class="mdl-textfield__input" spellcheck="false" type="text" id="loginUsuario" name="Usuario" required="required" minlength="1" maxlength="255">
					<label class="mdl-textfield__label" for="loginUsuario">Usuário</label>
					<span class="mdl-textfield__error">Deve ser informado</span>
				</div>
				<i class="material-icons">vpn_key</i>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input title="Informe a Senha do Usuário" class="ultimo-input avisaCaps mostraSenha mdl-textfield__input" spellcheck="false" type="password" id="loginSenha" name="Senha" required="required" minlength="1" maxlength="50">
					<label class="mdl-textfield__label" for="loginSenha">Senha</label>
					<span class="mdl-textfield__error">Deve ser informada</span>
					<button title="Mostrar Senha" class="mostraSenha mdl-button mdl-js-button mdl-button--icon mdl-button--mini-fab" onclick="return false;"><i class="material-icons">visibility</i></button>
				</div>
				<i class="material-icons"> </i>
				<div>
					<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="loginPermanecerConectado">
						<span class="mdl-switch__label">Permanecer conectado</span>
						<input title="Marque para permanecer conectado neste dispositivo" type="checkbox" id="loginPermanecerConectado" name="PermanecerConectado" value="1" class="mdl-switch__input">
					</label>
				</div>
				<ul class="erros mdl-textfield__error"></ul>
			</div>
			<div class="centrar mdl-card__actions mdl-card--border">
				<button title="Verificar dados e efetuar Log-in" class="ok mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="postaForm($(this).closest('form'));return false;"><div class="mdl-spinner mdl-js-spinner is-active"></div><i class="material-icons">done</i>Entrar</button>
				<!-- <button title="Verificar dados e efetuar Log-in" class="ok mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="oi();"><div class="mdl-spinner mdl-js-spinner is-active"></div><i class="material-icons">done</i>Entrar</button> -->
				<button title="Esqueceu sua senha?" class="pequeno mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="mostraModal($('#recuperarSenha'));return false;"><div class="mdl-spinner mdl-js-spinner is-active"></div><i class="material-icons">help</i>Recuperar senha</button>
			</div>
		</div>
	</form>

	<form id="recuperarSenha" class="modal centrar">
		<div class="mdl-card mdl-shadow--6dp">
			<div class="centrar mdl-card__title mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text"><i class="material-icons">help</i>Recuperação de senha</h2>
			</div>
			<div class="mdl-card__supporting-text">
				<i class="material-icons">email</i>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input title="Informe Email do Usuário" class="mdl-textfield__input" spellcheck="false" type="email" id="recuperarSenhaEmail" name="Email" required="required" minlength="1" maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
					<label class="mdl-textfield__label" for="recuperarSenhaEmail">Email</label>
					<span class="mdl-textfield__error">Deve ser informado</span>
				</div>
				<i class="material-icons">picture_in_picture</i>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input title="Informe o CPF do Usuário" class="ultimo-input mdl-textfield__input" spellcheck="false" type="text" id="recuperarSenhaCPF" name="CPF" required="required" minlength="1" maxlength="14" pattern="(\D*\d{1}\D*){11}">
					<label class="mdl-textfield__label" for="recuperarSenhaCPF">CPF</label>
					<span class="mdl-textfield__error">Deve ser informado</span>
				</div>
				<ul class="erros mdl-textfield__error"></ul>
			</div>
			<div class="centrar mdl-card__actions mdl-card--border">
				<button title="Verificar dados e recuperar senha" class="ok mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="postaForm($(this).closest('form'));return false;"><div class="mdl-spinner mdl-js-spinner is-active"></div><i class="material-icons">done</i>Recuperar</button>
				<button title="Cancela a recuperação" class="cancelar mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" onclick="if($(this).is(':visible')&&$(this).is(':enabled'))escondeModal($(this).closest('.modal'));return false;"><i class="material-icons">cancel</i>Cancelar</button>
			</div>
		</div>
	</form>

	<form id="trocarSenha" class="modal centrar">
		<div class="mdl-card mdl-shadow--6dp">
			<div class="centrar mdl-card__title mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text"><i class="material-icons">autorenew</i>Trocar senha</h2>
			</div>
			<div class="mdl-card__supporting-text">
				<i class="material-icons">vpn_key</i>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input title="Informe a Senha atual do Usuário" class="avisaCaps mostraSenha mdl-textfield__input" spellcheck="false" type="password" id="trocarSenhaAtual" name="Atual" required="required" minlength="1" maxlength="50">
					<label class="mdl-textfield__label" for="trocarSenhaAtual">Senha Atual</label>
					<span class="mdl-textfield__error">Deve ser informada</span>
					<button title="Mostrar Senhas" class="mostraSenha mdl-button mdl-js-button mdl-button--icon mdl-button--mini-fab" onclick="return false;"><i class="material-icons">visibility</i></button>
				</div>
				<i class="material-icons">lock</i>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input title="Informe a Senha nova para Usuário" class="avisaCaps mostraSenha medeSenha mdl-textfield__input" spellcheck="false" type="password" id="trocarSenhaNova" name="Nova" required="required" minlength="1" maxlength="50">
					<label class="mdl-textfield__label" for="trocarSenhaNova">Senha Nova</label>
					<span class="mdl-textfield__error">Deve ser informada</span>
					<span class="mdl-textfield__info">
						<span class="barra"><span></span></span>
						<span class="info"></span>
					</span>

				</div>
				<i class="material-icons">lock_outline</i>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input title="Repita a Senha Nova para Usuário" class="ultimo-input avisaCaps mostraSenha mdl-textfield__input" spellcheck="false" type="password" id="trocarSenhaRepita" name="Repita" required="required" minlength="1" maxlength="50">
					<label class="mdl-textfield__label" for="trocarSenhaRepita">Repetir Senha Nova</label>
					<span class="mdl-textfield__error">Deve ser informada</span>
				</div>
				<ul class="erros mdl-textfield__error"></ul>
			</div>
			<div class="centrar mdl-card__actions mdl-card--border">
				<button title="Verificar dados e recuperar senha" class="ok mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="postaForm($(this).closest('form'));return false;"><div class="mdl-spinner mdl-js-spinner is-active"></div><i class="material-icons">done</i>Trocar</button>
				<button title="Cancela a recuperação" class="cancelar mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" onclick="if($(this).is(':visible')&&$(this).is(':enabled'))escondeModal($(this).closest('.modal'));return false;"><i class="material-icons">cancel</i>Cancelar</button>
			</div>
		</div>
	</form>


	<div style="visibility:hidden" id="corpo" class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<div>
					<a href="" onclick="scrola();return false;"><img class="logo" src="img/logo.svg" alt="Logotipo"></a>
					<?php echo "$title"?>
				</div>
				<div class="mdl-layout-spacer"></div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
					<label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
						<i class="material-icons">search</i>
					</label>
					<div class="mdl-textfield__expandable-holder">
						<input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
					</div>
				</div>
			</div>
		</header>
		<div class="mdl-layout__drawer">
			<span class="mdl-layout-title"><?php echo "$title"?></span>
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href=""><i class="material-icons">account_circle</i>Usuários</a>
				<a class="mdl-navigation__link" href="https://api.whatsapp.com/send?phone=553530112460"><i class="material-icons">android</i>Robozinho</a>
				<a class="mdl-navigation__link" href=""><i class="material-icons">shopping_cart</i>Compras</a>
				<a class="mdl-navigation__link" href=""><i class="material-icons">free_breakfast</i>Café</a>
				<a class="mdl-navigation__link" href=""><i class="material-icons">insert_chart</i>Gráficos</a>
				<div class="mdl-layout-spacer"></div>
				<a class="mdl-navigation__link" href="" onclick="mostraModal($('#trocarSenha'));return false;"><i class="material-icons">vpn_key</i>Trocar Senha</a>
				<a class="mdl-navigation__link" href="" onclick="logout();return false;"><i class="material-icons">exit_to_app</i>Sair</a>
				<a class="mdl-navigation__link" href=""><i class="material-icons">help</i>Ajuda</a>
			</nav>
		</div>
		<main class="mdl-layout__content">
			<div class="page-content">
				<!-- Your content goes here -->
				a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
				<br>a<br>b<br>c<br>d<br>e<br>f<br>g<br>h<br>i<br>j<br>k<br>l<br>m<br>n<br>p<br>q<br>r<br>s<br>t<br>u<br>v<br>w<br>x<br>y<br>z
			</div>
		</main>
		<footer class="mdl-mini-footer">
			<div class="mdl-mini-footer__left-section">
				<?php echo $copyright?>
			</div>
			<div class="mdl-mini-footer__middle-section">
			</div>
			<div class="mdl-mini-footer__right-section">
				<tspan>Desenvolvido por: </tspan><a href="http://7seventrends.com" target="_new"><img src="img/7seven_feH.svg" alt="Logo 7seventrends"></a>
			</div>
		</footer>
	</div>

	<!-- <script src="https://agroseven.com.br/svn/matheus/js/validador.js"></script> -->
	<script src="https://agroseven.com.br/svn/matheus/js/formatador.js"></script>
	<script src="https://agroseven.com.br/svn/matheus/js/interface.js"></script>
	<script src="https://agroseven.com.br/svn/matheus/js/erro.js"></script>
	<script src="https://agroseven.com.br/svn/matheus/js/chamadaAjax.js"></script>
	<script src="https://agroseven.com.br/svn/matheus/js/funcoesAjax.js"></script>
	<script src="js/validador.js"></script>
	<!--<script src="js/formatador.js"></script>
	<script src="js/interface.js"></script>
	<script src="js/erro.js"></script>
	<script src="js/chamadaAjax.js"></script>
	<script src="js/funcoesAjax.js"></script> -->

	<script type="text/javascript">
		$(document).ready(function(){
			var validador  = new Validador();
			var formatador = new Formatador();
			var interface  = new Interface();
		});
	</script>

</body>
</html>
<?php if($GLOBALS['relatar_erros'] && $GLOBALS['relatorio_erros']!='')echo "<pre>Relatório de erros:\n".$GLOBALS['relatorio_erros']."</pre>";//exibe relatório de erros ?>