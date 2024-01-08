<?php
//pathUrl, exemplo na pasta roots. http://localhost/roots

return $config = [
    'tests' => false,
    'pathUrl' => '/roots',

    'db' => [
            'default' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'dbname' => 'roots',
                'user' => 'root',
                'pass' => ''
            ]
    ]
];