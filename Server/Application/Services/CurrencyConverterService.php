<?php
namespace Application\Services;

use Domain\Interfaces\ICurrencyRatesApi;
use Application\Services\ICurrencyConverterService;
use Application\Dtos\ConversionResultDto;

class CurrencyConverterService implements ICurrencyConverterService{
    public function __construct(private ICurrencyRatesApi $exchangeRatesApi){}

    public function FromPlnToUsdEurChf(float $amount): ConversionResultDto
    {
        if($amount<=0){
            throw new \InvalidArgumentException('Amount must be greater then 0');
        }
        $currencyRatesTable = $this->exchangeRatesApi->getRates();
        
        return new ConversionResultDto(
            rates: [
                ['currency' => 'USD', 'value' => round($amount / $currencyRatesTable->rates['USD'],2), 'rate' => $currencyRatesTable->rates['USD']],
                ['currency' => 'EUR', 'value' => round($amount / $currencyRatesTable->rates['EUR'],2), 'rate' => $currencyRatesTable->rates['EUR']],
                ['currency' => 'CHF', 'value' => round($amount / $currencyRatesTable->rates['CHF'],2), 'rate' => $currencyRatesTable->rates['CHF']]
            ],
            date: $currencyRatesTable->date->format('d-m-Y')
        );
    }
}