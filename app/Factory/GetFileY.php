<?php

namespace App\Factory;


class GetFileY extends Transactions
{
    public function getFile(): Provider
    {
        return new FileY();
    }
}
