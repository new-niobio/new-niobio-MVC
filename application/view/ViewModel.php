<?php

class ViewModel {

    /**
     * View $variables
     * @var CrudController
     */
    protected $controller;

    /**
     * View $data
     * @var array
     */
    protected $data = array();

    /**
     * View $options
     * @var array
     */
    protected $options = array();

    /**
     * View $options
     * @var array
     */
    public $mensagem = '';

    /**
     * Constructor
     *
     * @param  array $options
     * @param  array $data
     * @param  CrudController $controller
     */
    public function __construct($controller, $data = null, $options = null) {

        $this->controller = $controller;
        $this->data = $data;
        $this->options = $options;
        $this->mensagem = $controller->GetMensagem();
        $this->getView();
    }

    public function getView() {
        if ($this->controller->public) {
            require_once ABS_PUBLIC . 'layout.php';
        } else {
            require ABS_VIEW . 'layout.php';
        }
    }

}
