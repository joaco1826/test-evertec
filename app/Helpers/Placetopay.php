<?php

namespace App\Helpers;
use Dnetix\Redirection\PlacetoPay as Evertec;

class Placetopay {

    protected $placetopay;

    public function __construct()
    {
        $this->placetopay = new Evertec([
            'login' => env('PLACETOPAY_LOGIN'),
            'tranKey' => env('PLACETOPAY_TRANKEY'),
            'url' => env('PLACETOPAY_URL'),
            'type' => Evertec::TP_REST
        ]);
    }

    public function request($amount, $reference) {
        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing Evertec',
                'amount' => [
                    'currency' => 'COP',
                    'total' => $amount,
                ],
            ],
            'expiration' => date('c', strtotime('+1 hour')),
            'returnUrl' => 'http://127.0.0.1:8000/orders/response/' . $reference,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $this->placetopay->request($request);
        return $response;

    }

}
