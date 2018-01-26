<?php
//ativa tratamento de erros
$relatar_erros=true;
$registrar_erros="erros.log";//nome do arquivo ou false para não registrar

$relatorio_erros="";
error_reporting(-1);
ini_set('display_errors',1);
set_error_handler(function($tipo, $msg, $file, $line){
	if($tipo==8 && $msg='crypt(): No salt parameter was specified. You must use a randomly generated salt and a strong hash function to produce a secure hash.')return TRUE;
	$file=str_replace('/var/www/','',$file);
	$data=date("Y-m-d H:i:s");
	$nTipo='BRANCO';
	if($tipo==1)$nTipo='ERROR';elseif($tipo==2)$nTipo='WARNING';elseif($tipo==4)$nTipo='PARSE';elseif($tipo==8)$nTipo='NOTICE';elseif($tipo==16)$nTipo='CORE_ERROR';elseif($tipo==32)$nTipo='CORE_WARNING';elseif($tipo==64)$nTipo='COMPILE_ERROR';elseif($tipo==128)$nTipo='COMPILE_WARNING';elseif($tipo==256)$nTipo='USER_ERROR';elseif($tipo==512)$nTipo='USER_WARNING';elseif($tipo==1024)$nTipo='USER_NOTICE';elseif($tipo==2048)$nTipo='STRICT';elseif($tipo==4096)$nTipo='RECOVERABLE_ERROR';elseif($tipo==8192)$nTipo='DEPRECATED';elseif($tipo==16384)$nTipo='USER_DEPRECATED';elseif($tipo==32767)$nTipo='ALL';else $nTipo='DESCONHECIDO';
	$erro="$data\t$file:$line\t$nTipo:$tipo\t$msg\n";
	if($GLOBALS['relatar_erros'])$GLOBALS['relatorio_erros'].=$erro;
	//if($GLOBALS['registrar_erros'])file_put_contents($GLOBALS['registrar_erros'],$erro,FILE_APPEND);
	return TRUE;
},-1);

//carregar bibliotecas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;
// require 'vendor/autoload.php';

//variáveis globais
$banco=array(
	'bd'=>false,//objeto banco de dados
	'query'=>false,//objeto consulta
	'host'=>'localhost',
	'user'=>'www',
	'psw'=>'zzz',
	'nome'=>'4x4mg'
);

//funções
function hash_cliente(){
	return md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']).$_SERVER['HTTP_USER_AGENT']);
}
function mandamail($dstNome,$dstEmail,$assunto,$corpo,$anexos=false,$remetente="Sistema Testes",$respto="responderpara@dominio.com.br"){
	$eviou=false;
	$mail=new PHPMailer(true);
	try{
		//$mail->SMTPDebug=2;
		$mail->SetLanguage("br","vendor/phpmailer/phpmailer/language/");
		$mail->IsSMTP();
		$mail->SMTPAuth=true;
		$mail->CharSet='utf-8';
		$mail->Host="smtp.gmail.com";
		$mail->SMTPSecure="tls";
		$mail->Port=587;
		$mail->Username="sis@m2f.net.br";
		$mail->Password="xxx";
		$mail->setFrom("sis@m2f.net.br",$remetente);
		$mail->AddReplyTo($respto, $remetente);
		//$mail->WordWrap = 50;//não sei para que serve
		$mail->addAddress($dstEmail,$dstNome);//pode adicionar varios, nome é opcional
		$mail->IsHTML(true);
		$mail->Subject=$assunto;
		$mail->Body=$corpo;
		//$mail->AltBody='body in plain text for non-HTML mail clients';
		if(is_array($anexos))foreach($anexo as $anexo)$mail->AddAttachment($anexo);
		elseif($anexos)$mail->AddAttachment($anexos);//$mail->AddAttachment('/tmp/image.jpg','novoNome.jpg');
		$enviou=$mail->Send();
	}catch(phpmailerException $e){
		//nada
	}
	if($enviou)return true;
	else return $mail->ErrorInfo;
}
function info(){
 phpinfo();
}
function gerarSenha($minusculas=2,$maiusculas=2,$numeros=2,$simbolos=2){
	$lmin='abcdefghijklmnopqrstuvwxyz';
	$lmai='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$num='1234567890';
	$simb='!@#$%*-';
	$retorno='';
	for($i=0;$i<$minusculas;$i++)$retorno.=$lmin[rand(0,strlen($lmin)-1)];
	for($i=0;$i<$maiusculas;$i++)$retorno.=$lmai[rand(0,strlen($lmai)-1)];
	for($i=0;$i<$numeros;$i++)$retorno.=$num[rand(0,strlen($num)-1)];
	for($i=0;$i<$simbolos;$i++)$retorno.=$simb[rand(0,strlen($simb)-1)];
	return str_shuffle($retorno);//str_shuffle embaralha uma string
}

function abre_bd(){
	extract($GLOBALS['banco']);
	if(!$bd){
		$bd=new mysqli($host,$user,$psw,$nome);
		$bd->set_charset("utf8");
		$GLOBALS['banco']['bd']=$bd;
	}
	return $bd;
}
function query($consulta){
	$bd=abre_bd();
	if(is_array($consulta)){//atomic
		$bd->begin_transaction();
		$afetadas=array();
		foreach($consulta as $consult){
			if(!$bd->query($consult)){
				$bd->rollback();
				return false;//trigger_error("consulta(atomic): ".$GLOBALS['banco']['bd']->error,E_USER_WARNING);//se der erro
			}else $afetadas[]=$bd->affected_rows;
		}
		$bd->commit();
		return $afetadas;//retorna array numerico de linhas afetadas
	}else{
		$tipo=strtoupper(substr($consulta,0,7));//SELECT, INSERT, UPDATE ou DELETE com espaço
		if($GLOBALS['banco']['query'] && is_object($GLOBALS['banco']['query']))$GLOBALS['banco']['query']->free();//libera consulta anterior
		$GLOBALS['banco']['query']=$GLOBALS['banco']['bd']->query($consulta);//executa consulta
		if(!$GLOBALS['banco']['query'])trigger_error("consulta(): ".$GLOBALS['banco']['bd']->error,E_USER_WARNING);//se der erro
		elseif($tipo=='INSERT ' || $tipo=='UPDATE ' || $tipo=='DELETE ')return $GLOBALS['banco']['bd']->affected_rows;//retorna linhas afetadas
		elseif($GLOBALS['banco']['query']->num_rows==0)return 0;//retorna 0 se não encontrar nada
		else{
			$linhas=array();
			while($linha=$GLOBALS['banco']['query']->fetch_assoc())$linhas[]=$linha;
			$campos=array_keys($linhas[0]);
			if($GLOBALS['banco']['query']->num_rows==1 && $GLOBALS['banco']['query']->field_count==1){//retorna string
				$str=$linhas[0][$campos[0]];
				if($str===0)return "0";//para não confundir a resposta "0" com 0 resultados...
				else return $str;
			}elseif($GLOBALS['banco']['query']->num_rows==1 && $GLOBALS['banco']['query']->field_count>1)return $linhas[0];//retorna array associativo: Campos e valores
			elseif($GLOBALS['banco']['query']->num_rows>1 && $GLOBALS['banco']['query']->field_count==1){//retorna array numerico com valores
				$arr_num=array();
				foreach($linhas as $linha)$arr_num[]=$linha[$campos[0]];
				return $arr_num;
			}elseif($GLOBALS['banco']['query']->num_rows>1 && $GLOBALS['banco']['query']->field_count>1)return $linhas;//retorna array numerico de arrays associativos: Campos e valores
			else return $GLOBALS['banco']['query'];//não previsto retora objeto consulta
		}
	}
}

function fecha_bd(){
	if($GLOBALS['banco']['query'] && is_object($GLOBALS['banco']['query'])){
		$GLOBALS['banco']['query']->free();
		$GLOBALS['banco']['query']=false;
	}
	if($GLOBALS['banco']['bd'] && is_object($GLOBALS['banco']['bd'])){
		$GLOBALS['banco']['bd']->close();
		$GLOBALS['banco']['bd']=false;
	}
}

class bdSessao implements SessionHandlerInterface{
	private $bd;
	private $query;
	public function __construct($manter=false){
		if($manter===false)$manter=0;//até fechar p navegador
		elseif($manter===true)$manter=31536000;//se manter===true, validade de um ano
		elseif(!is_integer($manter))$manter=0;
		extract($GLOBALS['banco']);
		$this->bd=new mysqli($host,$user,$psw,$nome);
		$this->bd->set_charset("utf8");
		$this->query=false;
		session_set_save_handler(
			array($this,'open'),
			array($this,'close'),
			array($this,'read'),
			array($this,'write'),
			array($this,'destroy'),
			array($this,'gc')
		);
		session_start(array(
			"name"=>"Sessao",
			"use_cookies"=>"1",//ativa cookies de sessão
			"use_only_cookies"=>"1",//obriga usar cookies
			"use_trans_sid"=>"0",
			"cookie_lifetime"=>"$manter",//em segundos
			"cookie_path"=>"/",
			"cookie_domain"=>"",
			"cookie_secure"=>"1",
			"cookie_httponly"=>"1",
			"use_strict_mode"=>"1",
			"cache_limiter"=>"nocache",
			"cache_expire"=>"180"//minutos//1?
		));
		//register_shutdown_function('session_write_close');
	}
	public function open($savePath, $sessionName){
		if($this->bd)return true;
		else return false;
	}
	public function close(){
		return $this->bd->close();
	}
	public function read($Sessao){
		$r = '';
		$Sessao = $this->bd->real_escape_string($Sessao);
		$this->query = $this->bd->query("SELECT Dados FROM Sessoes WHERE Sessao='$Sessao' LIMIT 1");
		if(!$this->query)trigger_error("sessao_consulta(): ".$this->bd->error,E_USER_WARNING);//se der erro
		elseif($this->query->num_rows==1){
			$r=$this->query->fetch_assoc();
			$r=$r['Dados'];
		}
		$this->query->free();
		return $r;
	}
	public function write($Sessao,$Dados){
		$Sessao=$this->bd->real_escape_string($Sessao);
		$r=false;
		$this->query=$this->bd->query("REPLACE INTO Sessoes VALUES('$Sessao',NOW(),'$Dados')");
		if(!$this->query)trigger_error("sessao_consulta(): ".$this->bd->error,E_USER_WARNING);//se der erro
		elseif($this->bd->affected_rows==1)$r=true;
		return $r;
	}
	public function destroy($Sessao){
		$Sessao=$this->bd->real_escape_string($Sessao);
		$r=false;
		$this->query=$this->bd->query("DELETE FROM Sessoes WHERE Sessao='$Sessao' LIMIT 1");
		if(!$this->query)trigger_error("sessao_consulta(): ".$this->bd->error,E_USER_WARNING);//se der erro
		elseif($this->bd->affected_rows==1)$r=true;
		return $r;
	}
	public function gc($max){
// 		$r=false;
// 		$old=time()-$max;
// 		$this->query=$this->db->query("DELETE * FROM Sessoes WHERE Acesso<'$old'");
// 		if(!$this->query)trigger_error("sessao_consulta(): ".$this->bd->error,E_USER_WARNING);//se der erro
// 		else $r=true;
// 		return $r;
		return true;
	}
}

//funções de validação
function sonumeros($num){
	$r='';
	for($i=0;$i<strlen($num);$i++)if(is_numeric($num[$i]))$r.=$num[$i];
	return $r;
}
function valida_email($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function valida_CPF($CPF){//retorna TRUE se o $CPF for válido, senão retorna FALSE
	$CPF=sonumeros($CPF);
	if($CPF=="")return false;
	elseif(strlen($CPF)!=11)return false;
	elseif ($CPF=="00000000000")return false;
	elseif($CPF=="00000000001")return true;//para testes
	else{
		$Numero[1]=intval(substr($CPF,1-1,1));$Numero[2]=intval(substr($CPF,2-1,1));$Numero[3]=intval(substr($CPF,3-1,1));$Numero[4]=intval(substr($CPF,4-1,1));$Numero[5]=intval(substr($CPF,5-1,1));$Numero[6]=intval(substr($CPF,6-1,1));$Numero[7]=intval(substr($CPF,7-1,1));$Numero[8]=intval(substr($CPF,8-1,1));$Numero[9]=intval(substr($CPF,9-1,1));$Numero[10]=intval(substr($CPF,10-1,1));$Numero[11]=intval(substr($CPF,11-1,1));
		$soma=10*$Numero[1]+9*$Numero[2]+8*$Numero[3]+7*$Numero[4]+6*$Numero[5]+5*$Numero[6]+4*$Numero[7]+3*$Numero[8]+2*$Numero[9];
		$soma=$soma-(11*(intval($soma/11)));
		if ($soma==0 || $soma==1)$resultado1=0;else $resultado1=11-$soma;
		if ($resultado1==$Numero[10]){
			$soma=$Numero[1]*11+$Numero[2]*10+$Numero[3]*9+$Numero[4]*8+$Numero[5]*7+$Numero[6]*6+$Numero[7]*5+$Numero[8]*4+$Numero[9]*3+$Numero[10]*2;
			$soma=$soma-(11*(intval($soma/11)));
			if ($soma==0 || $soma==1)$resultado2=0;else $resultado2=11-$soma;
			if ($resultado2==$Numero[11])return true;else return false;;
		}else return false;
	}
}

function checaLogin(){
	$R=array();//resposta
	$velho=date("Y-m-d H:i:s",time()-$_SESSION['Usuario']['PermanecerConectado']);
	if(isset($_SESSION['Usuario']) && $_SESSION['Usuario']['Atividade']>$velho && $_SESSION['Usuario']['Hash']==hash_cliente()){
		$usuarioBD=query("SELECT Usuario,Nome,Nivel FROM Usuarios WHERE Nivel<255 AND Usuario='".$_SESSION['Usuario']['Usuario']."'");
		if(isset($usuarioBD['Usuario'])){
			$_SESSION['Usuario']['Usuario']=$usuarioBD['Usuario'];
			$_SESSION['Usuario']['Nome']=$usuarioBD['Nome'];
			$_SESSION['Usuario']['Nivel']=$usuarioBD['Nivel'];
			$_SESSION['Usuario']['Atividade']=date('Y-m-d H:i:s');
			$R['Resposta']='SUCESSO';
			$R['Usuario']=$_SESSION['Usuario'];
			$R['Menssagem']='Login OK.';
		}else $R=logout();
	}else $R=logout();
	return $R;
}

function logout(){
	if(isset($_SESSION['Usuario']))unset($_SESSION['Usuario']);
	//$R['Resposta']='SUCESSO';
	$R['Resposta']='LOGAR';
	$R['Menssagem']='Login EXPIRADO, favor acessar novamente.';
	return $R;
}

function form($form){
	//carrega informações de sessão
	$sUsuario=checaLogin();
	if(isset($sUsuario['Resposta']) && $sUsuario['Resposta']=='SUCESSO')$sUsuario=$sUsuario['Usuario'];
	elseif($form!='login' && $form!='recuperarSenha'){
		//se login expirado direciona para tela de login
		echo json_encode($sUsuario);
		return 0;
	}
	$R=array();//vetor resposta;
	$erro_campo_vazio="Deve ser informado";
	$erro_campo_invalido="Inválido";
	$bd=abre_bd();//inicia banco;
	foreach($_POST as $k=>$v)$_POST[$k]=$bd->real_escape_string($v);//escapa aspas e outros perigosos
	extract($_POST);
	//valida campos
	if($form=='login'){
		if(!$Usuario||$Usuario=='')$R['Erros'][]=array("Campo"=>"Usuario","Erro"=>$erro_campo_vazio);
		if(!$Senha||$Senha=='')$R['Erros'][]=array("Campo"=>"Senha","Erro"=>$erro_campo_vazio);
	}elseif($form=='recuperarSenha'){
		if(!$Email||$Email=='')$R['Erros'][]=array("Campo"=>"Email","Erro"=>$erro_campo_vazio);
		elseif(!valida_email($Email))$R['Erros'][]=array("Campo"=>"Email","Erro"=>$erro_campo_invalido);
		if(!$CPF||$CPF=='')$R['Erros'][]=array("Campo"=>"CPF","Erro"=>$erro_campo_vazio);
		elseif(!valida_CPF($CPF))$R['Erros'][]=array("Campo"=>"CPF","Erro"=>$erro_campo_invalido);
	}elseif($form=='trocarSenha'){
		if($sUsuario['TipoAcesso']=='Senha'){//exige senha Atual, apenas se o TipoAcesso for Senha
			$senhaBanco=query("SELECT Senha FROM Usuarios WHERE Usuario='".$sUsuario['Usuario']."' LIMIT 1");
			if($Atual=='')$R['Erros'][]=array("Campo"=>"Atual","Erro"=>$erro_campo_vazio);
			if($senhaBanco!=crypt($Atual,$senhaBanco))$R['Erros'][]=array("Campo"=>"Atual","Erro"=>"Incorreta");
		}
		if($Nova=='')$R['Erros'][]=array("Campo"=>"Nova","Erro"=>$erro_campo_vazio);
		if($Repita=='')$R['Erros'][]=array("Campo"=>"Repita","Erro"=>$erro_campo_vazio);
		elseif($Repita!=$Nova)$R['Erros'][]=array("Campo"=>"Repita","Erro"=>'Deve ser igual "Senha Nova"');
	}
	//se não houver erros de validação
	if(!isset($R['Erros'])||count($R['Erros'])==0){
		//pega dados para registro de [tentativa de ]acesso
		$ip=$bd->real_escape_string($_SERVER['REMOTE_ADDR']);
		$host=$bd->real_escape_string(gethostbyaddr($ip));
		$info=$bd->real_escape_string(parseUserAgent());
		$userAgent=$bd->real_escape_string($_SERVER['HTTP_USER_AGENT']);
		$acessoNID=query("SHOW TABLE STATUS LIKE 'Acessos'");
		$acessoNID=$acessoNID['Auto_increment'];
		if($form=='login'){
			//determina em qual campo buscar o usuário
			if(valida_CPF($Usuario))$campo="CPF";
			elseif(valida_email($Usuario))$campo="Email";
			elseif(is_numeric($Usuario))$campo="Usuario";
			else $campo="Nome";
			//busca usuario no banco
			$usuarioBD=query("SELECT Usuario,Nome,Senha,Provisoria,Nivel FROM Usuarios WHERE $campo='$Usuario'");
			if($usuarioBD===false)$R['Erros'][]=array("Campo"=>"form","Erro"=>$bd->error);
			elseif($usuarioBD===0){//se não encontrar
				if(!query("INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,1,1,1,NOW(),'$ip','$host','$info','$userAgent')"))$R['Erros'][]=array("Campo"=>"form","Erro"=>'Falha ao registrar busca usuário');
				$R['Erros'][]=array("Campo"=>"Usuario","Erro"=>"Não encontrado");
			}elseif($usuarioBD['Nivel']==255){//se suspenso
				if(!query(array(
					"INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,1,1,2,NOW(),'$ip','$host','$info','$userAgent')",
					"INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
				)))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha ao registrar acesso suspenso");
				$R['Erros'][]=array("Campo"=>"Usuario","Erro"=>"Suspenso. Favor entrar em contato.");
			}else{
				//consulta chave esqueleto
				$skul=query("SELECT Senha FROM Usuarios WHERE Usuario=1 LIMIT 1");
				if($skul===false)$R['Erros'][]=array("Campo"=>"form","Erro"=>$bd->error);
				elseif($skul===0)$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha ao buscar usuario 1");
				else{
					//confere senhas
					$tipo=false;
					if($usuarioBD['Senha']==crypt($Senha,$usuarioBD['Senha'])){
						$tipo=3;//'Padrao';
						//se entrar com senha normal remove uma possível provisória
						if($usuarioBD['Provisoria']===null && !query("UPDATE Usuarios SET Provisoria=NULL WHERE Usuario='".$usuarioBD['Usuario']."' LIMIT 1")===false)$R['Erros'][]=array("Campo"=>"form","Erro"=>$bd->error);
					}elseif($usuarioBD['Provisoria']!==null && $usuarioBD['Provisoria']==crypt($Senha,$usuarioBD['Provisoria']))$tipo=4;//'Provisoria';
					elseif($skul==crypt($Senha,$skul))$tipo=5;//'Skul';
					if(!$tipo){//se a senha não conferir
						//TODO menssagens de senha não confere e usuario não encontrado devem ser a mesma por segurança.
						if(!query(array(
							"INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,1,1,1,NOW(),'$ip','$host','$info','$userAgent')",
							"INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
						)))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro");
						$R['Erros'][]=array("Campo"=>"Senha","Erro"=>"Não confere");
					}else{
						//Inicializa sessão
						$PermanecerConectado=$PermanecerConectado?60*60*24:60*5;//1 Mês ou 5 minutos
						$_SESSION['Usuario']['Hash']=hash_cliente();
						$_SESSION['Usuario']['Usuario']=$usuarioBD['Usuario'];
						$_SESSION['Usuario']['Atividade']=date('Y-m-d H:i:s');
						$_SESSION['Usuario']['PermanecerConectado']=$PermanecerConectado;
						$_SESSION['Usuario']['TipoAcesso']=$tipo;
						//registra acesso
						if(!query(array(
							"INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,1,1,$tipo,NOW(),'$ip','$host','$info','$userAgent')",
							"INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
						)))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Erro ao registrar acesso");
						else{
							$R['Resposta']='SUCESSO';
							$R['Menssagem']='Login efetuado com sucesso.';//TODO colocar DATA do último acesso
						}
					}
				}
			}
		}elseif($form=='recuperarSenha'){
			//busca usuario no banco
			$cpfNum=sonumeros($CPF);
			$usuarioBD=query("SELECT Usuario,Nome,CPF,Email,Senha,Provisoria,Nivel FROM Usuarios WHERE Email='$Email' LIMIT 1");
			if($usuarioBD===false)$R['Erros'][]=array("Campo"=>"form","Erro"=>$bd->error);
			elseif($usuarioBD===0){
				if(!query("INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,2,1,1,NOW(),'$ip','$host','$info','$userAgent')"))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro Não encontrado");
				$R['Erros'][]=array("Campo"=>"Email","Erro"=>"Não encontrado");
			}else{//se encontrar usuario
				if($usuarioBD['CPF']!=$cpfNum){
					if(!query(array(
						"INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,2,1,1,NOW(),'$ip','$host','$info','$userAgent')",
						"INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
					)))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro Não confere");
					$R['Erros'][]=array("Campo"=>"CPF","Erro"=>"Não confere");
				}elseif($usuarioBD['Nivel']==255){
					if(!query(array(
						"INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,2,1,2,NOW(),'$ip','$host','$info','$userAgent')",
						"INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
					)))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro suspenso");
					$R['Erros'][]=array("Campo"=>"Email","Erro"=>"Usuário suspenso. Favor entrar em contato.");
				}else{
					if(!query(array(
						"INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,2,1,3,NOW(),'$ip','$host','$info','$userAgent')",
						"INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
					)))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro recuperação");
					//TODO implantar limitações de recuperação e registro de recuperações e tentativas
					$novaSenha=gerarSenha(3,2,3,0);
					$novaCrypt=crypt($novaSenha);//'Extended DES'
					extract($usuarioBD);
					if(!query("UPDATE Usuarios SET Provisoria='$novaCrypt' WHERE Usuario='$Usuario' LIMIT 1;"))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Erro ao recuperarSenha");
					else{
						$dados="".date("d/m/Y H:i:s")." ".$_SERVER['REMOTE_ADDR']." ".$_SERVER['HTTP_USER_AGENT']."";
						//TODO incluir mais dados de quem pediu esta recuperação. Melhorar apresentação.
						$texto="Prezado(a) <b>$Nome</b>,<br>
							Foi solicitada recuperação de sua senha em nosso sistema.<br><br>
							Para acesso entre em: <a href='https://4x4mg.com.br'>https://4x4mg.com.br</a><br>
							Usuário: <b>$Email</b> ou <b>$Nome</b><br>
							Senha(Provisória): <b>$novaSenha</b><br><br>
							Tenha em mente uma nova senha, pois será preciso trocar a provisória ao primeiro acesso.<br><br>
							Se não foi você quem solicitou esta recuperação apenas acesse o sistema com sua senha atual e a recuperação será anulada.<br><br>
							Caso tenha dificuldades, dúvidas ou sugestões, favor entrar em contato.<br><br>
							Atenciosamente:<br>
							7SevenTrends<br>
							<a href='mailto:adm@7seventrends.com'>adm@7seventrends.com</a><br><br>
							Dados da solicitação de recuperação:
							<br>$dados
						";
						$mm=mandamail($Nome,$Email,'Recuperação de senha',$texto);
						if(!$mm)$R['Erros'][]=array("Campo"=>"form","Erro"=>$mm);
						else{
							$R['Resposta']='SUCESSO';
							$R['Menssagem']='Enviado com sucesso. Em instantes você receberá um email uma senha provisória';
						}
					}
				}
			}
		}elseif($form=='trocarSenha'){
			$novaCrypt=crypt($Nova);
			if(!query("UPDATE Usuarios SET Senha='$novaCrypt', Provisoria=NULL WHERE Usuario='".$sUsuario['Usuario']."' LIMIT 1;"))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Erro ao trocar Senha");
			else{
				$R['Resposta']='SUCESSO';
				$R['Menssagem']='Senha trocada com sucesso.';//TODO derrubar todos acessos do usuario e informar aqui
			}
		}else $R['Erros'][]=array("Campo"=>"form","Erro"=>"Formulário $form não implementado");
	}
	//envia resposta
	fecha_bd();//libera banco
	if(isset($R['Erros'])&& count($R['Erros'])>0)$R['Resposta']='FALHA';
	echo json_encode($R);
}

function parseUserAgent($ua=false){
	if(!$ua)$ua=$_SERVER['HTTP_USER_AGENT'];
	$r['userAgent']=$ua;
	$dd=new DeviceDetector($ua);
	$dd->parse();
	if($dd->isBot()){
		$r['resumo']="Bot ";
		$botInfo=$dd->getBot();
		foreach($botInfo as $k=>$v)if($v!=''){
			$r['bot_'.$k]=$v;
			$r['resumo'].=" $k:$v";
		}
	}else{
		$r['resumo']="";
		$clientInfo=$dd->getClient();
		foreach($clientInfo as $k=>$v)if($v!='')$r['client_'.$k]=$v;
		$osInfo=$dd->getOs();
		foreach($osInfo as $k=>$v)if($v!='')$r['os_'.$k]=$v;
		if($dd->getDevice()){
			$r['brand']=$dd->getBrandName();
			$r['model']=$dd->getModel();
		}
		$r['smartphone']=$dd->isSmartphone();
		$r['tablet']=$dd->isTablet();
		$r['desktop']=$dd->isDesktop();
		$r['mobile']=$dd->isMobile();
		if($dd->isSmartphone())$r['resumo'].=" Smartphone";
		if($dd->isTablet())$r['resumo'].=" Tablet";
		if($dd->isDesktop())$r['resumo'].=" Desktop";
		if($dd->getDevice())$r['resumo'].=" ".$dd->getBrandName()." ".$dd->getModel();
		$r['resumo'].=" ".$r['os_name']." ".$r['os_version']." ".$r['os_plataform']." ".$r['client_type']." ".$r['client_name']." ".$r['client_version'];
		$r['resumo']=trim(preg_replace('/( )+/', ' ',$r['resumo']));
	}
	return $r['resumo'];
}
function teste(){
	$host=gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$coisas['ip']=$_SERVER['REMOTE_ADDR'];
	$coisas['hostname']=$host;
	$coisas['hash']=hash_cliente();
	$coisas['a']=parseUserAgent("Mozilla/5.0 (Linux; Android 7.1.1; XT1650 Build/NPLS26.118-20-5-3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.73 Mobile Safari/537.36");
	$coisas['b']=parseUserAgent("Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36");
	$coisas['c']=parseUserAgent($_SERVER['HTTP_USER_AGENT']);
	echo "<pre>".print_r($coisas,true)."</pre>";
}

$ses=new bdsessao(true);

$tarefa=false;
$form=false;
if(isset($_GET['tarefa']))$tarefa=$_GET['tarefa'];//tarefa no GET
elseif(isset($_POST['tarefa']))$tarefa=$_POST['tarefa'];//tarefa no POST
elseif(isset($_GET['form']))$form=$_GET['form'];//form no GET
elseif(isset($_POST['form']))$form=$_POST['form'];//form no POST

if($tarefa)switch($tarefa){
	case "info":
		info();
		break;
	case "teste":
		teste();
		break;
	case "checaLogin":
		echo json_encode(checaLogin());
		break;
	case "logout":
		echo json_encode(logout());
		break;
	case "matheus":
		echo json_encode(logout());
		break;
	default:
		echo json_encode($_GET).'  '.json_encode($_POST);
		break;
}elseif($form)form($form);
else echo json_encode($_GET).'  '.json_encode($_POST);


fecha_bd();//fecha banco se ainda estiver aberto
if($GLOBALS['relatar_erros'] && $GLOBALS['relatorio_erros']!='')echo "<pre>Relatório de erros:\n".$GLOBALS['relatorio_erros']."</pre>";//exibe relatório de erros
?>