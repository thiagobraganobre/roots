<?php


$rotas = [
    'GET /' => new MainController(),
    'GET /login' => new LoginController(),
    'GET /beneficio' => new Rh_BeneficioController(),
    'GET /home' => new Rh_BeneficioController(),
    // Adicione mais rotas conforme necessário
];
