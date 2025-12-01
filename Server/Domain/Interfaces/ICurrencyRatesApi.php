<?php
namespace Domain\Interfaces;

use Domain\Entities\CurrencyRatesTable;

interface ICurrencyRatesApi{
    function getRates(): CurrencyRatesTable;
}