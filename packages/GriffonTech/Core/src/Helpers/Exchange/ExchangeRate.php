<?php

namespace GriffonTech\Core\Helpers\Exchange;

abstract class ExchangeRate
{
    abstract public function fetchRates();

    abstract public function UpdateRates();
}