<?php

namespace App\Factory;

/**
 * This Concrete Product implements the Facebook API.
 */
class FileW implements Provider
{
    public function getData(): array
    {
        $path = storage_path() . "/json/DataProviderW.json";

        $json = json_decode(file_get_contents($path), true);

        return $json;
    }
}

