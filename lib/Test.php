<?php
class Test {

    
    public static function run($resource, $request, $headers) {
        $outputEsperado = $resource->getSettings()['output'];
        $outputReal = $resource->execute($request, $headers);

        if (is_array($outputReal))
        {
            if (is_array($outputEsperado)){
                $result = array_diff($outputReal, $outputEsperado);
                if (!empty($result))
                    throw new Exception("Teste falhou! A saída foi diferente do esperado.");
    
            }else{
                throw new Exception("Teste falhou! A saída esperada não é um array.");
            }
            
        }if(is_object($outputReal)){
            //implementar
        }else{

            if ($outputReal !== $outputEsperado) 
                throw new Exception("Teste falhou! Strings diferentes.");
            
    

        }
    }


}