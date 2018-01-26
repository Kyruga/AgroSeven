<?php

namespace Data\Entidades;

class BaseEntidade
{
    public function __construct($array = null) {

       if(!is_null($array)) {
           foreach($array as $key => $value) {
               if(property_exists($this, $key)) {
                    if(!is_numeric($value)) {
                        $value = self::Verificar_String_Sem_Sql($value);
                    }

                    $this->$key = $value;
               }               
           }            
       }
       
       if(property_exists($this, 'id') && $this->id == null) {
           $this->id = 0;
       }
    }

    public static function NormalizeParametros($string) {

        $string = str_replace(' - ','-', $string);
        $string = str_replace(' ','-',$string);
        $string = str_replace('.','',$string);
        $string = str_replace(',','',$string);
        $string = str_replace('?','',$string);
        $string = str_replace('!','',$string);
        $string = str_replace(';','',$string);
        $string = str_replace('|','',$string);
        $string = str_replace('(','',$string);
        $string = str_replace(')','',$string);
        $string = str_replace('[','',$string);
        $string = str_replace(']','',$string);
        $string = str_replace('{','',$string);
        $string = str_replace('}','',$string);
        $string = str_replace('%','',$string);
        $string = str_replace('&','',$string);
        $string = str_replace('*','',$string);
        $string = str_replace('_','-',$string);
        $string = str_replace('$','',$string);
        $string = str_replace('#','',$string);
        $string = str_replace('+','',$string);
        $string = str_replace('§','',$string);
        $string = str_replace('@','',$string);
        $string = str_replace('/','',$string);
        $string = str_replace('\\','',$string);
        $string = str_replace("'",'',$string);
        $string = str_replace('"','',$string);
        $string = str_replace('ª','',$string);
        $string = str_replace('º','',$string);
        $string = str_replace('°','',$string);
        $string = str_replace('ã','a',$string);
        $string = str_replace('á','a',$string);
        $string = str_replace('à','a',$string);
        $string = str_replace('â','a',$string);
        $string = str_replace('ä','a',$string);
        $string = str_replace('é','e',$string);
        $string = str_replace('è','e',$string);
        $string = str_replace('ê','e',$string);
        $string = str_replace('ë','e',$string);
        $string = str_replace('í','i',$string);
        $string = str_replace('ì','i',$string);
        $string = str_replace('ï','i',$string);
        $string = str_replace('õ','o',$string);
        $string = str_replace('ó','o',$string);
        $string = str_replace('ò','o',$string);
        $string = str_replace('ö','o',$string);
        $string = str_replace('ô','o',$string);
        $string = str_replace('ú','u',$string);
        $string = str_replace('ù','u',$string);
        $string = str_replace('ü','u',$string);
        $string = str_replace('ç','c',$string);
        $string = str_replace('--','-',$string);
        
        return strtolower($string);
    }

    public static function Verificar_String_Sem_Sql($string) {
        
        $string = str_replace('*','',$string);        
        $string = str_replace("'",'',$string);
        $string = str_replace('"','',$string);  
        
        $sqltext = strtolower($string);

        $invalidText = "Esse text aparenta ter palavras inválidas! Verifique sua ortografia.";

        if(strpos($sqltext,'select') !== false) {
            throw new \Exception($invalidText);
        }
        if(strpos($sqltext,'update') !== false) {
            throw new \Exception($invalidText);
        }
        if(strpos($sqltext,'insert') !== false) {
            throw new \Exception($invalidText);
        }
        if(strpos($sqltext,'delete') !== false) {
            throw new \Exception($invalidText);
        }
        
        return $string;
    }
}