<?php

namespace App\Controllers;

use App\Models\CoinMarketCapModel as CoinModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->coinmarketcapmodel = new CoinModel();
    }

    public function index(): string
    {
        return view('home');
    }

    public function singup(): string
    {
        return view('pages/singup');
    }

    public function login(): string
    {
        return view('pages/login');
    }

    public function homepage(): string
    {
        return view('pages/homepage');
    }

    public function crypto(): string
    {
        {
            // Sample data for cryptocurrencies
            $data['cryptos'] = [
                [
                    'name' => 'Bitcoin (BTC)',
                    'price' => '$44,285.57',
                    'rank' => '4',
                    'change' => '1.22%',
                    'change_type' => 'positive'
                ],
                [
                    'name' => 'Cardano (ADA)',
                    'price' => '$1.08',
                    'rank' => '7',
                    'change' => '2.56%',
                    'change_type' => 'positive'
                ],
                [
                    'name' => 'BNB (BNB)',
                    'price' => '$408.57',
                    'rank' => '4',
                    'change' => '-3.62%',
                    'change_type' => 'negative'
                ]
            ];
    
            return view('components/crypto_cards', $data);
        }
    }

    public function search() {
        helper(['form']);
    
        if($this->request->getMethod() === 'post') {
            $search_term = $this->request->getPost('search_term');
        
            // Fetch the latest quotes from CoinMarketCap API
            $cryptosData = $this->coinmarketcapmodel->getLatestQuotes($search_term);
    
            // Extract the necessary information from the API response
            $cryptos = [];
            if (isset($cryptosData['data']) && !empty($cryptosData['data'])) {
                foreach ($cryptosData['data'] as $symbol => $crypto) {
                    $cryptos[] = [
                        'name' => $crypto['name'],
                        'price' => $crypto['quote']['USD']['price'],
                        'rank' => $crypto['cmc_rank'],
                        'change' => $crypto['quote']['USD']['percent_change_24h'] . '%',
                        'change_type' => $crypto['quote']['USD']['percent_change_24h'] >= 0 ? 'text-success' : 'text-danger'  // Assign class for price change
                    ];
                }
            }
    
            // Pass the $cryptos array to the view
            return view('pages/homepage')
                 . view('components/crypto_cards', ['cryptos' => $cryptos]);
        }
    }
}
