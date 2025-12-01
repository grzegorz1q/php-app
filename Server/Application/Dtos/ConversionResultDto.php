<?php
namespace Application\Dtos;

class ConversionResultDto{
    public function __construct(
        public readonly string $date,
        public array $rates
    ) {}
}