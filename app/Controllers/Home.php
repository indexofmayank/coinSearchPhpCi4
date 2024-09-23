<?php

namespace App\Controllers;

class Home extends BaseController
{
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
}
