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
            throw new \Exception('Amount must be greater then 0');
        }
        $currencyRatesTable = $this->exchangeRatesApi->getRates();
        
        return new ConversionResultDto(
            usd: round($amount / $currencyRatesTable->rates['USD'], 2),
            eur: round($amount / $currencyRatesTable->rates['EUR'], 2),
            chf: round($amount / $currencyRatesTable->rates['CHF'], 2),
            usdRate: $currencyRatesTable->rates['USD'],
            eurRate: $currencyRatesTable->rates['EUR'],
            chfRate: $currencyRatesTable->rates['CHF'],
            date: $currencyRatesTable->date->format('d-m-Y')
        );
    }
}