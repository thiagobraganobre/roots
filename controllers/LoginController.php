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
            $tokenBusiness = new TokenBusiness();
            $token =  $tokenBusiness->generate($login)['message'];
            
            $bd->execute('gerar_token', [$response[0]['id'], $token]);

            return ['message' => 'Sucesso ', 'token' => $token];
        }else{
            return ['message' => 'Usuário não autenticado!'];
        }
    }
}