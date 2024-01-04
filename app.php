<?php

class App{

    static function run(){
        global $config, $rotas;
    
        $REQUEST_URI = $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];
        $caminho = str_replace($config['pathUrl'] , '', $REQUEST_URI);
        $tratar = explode("?",$caminho);
        if (!empty($tratar[1]))
        {
        $caminho = $tratar[1];
        
            if (!empty($tratar[2])){
                $params = explode("&",$tratar[2]);
                foreach($params as $row){
                $aux = explode('=',$row);
                $_REQUEST[$aux[0]]=$aux[1];
                }    
            }
        }
        
        $caminho = $metodo . ' ' . $caminho;
        if ($metodo == 'POST')
        {
            $inputJSON = file_get_contents('php://input');
            $inputData = json_decode($inputJSON, true);
            foreach($inputData as $k=>$v)
                $_REQUEST[$k] = $v;
        }
        
        
        // Roteamento
        if (array_key_exists($caminho, $rotas)) {
            $controlador = $rotas[$caminho];
            $resultado = $controlador->execute($_REQUEST);
            echo json_encode($resultado);
        } else {
            echo json_encode(['code' => 404, 'message' => 'Rota não encontrada']);
        }
    }    






}
