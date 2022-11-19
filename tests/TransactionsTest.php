<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TransactionsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldReturnAllTransaction()
    {

        $this->get("/api/v1/transactions", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' => [
                "amount",
                "currency",
                "phone",
                "status",
                "created_at",
                "id",
                "transactionAmount",
                "Currency",
                "senderPhone",
                "transactionStatus",
                "transactionDate",
                "transactionIdentification",
            ]
            ]
        ]);

    }
}
