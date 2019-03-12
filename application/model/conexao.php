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
class conexao extends PDO {

    /**
     * Conexao com o banco de dados
     * @var _conn
     */
    protected $_conn;

    /**
     * Id do registro inserido ou alterado
     * @var _lastId
     */
    public $_lastId;

    /**
     * Quantidade de registros afetados
     * @var _rowAffected
     */
    public $_rowAffected;

    /**
     * Erros
     * @var _errorInfo
     */
    public $_errorInfo;

    public function __construct() {
        $file = 'my_setting.ini';
        if (!$settings = parse_ini_file($file, TRUE))
            throw new exception('Unable to open ' . $file . '.');

        $dns = $settings['database']['driver'] .
                ':host=' . $settings['database']['host'] .
                ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
                ';dbname=' . $settings['database']['schema'] . ';charset=utf8';

        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
        $this->_conn = $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}
