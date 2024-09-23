<?php

namespace App\Controllers;

use App\Models\CoinMarketCapModel;

class CoinMarketCapController extends BaseController
{
    public function quotes()
    {
        $model = new CoinMarketCapModel();
        $symbols = 'BTC,ETH,LTC'; // Specify the symbols you want to fetch
        $data = $model->getLatestQuotes($symbols);

        return var_dump($data);
    }

    public function index()
    {
        return "mayank bhai work kar raha hain";
    }
}
