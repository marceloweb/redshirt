<?php

class View {

    public static function render($template, $response) {
        include "templates/{$template}.phtml";
    }

}
