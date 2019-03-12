<?php

class example extends DAO {

    function __construct() {
        parent::__construct();
        $this->_table = "example";
    }

    public function getItens($indice = null) {
        $array = array(
            '1' => 'item 1',
            '2' => 'item 2',
            '3' => 'item 3',
            '4' => 'item 4',
            '5' => 'item 5',
            '6' => 'item 6',
        );
        if ($indice != null && $indice != '') {
            return $array[$indice];
        } else {
            return $array;
        }
    }

    public function getObjetctDAO($objectDAO = null) {
        $this->objectDAO = parent::getObjetctDAO($objectDAO);
        if (isset($objectDAO)) {
            $this->objectDAO['date_full'] = inverteData($objectDAO['date_full']);
            $this->objectDAO['date_small'] = inverteData($objectDAO['date_small']);
            $this->objectDAO['date_small'] = dateFulltoSmall($objectDAO['date_small']);
            $this->objectDAO['value_decimal'] = newNumber_format($objectDAO['value_decimal'], 2, ',', '.');
            $this->objectDAO['value_select_text'] = $this->getItens($objectDAO['value_select']);
        }
        return $this->objectDAO;
    }

    public function setObjetctDAO($array) {
        $this->objectDAO = parent::setObjetctDAO($array);
        limpaMascara($this->objectDAO['cpf']);
        inverteData($this->objectDAO['date_full']);
        dateSmalltoFull($this->objectDAO['date_small']);
        inverteData($this->objectDAO['date_small']);
        converteMoedaBanco($this->objectDAO['value_int']);
        converteMoedaBanco($this->objectDAO['value_decimal']);

        return $this->objectDAO;
    }

}
