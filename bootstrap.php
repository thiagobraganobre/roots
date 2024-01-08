<?php

spl_autoload_register(function ($class) {


    // Converte o nome da classe para o caminho do arquivo
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        include $path;
        return;
    }
    
    if(file_exists('controllers/'.$path)){
        include 'controllers/'.$path;
        return;
    }

    if(file_exists('business/'.$path)){
        include 'business/'.$path;
        return;
    }

    if(file_exists('lib/'.$path)){
        include 'lib/'.$path;
        return;
    }


    $parts = explode('_', $class);
    if (!empty($parts))
    {
        // Construa a estrutura de pastas
        $folderStructure = implode("/",$parts);
        include 'controllers/'.$folderStructure.'.php';
    }


});