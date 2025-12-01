<?php
namespace Presentation\Controllers;

use Application\Services\ICurrencyConverterService;

class CurrencyRatesController{
    public function __construct(private ICurrencyConverterService $converterService) {}

    public function FromPlnToUsdEurChf(float $amount): void{
        try{
            $result = $this->converterService->FromPlnToUsdEurChf($amount);

            echo json_encode($result);
        }
        catch (\InvalidArgumentException $ex){
            http_response_code(400);
            echo json_encode(['error' => $ex->getMessage()]);
        }
        catch (\Exception $ex){
            http_response_code(500);
            echo json_encode(['error' => $ex->getMessage()]);
        }
    }
}