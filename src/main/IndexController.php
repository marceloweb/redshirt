<?php

class IndexController {

    public static function index() {
        $model = new Model();
        $response = $model->get();
        return View::render('index', $response);
    }

    public static function uf() {
        $model = new Model();
        $response = $model->uf();

        print_r(json_encode($response));
    }

    public static function city($id) {
        $model = new Model();
        $response = $model->city($id);

        print_r(json_encode($response));
    }
    
    public static function save() {
        print_r($_POST); exit;
        
        $model = new Model();
        $model->save($data);
        
        $response = $model->get();
        return View::render('index', $response);
    }

}
