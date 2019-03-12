<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class PublicController extends CrudController {

    public function __construct($parameters) {
        $this->headTitle = NAMESYSTEM;
        $this->folder = $parameters->url_controlName;
        $this->page = $parameters->url;
        $this->public = $parameters->public;
    }
    
    public function index() {
        return new ViewModel($this);
    }

}
