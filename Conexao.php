<?php


class Conexao implements SessionHandlerInterface{

    public function __construct(){        
        $bd;
        $query;
        $host = "localhost";
        $user = 'root';
        $psw = '1234';
        $nome = 'rbteste';

        $manter = $manter ? $manter : $manter = false;	
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
		register_shutdown_function('session_write_close');
    }
    
	public function open($savePath, $sessionName){
		if($this->bd)return true;
		else return false;
    }
    
	public function close(){
		return $this->bd->close();
    }
    
	public function read($Sessao){
		$r='';
		$Sessao = $this->bd->real_escape_string($Sessao);
		$this->query=$this->bd->query("SELECT Dados FROM Sessoes WHERE Sessao='$Sessao' LIMIT 1");
		if(!$this->query)trigger_error("sessao_consulta(): ".$this->bd->error,E_USER_WARNING);//se der erro
		elseif($this->query->num_rows==1){
			$r=$this->query->fetch_assoc();
			$r=$r['Dados'];
        }
        if($this->query && is_object($this->query)){
            $this->query->free();
        }
		return $r;
    }
    
	public function write($Sessao,$Dados){
		$Sessao = $this->bd->real_escape_string($Sessao);
		$r = false;
		$this->query = $this->bd->query("REPLACE INTO Sessoes VALUES('$Sessao',NOW(),'$Dados')");
		if(!$this->query)trigger_error("sessao_consulta(): ".$this->bd->error,E_USER_WARNING);//se der erro
		elseif($this->bd->affected_rows==1)$r=true;
		return $r;
    }
    
	public function destroy($Sessao){
		$Sessao = $this->bd->real_escape_string($Sessao);
		$r=false;
		$this->query=$this->bd->query("DELETE FROM Sessoes WHERE Sessao='$Sessao' LIMIT 1");
		if(!$this->query)trigger_error("sessao_consulta(): ".$this->bd->error,E_USER_WARNING);//se der erro
        elseif($this->bd->affected_rows==1)
            $r = true;
		return $r;
    }
    
	public function gc($max){
        		$r=false;
        		$old=time()-$max;
        		$this->query=$this->db->query("DELETE * FROM Sessoes WHERE Acesso<'$old'");
        		if(!$this->query)trigger_error("sessao_consulta(): ".$this->bd->error,E_USER_WARNING);//se der erro
        		else $r=true;
        		return $r;
		return true;
	}
    
    public function abre_bd(){
        extract($GLOBALS['banco']);
        if(!$bd){
            $bd = new mysqli($host,$user,$psw,$nome);
            $bd->set_charset("utf8");
            $GLOBALS['banco']['bd'] = $bd;
        }
        return $bd;
    }

    public function query($consulta){
        $bd = $this->abre_bd();
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
            if($GLOBALS['banco']['query'] && is_object($GLOBALS['banco']['query'])) $GLOBALS['banco']['query']->free();//libera consulta anterior
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
    
    public function fecha_bd(){
        if($GLOBALS['banco']['query'] && is_object($GLOBALS['banco']['query'])){
            $GLOBALS['banco']['query']->free();
            $GLOBALS['banco']['query']=false;
        }
        if($GLOBALS['banco']['bd'] && is_object($GLOBALS['banco']['bd'])){
            $GLOBALS['banco']['bd']->close();
            $GLOBALS['banco']['bd']=false;
        }
    } 
}   
?>