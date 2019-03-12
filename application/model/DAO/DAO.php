<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexao
 *
 * @author Leandro
 */
class DAO extends funcoes {

    /**
     * Array do objeto que é pego pelas colunas do banco
     * @var _primitiveObjectDAO
     */
    private $_primitiveObjectDAO;

    /**
     * Array do objeto
     * @var objectDAO
     */
    public $objectDAO;

    function get_primitiveObjectDAO() {
        if (!isset($this->_primitiveObjectDAO)) {
            $query = $this->query("SHOW COLUMNS FROM {$this->_table}");
            $this->_primitiveObjectDAO = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $this->_primitiveObjectDAO;
    }

    public function getObjetctDAO($objetct = null) {
        foreach ($this->get_primitiveObjectDAO() as $value) {
            $this->objectDAO[$value['Field']] = $objetct[$value['Field']];
        }

        if (array_key_exists('ativo', $this->objectDAO) && $objetct != null ) {
            switch (intval($this->objectDAO['ativo'])) {
                case 1:
                    $this->objectDAO['ativo_desc'] = 'Ativo';
                    break;
                case 0:
                    $this->objectDAO['ativo_desc'] = 'Inativo';
                    break;
                default:
                    $this->objectDAO['ativo_desc'] = '';
                    break;
            }
        }

        return $this->objectDAO;
    }

    public function setObjetctDAO($array) {
        $this->objectDAO = $this->getObjetctDAO();
        foreach ($array as $key => $value) {
            if ($value == '' || $value == null) {
                unset($this->objectDAO[$key]);
            } elseif (array_key_exists($key, $this->objectDAO)) {
                $this->objectDAO[$key] = $value;
            }
        }
        if (array_key_exists('hash_id', $this->objectDAO) && (!array_key_exists('id', $array))) {
            setHashId($this->objectDAO['hash_id']);
            unset($this->objectDAO['id']);
        } else {
            unset($this->objectDAO['hash_id']);
        }
        return array_filter($this->objectDAO, function($value) {
            return ($value !== null && $value !== '');
        });
    }

}
