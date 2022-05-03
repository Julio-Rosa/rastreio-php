<?php

use \App\WebService\Correios\Rastreio;

foreach($response['objetos'] as $objeto){
    echo '<h2 class="mt-3">'.$objeto['codObjeto'].'</h2>';

    if(!isset($objeto['eventos'])){
        $mensagem = $objeto['mensagem'] ?? "Problema ao buscar os dados na API dos Correios";

        echo '<div class="alert alert-warning">
                    '.$mensagem.'
              </div>';
        
            continue;
        }

    foreach($objeto['eventos'] as $evento){
        
        $imagem = isset($evento['urlIcone']) ? 
        '<div style="width:100px;">
            <img src="'.Rastreio::URL_BASE.$evento['urlIcone'].'">
        </div>' : 
        '';

        $cidade = isset($evento['unidade']['endereco']['cidade']) ?
                  $evento['unidade']['endereco']['cidade'].'/'
                  .$evento['unidade']['endereco']['uf'] : 
                   null;
        
        
    

        $dados = [
            $evento['descricao'],
            $cidade,
            $evento['unidade']['nome'] ?? null
        ];
        
        
        echo '<div class="alert alert-light d-flex align-items-center">
                  '.$imagem.'
                  <div style="flex:1;">
                        '.implode(' - ', array_filter($dados)).'
                   </div>
                   <div style="width:200px;">
                        <span class="badge bg-dark">
                           '.date('d/m/Y à\s H:i:s', strtotime($evento['dtHrCriado'])).' 
                        </span>
                    </div>
        
               </div> ';
    }

}