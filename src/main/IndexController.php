<?php

class IndexController {
    
    public static function index() {
        $model = new Model();
        $response = $model->get();
        return View::render('index', $response);
    }
}