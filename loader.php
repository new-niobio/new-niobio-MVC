<?php

// Evita que usuários acesse este arquivo diretamente
if (!defined('ABSPATH'))
    exit;

// Carrega todas as classes sem precisar do require.
spl_autoload_register(function ($class_name) {
    if (file_exists(ABSPATH . '/application/control/' . $class_name . '.php')) {
        require_once (ABSPATH . '/application/control/' . $class_name . '.php');
    } elseif (file_exists(ABSPATH . '/application/model/' . $class_name . '.php')) {
        require_once (ABSPATH . '/application/model/' . $class_name . '.php');
    } elseif (file_exists(ABSPATH . '/application/model/DAO/' . $class_name . '.php')) {
        require_once (ABSPATH . '/application/model/DAO/' . $class_name . '.php');
    } elseif (file_exists(ABSPATH . '/application/view/' . $class_name . '.php')) {
        require_once (ABSPATH . '/application/view/' . $class_name . '.php');
    }
});

// Funções globais
require_once ABSPATH . '/util/Util.php';
