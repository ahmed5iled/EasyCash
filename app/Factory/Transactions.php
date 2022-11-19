<?php

namespace App\Factory;

abstract class Transactions
{
    abstract public function getFile(): Provider;

    public function transformer(): array
    {
        $file = $this->getFile();

        return $file->getData();
    }
}

