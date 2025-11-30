<?php
namespace Application\Dtos;

class ConversionResultDto{
    public function __construct(
        public readonly float $usd,
        public readonly float $eur,
        public readonly float $chf,
        public readonly float $usdRate,
        public readonly float $eurRate,
        public readonly float $chfRate,
        public readonly string $date
    ) {}
}