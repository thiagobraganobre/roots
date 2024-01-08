<?php
class LoginController {
    public function getSettings(){}

    public function execute($request, $headers) {
        $login = $request['usuario'];
        $senha = $request['senha'];
        
        $bd = new BD();
        $response = $bd->read('login', [$login, $senha]);

        if (!empty($response))
        {
            $expiracao = time() + (2 * 60 * 60); // 2 horas em segundos
            $token = hash('sha256', $login . microtime() . $expiracao);
            
            $bd->execute('gerar_token', [$response[0]['id'], $token]);

            return ['mensagem' => 'Sucesso ', 'token' => $token];
        }else{
            return ['mensagem' => 'Usuário não autenticado!'];
        }
    }
}