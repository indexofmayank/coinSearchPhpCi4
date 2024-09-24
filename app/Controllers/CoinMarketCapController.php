<?php

namespace App\Controllers;

use App\Models\CoinMarketCapModel as CoinModel;

class CoinMarketCapController extends BaseController
{

    public function __construct()
    {
        $this->coinmarketcapmodel = new CoinModel();
    }


    public function quotes($symbol)
    {
        // $model = new CoinModel();
        $data = $this->coinmarketcapmodel->getLatestQuotes($symbol);

        return var_dump($data);
    }

    public function index()
    {
        return "mayank bhai work kar raha hain";
    }
}
