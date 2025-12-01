<?php
require_once __DIR__ . '/Domain/Entities/CurrencyRatesTable.php';
require_once __DIR__ . '/Domain/Interfaces/ICurrencyRatesApi.php';

require_once __DIR__ . '/Infrastructure/Services/NbpApiClient.php';

require_once __DIR__ . '/Application/Services/ICurrencyConverterService.php';
require_once __DIR__ . '/Application/Services/CurrencyConverterService.php';
require_once __DIR__ . '/Application/Dtos/ConversionResultDto.php';

require_once __DIR__ . '/Presentation/Controllers/CurrencyRatesController.php';

use Application\Services\CurrencyConverterService;
use Infrastructure\Services\NbpApiClient;
use Presentation\Controllers\CurrencyRatesController;

// header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

$nbpApiClient = new NbpApiClient();
$converterService = new CurrencyConverterService($nbpApiClient);
$controller = new CurrencyRatesController($converterService);

$amount = floatval($_GET['amount']);
$controller->FromPlnToUsdEurChf($amount);
