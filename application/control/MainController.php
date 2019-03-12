<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class MainController {

    /**
     * $url
     *
     * Receberá a URL.
     * exemplo.com/controlador/
     *
     * @access public
     */
    public $url;

    /**
     * $url_controlName
     *
     * Receberá o nome do controlador.
     * exemplo.com/CONTROLADOR/
     *
     * @access public
     */
    public $url_controlName;

    /**
     * $controlName
     *
     * Receberá o valor do controlador (Vindo da URL).
     * exemplo.com/controlador/
     *
     * @access private
     */
    public $controlName;

    /**
     * $view
     *
     * Objeto ViewModel
     * Passa pela janelas de visualização
     *
     * @access private
     */
    private $view;

    /**
     * $control
     *
     * Objeto controle
     * new xxxController()
     *
     * @access private
     */
    private $control;

    /**
     * $acao
     *
     * Receberá o valor da ação (Também vem da URL):
     * exemplo.com/controlador/acao
     *
     * @access private
     */
    public $acao;

    /**
     * $parametros
     *
     * Receberá um array dos parâmetros (Também vem da URL):
     * exemplo.com/controlador/acao/param1/param2/param50
     *
     * @access public
     */
    public $parametros;

    /**
     * $public
     *
     * Seta a variavel se utilizar o modulo aplication, caso chamando o admin
     * exemplo.com/ADMIN/controlador/acao/param1/param2/param50
     *
     * @access public
     */
    public $public;

    /**
     * $content
     *
     * Todo conteúdo HTML
     *      *
     * @access public
     */
    public $content;

    /**
     * Construtor para essa classe
     *
     * Obtém os valores do controlador, ação e parâmetros. Configura 
     * o controlado e a ação (método).
     */
    public function __construct() {
        $this->controlName = 'PublicController';
        $this->url = 'index';
        $this->url_controlName = 'public';
        $this->acao = 'index';
        $this->public = true;
    }

    /**
     * Obtém parâmetros de $_GET['path']
     *
     * Obtém os parâmetros de $_GET['path'] e configura as propriedades 
     * $this->controlador, $this->acao e $this->parametros
     *
     * A URL deverá ter o seguinte formato:
     * http://www.example.com/controlador/acao/parametro1/parametro2/etc...
     */
    private function get_control() {

        // Verifica se o parâmetro path foi enviado
        if (isset($_GET['path'])) {

            // Captura o valor de $_GET['path']
            $path = $_GET['path'];
            $this->url = $path;

            // Limpa os dados
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);

            // Cria um array de parâmetros
            $path = explode('/', $path);
            $appName = preg_replace('/[^a-zA-Z]/i', '', $path[0]);


            if ($appName == APP_NAME) {
                $this->public = false;

                if (logado) {
                    $this->controlName = 'AdminController';
                    $this->url_controlName = 'home';

                    if (isset($path[1])) {
                        $url_control = preg_replace('/[^a-zA-Z]/i', '', $path[1]);
                        $controller = isset($path) ? ucfirst($url_control) . 'Controller' : 'AdminController';
                        if (file_exists(ABSPATH . '/application/control/' . $controller . '.php')) {

                            $this->controlName = $controller;
                            $this->url_controlName = $url_control;

                            if (isset($path[2]))
                                $this->acao = preg_replace('/[^a-zA-Z]/i', '', $path[2]);

                            // Configura os parâmetros
                            if (chk_array($path, 3)) {

                                // Os parâmetros sempre virão após a ação
                                $this->parametros = $path[3];
                            }
                        } else {
                            $this->acao = 'notFound';
                        }
                    } else {
                        $this->acao = 'index';
                    }
                } else {
                    $this->controlName = 'AuthController';
                    $this->url_controlName = 'login';
                    $this->acao = 'index';
                    if (isset($path[2]) && $path[2] == 'login') {
                        $this->acao = 'login';
                    }
                }
            }
        }
        $this->control = new $this->controlName($this);
        if (method_exists($this->control, $this->acao)) {
            $this->control->{$this->acao}();
        } else {
            $this->control->notFound();
        }
    }

    public function run() {

        $this->get_control();

        return;
    }

}
