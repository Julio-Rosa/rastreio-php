<?php
require_once '../vendor/autoload.php';

use \App\WebService\Correios\Rastreio;



$response  = isset($_POST['codigo']) ? Rastreio::consultarRastreio($_POST['codigo']) : null;



require_once '../includes/header.php';

require_once isset($response['objetos']) ?
        '../includes/result.php' :    
        '../includes/form.php';

require_once '../includes/footer.php';