<?php
class HomeController {
    public function getSettings(){}

    public function execute($request, $headers) {
        return ['message' => 'Home Controller'];
    }
}