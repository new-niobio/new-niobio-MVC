<?php

class usuarios extends DAO {

    function __construct() {
        $this->_table = "usuarios";
        parent::__construct();
    }

    public function setObjetctDAO($array) {
        $array['senha'] = empty($array['senha']) ? '' : md5($array['senha']);
        parent::setObjetctDAO($array);
    }

}
