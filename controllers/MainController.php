<?php
class MainController{
    public function getSettings(){
        return ['output'=>'OK'];
    }

    public function execute($request, $headers) {
        return ['message' => 'Main Controller'];
    }
}