<?php

namespace App\Http\Controllers;

use App\Factory\GetAllFiles;
use App\Factory\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{

    function index(Request $request)
    {
        $date = $this->clientCode(new GetAllFiles($request->provider, $request->amounteMin, $request->amounteMax,
            $request->status, $request->currency));

        return response()->json(['data' => $date]);
    }

    function clientCode(Transactions $creator): array
    {
        return $creator->transformer();
    }
}
