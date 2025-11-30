<?php
namespace Application\Services;

use Application\Dtos\ConversionResultDto;

interface ICurrencyConverterService{
    function FromPlnToUsdEurChf(float $amount): ConversionResultDto;
}