<?php

namespace App\Factory;

class GetFileW extends Transactions
{

    public function getFile(): Provider
    {
        return new FileW();
    }
}
