<?php
namespace Domain\Entities;
class CurrencyRatesTable{
    public function __construct(
        public \DateTimeImmutable $date,
        public array $rates
    ) {}
}