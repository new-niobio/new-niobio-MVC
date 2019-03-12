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
class funcoes extends conexao {

    public function find($id) {
        $query = $this->query("SELECT * FROM {$this->_table} WHERE id = $id");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->getObjetctDAO($array[0]);
    }

    public function findHash($hash) {
        $query = $this->query("SELECT * FROM {$this->_table} WHERE hash_id = '$hash'");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->getObjetctDAO($array[0]);
    }

    public function findAll() {
        $query = $this->query("SELECT * FROM {$this->_table}");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            for ($i = 0; $i < count($result); $i++) {
                $result[$i] = $this->getObjetctDAO($result[$i]);
            }
        }
        return $result;
    }

    public function execute($sql) {
        $query = $this->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar() {
        $this->_errorInfo = null;
        $this->_rowAffected = null;
        $this->_lastId = null;

        $colunas = array();
        $valores = array();
        $colunasValores = array();

        foreach ($this->objectDAO as $key => $value) {
            $colunas[] = $key;
            $valores[] = "'" . $value . "'";
            $colunasValores[] = $key . '=' . "'" . $value . "'";
        }

        $st_colunas = implode(", ", $colunas);
        $st_valores = implode(", ", $valores);
        $st_colunasValores = implode(", ", $colunasValores);

        $sql = "INSERT INTO {$this->_table} ($st_colunas) 
                VALUES($st_valores)
                ON DUPLICATE KEY UPDATE  $st_colunasValores";

        $action = $this->prepare($sql);
        if ($action->execute()) {
            $this->_rowAffected = $action->rowCount();
            $this->_lastId = (isset($this->objectDAO['id']) && $this->objectDAO['id'] > 0) ? $this->objectDAO['id'] : $this->lastInsertId();
            return true;
        } else {
            $this->_errorInfo = $action->errorInfo();
            return false;
        }
    }

    public function deleteHash($hash) {
        $action = $this->prepare("DELETE FROM {$this->_table} WHERE hash_id = '$hash'");
        if ($action->execute()) {
            return $this->_rowAffected = $action->rowCount();
        } else {
            throw new Exception("Houve um erro ao excluir o registro");
        }
    }

}
