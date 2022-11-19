<?php

namespace App\Factory;

class GetFileX extends Transactions
{
    public function getFile(): Provider
    {
        return new FileX();
    }

}

