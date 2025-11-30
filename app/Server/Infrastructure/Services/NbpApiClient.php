<?php
namespace Infrastructure\Services;

use Domain\Entities\CurrencyRatesTable;
use Domain\Interfaces\ICurrencyRatesApi;

class NbpApiClient implements ICurrencyRatesApi{
    private string $url = "http://api.nbp.pl/api/exchangerates/tables/A?format=json";

    public function getRates(): CurrencyRatesTable{
        $data = json_decode(file_get_contents($this->url), true) 
            ?? throw new \Exception("Error while getting data from NBP API");
        $rates = [];
        foreach($data[0]['rates'] as $rate){
            $rates[$rate['code']] = $rate['mid'];
        }
        
        return new CurrencyRatesTable(
            date: new \DateTimeImmutable($data[0]['effectiveDate']),
            rates: $rates
        );
    }
}