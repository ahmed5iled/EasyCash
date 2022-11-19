<?php

namespace App\Factory;

class FileX implements Provider
{

    public function getData(): array
    {
        $path = storage_path() . "/json/DataProviderX.json";

        $json = json_decode(file_get_contents($path), true);

        return $json;
    }
}
