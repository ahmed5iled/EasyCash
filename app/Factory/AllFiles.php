<?php

namespace App\Factory;

/**
 * This Concrete Product implements the Facebook API.
 */
class AllFiles implements Provider
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

    public function getData(): array
    {
        $file_w = new GetFileW();
        $file_x = new GetFileX();
        $file_Y = new GetFileY();

        $file_w = $file_w->transformer();
        if ($this->provider == 'DataProviderX' || $this->provider == null) {
            $file_x = $file_x->transformer();
        }
        if ($this->provider == 'DataProviderY' || $this->provider == null) {
            $file_Y = $file_Y->transformer();
        }
        $json = [];
        for ($i = 0; $i < count($file_w); $i++) {
            if ($this->provider == 'DataProviderW') {
                $json[] = $file_w[$i];
            } elseif ($this->provider == 'DataProviderX') {
                $json[] = $file_x[$i];
            } elseif ($this->provider == 'DataProviderY') {
                $json[] = $file_Y[$i];
            } else {
                $json[] = array_merge($file_w[$i], $file_x[$i], $file_Y[$i]);
            }
        }

        $json = collect($json);

        if ($this->status) {
            $json = $json->where('status', $this->status);
        }

        if ($this->min || $this->max) {
            $json = $json->whereBetween('transactionAmount', [$this->min, $this->max]);
        }

        if ($this->currency) {
            $json = $json->where('Currency', $this->currency);
        }

        $json = $json->toArray();

        return $json;
    }
}

