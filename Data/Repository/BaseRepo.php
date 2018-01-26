<?php

namespace Data\Repository;

class BaseRepo
{
    /**
     * Configura um objeto bean simples
     * 
     * @param string $tableName Nome da tabela para se criar um bean do tipo correspondente
     * @param array $array Os array dos dados originados de uma chamada ajax
     * 
     * @return OODBBean
     */
    public static function SetSingleTable($typeParent, $array) {
        $bean = \R::dispense($typeParent);

        foreach($array as $key => $value) {
            if(!is_array($value)) {
                $bean->$key = $value;
            }                                    
        }

        return $bean;
    }
    /**
     * Configura um objeto bean composto de um relacionamento de um para muitos (one to many)
     * 
     * @param string $tableName Nome da tabela para se criar um bean do tipo correspondente
     * @param array $array Os array dos dados originados de uma chamada ajax
     * 
     * @return OODBBean
     */
    public static function SetOneToManyTable($typeParent, $arrayParent, $typeChild, $arrayChild) {
        
        $bean = \R::dispense($typeParent);    

        foreach($arrayParent as $key => $value) {
            if(!is_array($value)) {
                $bean->$key = $value;
            }                        
        }

        foreach($arrayChild as $key => $value) {
            
            $beanChild = BaseRepo::SetSingleTable($typeChild, $value);

            $id = \R::store($beanChild);
            
            $listName = 'own' . ucfirst($typeChild) . 'List';
    
            $bean->$listName[] = $beanChild;
        }

        return $bean;
    } 
    /**
     * Cria uma tabela Filha relacionando ela com a tabela pai de um relacionamento de muitos para um
     * 
     * @param $typeChild O tipo do bean filho usado na pesquisa, nome da Tabela
     * @param $objChild Os valores que são inserido dentro da condição where na tabela filho
     * @param $typeParent O tipo do bean pai usado na pesquisa, nome da Tabela
     * @param $objParent Os valores que são inserido dentro da condição where na tabela pai
     * 
     * @return int
     */
    public static function SetManyToOneTable($typeChild, $objChild, $typeParent, $objParent) {
        $bean = \R::dispense($typeParent);

        foreach($objParent as $key => $value) {
            if(!is_array($value)) {
                $bean->$key = $value;
            }                        
        }

        $beanChild = BaseRepo::SetSingleTable($typeChild, $objChild);

        $id = \R::store($beanChild);

        $beanChild->id = $id;
        
        $beanChild->$typeParent = $bean;

        return $beanChild;
    }
    /**
     * Salva uma tabela que não possui relacionamentos
     * 
     * @param $type O tipo do bean usado na pesquisa, nome da Tabela
     * @param $objArray Os valores que são inserido dentro da condição where
     * 
     * @return int
     */
    public function Save($type, $objArray) {
        
        $bean = self::SetSingleTable($type,$objArray);            

        return \R::store($bean);
    }
    /**
     * Salva uma tabela que possui um relacionamento de um para muitos
     * 
     * @param $typeParent O tipo do bean pai usado na pesquisa, nome da Tabela
     * @param $objParent Os valores que são inserido dentro da condição where na tabela pai
     * @param $typeChild O tipo do bean filho usado na pesquisa, nome da Tabela
     * @param $objChild Os valores que são inserido dentro da condição where na tabela filho
     * 
     * @return int
     */
    public function SaveWithMany($typeParent, $objParent, $typeChild, $objChild) {
        
        $bean = self::SetOneToManyTable($typeParent,$objParent,$typeChild,$objChild);          

        return \R::store($bean);
    }
    /**
     * Salva uma tabela que pertence à uma tabela fila(o outro lado de um relacionamento de um para muitos)
     *      
     * @param $typeChild O tipo do bean filho usado na pesquisa, nome da Tabela
     * @param $objChild Os valores que são inserido dentro da condição where na tabela filho
     * @param $typeParent O tipo do bean pai usado na pesquisa, nome da Tabela
     * @param $objParent Os valores que são inserido dentro da condição where na tabela pai
     * 
     * @return int
     */
    public function SaveWithParent($typeChild, $objChild, $typeParent, $objParent) {
        $bean = self::SetManyToOneTable($typeChild,$objChild,$typeParent,$objParent);

        return \R::store($bean);
    }
    /**
     * Salva uma tabela que possui um relacionamento de muitos para muitos
     * 
     * @param $typeParent O tipo do bean pai usado na pesquisa, nome da Tabela
     * @param $objParent Os valores que são inserido dentro da condição where na tabela pai
     * @param $typeChild O tipo do bean filho usado na pesquisa, nome da Tabela
     * @param $objChild Os ids da tabela filha que serão relacionados ao Pai
     * 
     * @return int
     */
    public function SaveWithManyToMany($typeParent, $objParent, $typeChild, $objChild) {
        
        $bean = \R::dispense($typeParent);    

        foreach($objParent as $key => $value) {
            if(!is_array($value)) {
                $bean->$key = $value;
            }                        
        }

        $beanChildList = \R::batch($typeChild, $objChild);

        $listName = 'shared' . ucfirst($typeChild);

        $bean->$listName = $beanChildList;

        return \R::store($bean);
    }
    /**
     * Retorna o o bean do tipo correspondente ao id
     * 
     * @param string $type O tipo do bean usado na pesquisa, nome da Tabela
     * @param int $id O codigo correspondente do bean a ser encontrado
     * 
     * @return OODBBean
     */
    public function GetById($type, $id) {
        return \R::load($type, $id);
    }
    /**
     * FindOne retorna o primeiro resultado de acordo com a condição
     * 
     * @param string $type O tipo do bean usado na pesquisa, nome da Tabela
     * @param string $where A condição sql que é escrita após o where
     * @param array $array Os valores que são inserido dentro da condição where
     * 
     * @return OODBBean
     */
    public function FindOne($type, $where, $array) {
        return \R::findOne($type,$where,$array);
    }
    /**
     * Retorna uma lista array de resultados de acordo com a condição
     * 
     * @param string $type O tipo do bean usado na pesquisa, nome da Tabela
     * @param string $where A condição sql que é escrita após o where
     * @param array $array Os valores que são inserido dentro da condição where
     * 
     * @return array $type O tipo do bean usado na pesquisa, nome da Tabela
     * 
     * @return array
     */
    public function FindBy($type, $where, $array) {
        return \R::find($type,$where,array($values));
    }
    /**
     * Busca todos os elementos do tipo correspondente a tabela
     * 
     * @param string $type O tipo do bean usado na pesquisa, nome da Tabela
     * 
     * @return array
     */
    public function GetAll($type) {
        return \R::getAll('select * from ' . $type);
    }

    public function Delete($type, $id) {
        return null;
    }
}