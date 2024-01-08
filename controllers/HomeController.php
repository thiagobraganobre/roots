<?php
class HomeController {
    public function getSettings(){}

    public function execute($request, $headers) {
        return ['mensagem' => 'Home Controller'];
    }
}