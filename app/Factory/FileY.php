<?php

namespace App\Factory;

/**
 * This Concrete Product implements the Facebook API.
 */
class FileY implements Provider
{
    public function getData(): array
    {
        $path = storage_path() . "/json/DataProviderY.json";

        $json = json_decode(file_get_contents($path), true);

        return $json;
    }
}

