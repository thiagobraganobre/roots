<?php
class TokenBusiness {
    public function generate($login) {
            $expiracao = time() + (2 * 60 * 60); // 2 horas em segundos
            $token = hash('sha256', $login . microtime() . $expiracao);

            return ['message' => $token];
    }
}