<?php
class MainController{
    public function getSettings(){
        return ['output'=>'OK'];
    }

    public function execute($request, $headers) {
        return ['mensagem' => 'Main Controller'];
    }
}