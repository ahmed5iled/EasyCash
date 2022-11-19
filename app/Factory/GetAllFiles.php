<?php

namespace App\Factory;

class GetAllFiles extends Transactions
{
    public $provider = null;
    public $min = null;
    public $max = null;
    public $status = null;
    public $currency = null;


    public function __construct($provider, $min, $max, $status, $currency)
    {
        $this->provider = $provider;
        $this->min = $min;
        $this->max = $max;
        $this->status = $status;
        $this->currency = $currency;
    }

    public function getFile(): Provider
    {
        return new AllFiles($this->provider, $this->min, $this->max, $this->status, $this->currency);
    }
}
