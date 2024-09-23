<?php

namespace App\Models;
use CodeIgniter\Model;

class CoinMarketCapModel extends Model
{
    protected $apiKey = '822d1d3b-203e-4ca9-912c-2f977efd2773';
    protected $baseUrl = 'https://pro-api.coinmarketcap.com/v1/';

    public function getLatestQuotes($symbols)
    {
        $url = $this->baseUrl . 'cryptocurrency/quotes/latest';

        $client = \Config\Services::curlrequest();
        
        $response = $client->get($url, [
            'headers' => [
                'X-CMC_PRO_API_KEY' => $this->apiKey
            ],
            'query' => [
                'symbol' => $symbols 
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}