<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class AdminController extends CrudController {

    public function index() {
        return new ViewModel($this);
    }

}
