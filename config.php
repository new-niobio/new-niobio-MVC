<?php

/**
 * Configuração geral
 */
// Caminho para a raiz
define('NAMESYSTEM', "Controle de Despesas");

// Caminho para a raiz
define('ABSPATH', dirname(__FILE__));

// Caminho para a views
define('ABS_VIEW', ABSPATH . '/application/view/');

// Caminho para a pasta public
define('ABS_PUBLIC', ABSPATH . '/public/');

define('PROTOCOLO', 'http://');

define('PUBLIC_SRC', PROTOCOLO . 'localhost/php_MVC/public/');

define('ADMIN_SRC',  PROTOCOLO . 'localhost/php_MVC/admin/');

// Nome para acessar o modulo application. Ex: admin
define('APP_NAME', 'admin');

define('MSGM_SUCCESS', 'Registro salvo com sucesso!');

define('MSGM_DANGER', 'Não foi possivel salvar o registro');




//ANTIGOS
// Caminho para a pasta de uploads
define('UP_ABSPATH', ABSPATH . '/views/_uploads');

// Nome do host da base de dados
define('HOSTNAME', 'localhost');

// Nome do DB
define('DB_NAME', 'tutsup');

// Usuário do DB
define('DB_USER', 'root');

// Senha do DB
define('DB_PASSWORD', '');

// Charset da conexão PDO
define('DB_CHARSET', 'utf8');

// Se você estiver desenvolvendo, modifique o valor para true
define('DEBUG', true);

session_start();
$logado = isset($_SESSION[APP_NAME]['logado']) ? true : false;
//$logado = true;
define('logado', $logado);

$array['ABSPATH'] = ABSPATH;
$array['ABS_VIEW'] = ABS_VIEW;
$array['ABS_PUBLIC'] = ABS_PUBLIC;
$array['APP_NAME'] = APP_NAME;
$array['logado'] = logado;
