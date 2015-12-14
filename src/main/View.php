<?php
/**
 * Direciona para o template requisitado
 * @author Marcelo Oliveira <marcelo@marceloweb.info>
 */

class View {

    public static function render($template, $response) {
        include "templates/{$template}.phtml";
    }

}
