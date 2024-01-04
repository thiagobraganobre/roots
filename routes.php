<?php


$rotas = [
    'GET /' => new MainController(),
    'POST /login' => new LoginController(),
    'GET /beneficio' => new Rh_BeneficioController(),
    // Adicione mais rotas conforme necessário
];
