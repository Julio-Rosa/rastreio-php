<?php

namespace App\WebService\Correios;

class Rastreio{
    const URL_BASE = 'https://proxyapp.correios.com.br';


    public static function consultarRastreio($codigo){
        
        $curl = curl_init();
        
        curl_setopt_array($curl,[
            CURLOPT_URL => self::URL_BASE.'/v1/sro-rastro/'
            .strtoupper($codigo),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

       return json_decode($response, true);
    }
}