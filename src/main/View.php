<?php

class View {

    public static function render($template) {
        include "templates/{$template}.phtml";
    }

}
