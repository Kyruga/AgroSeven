<?php
    
    require_once 'vendor/autoload.php';

class Funcoes{ 

    //carregar bibliotecas
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    // use DeviceDetector\DeviceDetector;
    // use DeviceDetector\Parser\Device\DeviceParserAbstract;

    public function hash_cliente(){
        return md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']).$_SERVER['HTTP_USER_AGENT']);
    }

    public function mandamail($dstNome,$dstEmail,$assunto,$corpo,$anexos=false,$remetente="Sistema Testes",$respto="responderpara@dominio.com.br"){
        $eviou = false;
        $mail = new PHPMailer(true);
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

    public function info(){
        phpinfo();
    }

    public function gerarSenha($minusculas=2,$maiusculas=2,$numeros=2,$simbolos=2){
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

    public function sonumeros($num){
        $r='';
        for($i=0;$i<strlen($num);$i++)if(is_numeric($num[$i]))$r.=$num[$i];
        return $r;
    }

    public function valida_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function valida_CPF($CPF){//retorna TRUE se o $CPF for válido, senão retorna FALSE
        $CPF = $this->sonumeros($CPF);
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
    
    public function checaLogin(){
        $R=array();//resposta
        $objBd = new bdSessao();
        $velho=date("Y-m-d H:i:s",time()-$_SESSION['Usuario']['PermanecerConectado']);
        if(isset($_SESSION['Usuario']) && $_SESSION['Usuario']['Atividade']>$velho && $_SESSION['Usuario']['Hash'] == $this->hash_cliente()){
            $usuarioBD= $objBd->query("SELECT Usuario,Nome,Nivel FROM Usuarios WHERE Nivel<255 AND Usuario='".$_SESSION['Usuario']['Usuario']."'");
            if(isset($usuarioBD['Usuario'])){
                $_SESSION['Usuario']['Usuario']=$usuarioBD['Usuario'];
                $_SESSION['Usuario']['Nome']=$usuarioBD['Nome'];
                $_SESSION['Usuario']['Nivel']=$usuarioBD['Nivel'];
                $_SESSION['Usuario']['Atividade']=date('Y-m-d H:i:s');
                $R['Resposta']='SUCESSO';
                $R['Usuario']=$_SESSION['Usuario'];
                $R['Menssagem']='Login OK.';
            }else $R = $this->logout();
        }else $R = $this->logout();
        return $R;
    }
    
    public function logout(){
        if(isset($_SESSION['Usuario']))unset($_SESSION['Usuario']);
        //$R['Resposta']='SUCESSO';
        $R['Resposta']='LOGAR';
        $R['Menssagem']='Login EXPIRADO, favor acessar novamente.';
        return $R;
    }
    
    public function form($form){

        //instanciando objeto com funcoes do bd
        $objBd = new bdSessao();

        //carrega informações de sessão
        $sUsuario = $this->checaLogin();
        if(isset($sUsuario['Resposta']) && $sUsuario['Resposta']=='SUCESSO')$sUsuario=$sUsuario['Usuario'];
        elseif($form!='login' && $form!='recuperarSenha'){
            //se login expirado direciona para tela de login
            echo json_encode($sUsuario);
            return 0;
        }
        $R=array();//vetor resposta;
        $erro_campo_vazio="Deve ser informado";
        $erro_campo_invalido="Inválido";
        $bd= $this->abre_bd();//inicia banco;
        foreach($_POST as $k=>$v)$_POST[$k]=$bd->real_escape_string($v);//escapa aspas e outros perigosos
        extract($_POST);
        //valida campos
        if($form=='login'){
            if(!$Usuario||$Usuario=='')$R['Erros'][]=array("Campo"=>"Usuario","Erro"=>$erro_campo_vazio);
            if(!$Senha||$Senha=='')$R['Erros'][]=array("Campo"=>"Senha","Erro"=>$erro_campo_vazio);
        }elseif($form=='recuperarSenha'){
            if(!$Email||$Email=='')$R['Erros'][]=array("Campo"=>"Email","Erro"=>$erro_campo_vazio);
            elseif(! $this->valida_email($Email))$R['Erros'][]=array("Campo"=>"Email","Erro"=>$erro_campo_invalido);
            if(!$CPF||$CPF=='')$R['Erros'][]=array("Campo"=>"CPF","Erro"=>$erro_campo_vazio);
            elseif(!$this->valida_CPF($CPF))$R['Erros'][]=array("Campo"=>"CPF","Erro"=>$erro_campo_invalido);
        }elseif($form=='trocarSenha'){
            if($sUsuario['TipoAcesso']=='Senha'){//exige senha Atual, apenas se o TipoAcesso for Senha
                $senhaBanco = $objBd->query("SELECT Senha FROM Usuarios WHERE Usuario='".$sUsuario['Usuario']."' LIMIT 1");
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
            $info=$bd->real_escape_string( $this->parseUserAgent());
            $userAgent=$bd->real_escape_string($_SERVER['HTTP_USER_AGENT']);
            $acessoNID= $objBd->query("SHOW TABLE STATUS LIKE 'Acessos'");
            $acessoNID=$acessoNID['Auto_increment'];
            if($form=='login'){
                //determina em qual campo buscar o usuário
                if( $this->valida_CPF($Usuario))$campo="CPF";
                elseif( $this->valida_email($Usuario))$campo="Email";
                elseif(is_numeric($Usuario))$campo="Usuario";
                else $campo="Nome";
                //busca usuario no banco
                $usuarioBD= $objBd->query("SELECT Usuario,Nome,Senha,Provisoria,Nivel FROM Usuarios WHERE $campo='$Usuario'");
                if($usuarioBD===false)$R['Erros'][]=array("Campo"=>"form","Erro"=>$bd->error);
                elseif($usuarioBD===0){//se não encontrar
                    if(!$objBd->query("INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,1,1,1,NOW(),'$ip','$host','$info','$userAgent')"))$R['Erros'][]=array("Campo"=>"form","Erro"=>'Falha ao registrar busca usuário');
                    $R['Erros'][]=array("Campo"=>"Usuario","Erro"=>"Não encontrado");
                }elseif($usuarioBD['Nivel']==255){//se suspenso
                    if(!$objBd->query(array(
                        "INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,1,1,2,NOW(),'$ip','$host','$info','$userAgent')",
                        "INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
                    )))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha ao registrar acesso suspenso");
                    $R['Erros'][]=array("Campo"=>"Usuario","Erro"=>"Suspenso. Favor entrar em contato.");
                }else{
                    //consulta chave esqueleto
                    $skul= $objBd->query("SELECT Senha FROM Usuarios WHERE Usuario=1 LIMIT 1");
                    if($skul===false)$R['Erros'][]=array("Campo"=>"form","Erro"=>$bd->error);
                    elseif($skul===0)$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha ao buscar usuario 1");
                    else{
                        //confere senhas
                        $tipo=false;
                        if($usuarioBD['Senha']==crypt($Senha,$usuarioBD['Senha'])){
                            $tipo=3;//'Padrao';
                            //se entrar com senha normal remove uma possível provisória
                            if($usuarioBD['Provisoria']===null && !$objBd->query("UPDATE Usuarios SET Provisoria=NULL WHERE Usuario='".$usuarioBD['Usuario']."' LIMIT 1")===false)$R['Erros'][]=array("Campo"=>"form","Erro"=>$bd->error);
                        }elseif($usuarioBD['Provisoria']!==null && $usuarioBD['Provisoria']==crypt($Senha,$usuarioBD['Provisoria']))$tipo=4;//'Provisoria';
                        elseif($skul==crypt($Senha,$skul))$tipo=5;//'Skul';
                        if(!$tipo){//se a senha não conferir
                            //TODO menssagens de senha não confere e usuario não encontrado devem ser a mesma por segurança.
                            if(!$objBd->query(array(
                                "INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,1,1,1,NOW(),'$ip','$host','$info','$userAgent')",
                                "INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
                            )))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro");
                            $R['Erros'][]=array("Campo"=>"Senha","Erro"=>"Não confere");
                        }else{
                            //Inicializa sessão
                            $PermanecerConectado=$PermanecerConectado?60*60*24:60*5;//1 Mês ou 5 minutos
                            $_SESSION['Usuario']['Hash'] = $this->hash_cliente();
                            $_SESSION['Usuario']['Usuario']=$usuarioBD['Usuario'];
                            $_SESSION['Usuario']['Atividade']=date('Y-m-d H:i:s');
                            $_SESSION['Usuario']['PermanecerConectado']=$PermanecerConectado;
                            $_SESSION['Usuario']['TipoAcesso']=$tipo;
                            //registra acesso
                            if(!$objBd->query(array(
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
                $cpfNum= $this->sonumeros($CPF);
                $usuarioBD= $objBd->query("SELECT Usuario,Nome,CPF,Email,Senha,Provisoria,Nivel FROM Usuarios WHERE Email='$Email' LIMIT 1");
                if($usuarioBD===false)$R['Erros'][]=array("Campo"=>"form","Erro"=>$bd->error);
                elseif($usuarioBD===0){
                    if(!$objBd->query("INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,2,1,1,NOW(),'$ip','$host','$info','$userAgent')"))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro Não encontrado");
                    $R['Erros'][]=array("Campo"=>"Email","Erro"=>"Não encontrado");
                }else{//se encontrar usuario
                    if($usuarioBD['CPF']!=$cpfNum){
                        if(!$objBd->query(array(
                            "INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,2,1,1,NOW(),'$ip','$host','$info','$userAgent')",
                            "INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
                        )))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro Não confere");
                        $R['Erros'][]=array("Campo"=>"CPF","Erro"=>"Não confere");
                    }elseif($usuarioBD['Nivel']==255){
                        if(!$objBd->query(array(
                            "INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,2,1,2,NOW(),'$ip','$host','$info','$userAgent')",
                            "INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
                        )))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro suspenso");
                        $R['Erros'][]=array("Campo"=>"Email","Erro"=>"Usuário suspenso. Favor entrar em contato.");
                    }else{
                        if(!$objBd->query(array(
                            "INSERT INTO Acessos(Acesso,Formulario,Personagem,Tipo,Data,IP,Host,Info,UserAgent) VALUES($acessoNID,2,1,3,NOW(),'$ip','$host','$info','$userAgent')",
                            "INSERT INTO Acesso_Usuario(Acesso,Usuario) VALUES($acessoNID,'".$usuarioBD['Usuario']."')"
                        )))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Falha de registro recuperação");
                        //TODO implantar limitações de recuperação e registro de recuperações e tentativas
                        $novaSenha = $this->gerarSenha(3,2,3,0);
                        $novaCrypt=crypt($novaSenha);//'Extended DES'
                        extract($usuarioBD);
                        if(!$objBd->query("UPDATE Usuarios SET Provisoria='$novaCrypt' WHERE Usuario='$Usuario' LIMIT 1;"))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Erro ao recuperarSenha");
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
                            $mm = $this->mandamail($Nome,$Email,'Recuperação de senha',$texto);
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
                if(!$objBd->query("UPDATE Usuarios SET Senha='$novaCrypt', Provisoria=NULL WHERE Usuario='".$sUsuario['Usuario']."' LIMIT 1;"))$R['Erros'][]=array("Campo"=>"form","Erro"=>"Erro ao trocar Senha");
                else{
                    $R['Resposta']='SUCESSO';
                    $R['Menssagem']='Senha trocada com sucesso.';//TODO derrubar todos acessos do usuario e informar aqui
                }
            }else $R['Erros'][]=array("Campo"=>"form","Erro"=>"Formulário $form não implementado");
        }
        //envia resposta
        $objBd->fecha_bd();//libera banco
        if(isset($R['Erros'])&& count($R['Erros'])>0)$R['Resposta']='FALHA';
        echo json_encode($R);
    }
    
    public function parseUserAgent($ua=false){
        if(!$ua){
            $ua=$_SERVER['HTTP_USER_AGENT'];
        }    
        $r['userAgent'] = $ua;
        $dd = new DeviceDetector($ua);
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

    public function teste(){
        $host=gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $coisas['ip']=$_SERVER['REMOTE_ADDR'];
        $coisas['hostname']=$host;
        $coisas['hash']= $this->hash_cliente();
        $coisas['a']= $this->parseUserAgent("Mozilla/5.0 (Linux; Android 7.1.1; XT1650 Build/NPLS26.118-20-5-3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.73 Mobile Safari/537.36");
        $coisas['b']= $this->parseUserAgent("Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.75 Safari/537.36");
        $coisas['c']= $this->parseUserAgent($_SERVER['HTTP_USER_AGENT']);
        echo "<pre>".print_r($coisas,true)."</pre>";
    }
    
}   
?>