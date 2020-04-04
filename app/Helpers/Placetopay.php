<?php

namespace App\Helpers;
use App\Models\Order;
use Dnetix\Redirection\PlacetoPay as Evertec;
use Illuminate\Support\Facades\Log;

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

    public function request($amount, $reference, $expiration)
    {
        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing Evertec',
                'amount' => [
                    'currency' => 'COP',
                    'total' => $amount,
                ],
            ],
            'expiration' => $expiration,
            'returnUrl' => 'http://127.0.0.1:8000/orders/response/' . $reference,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        return $this->placetopay->request($request);
    }

    public function query($request_id)
    {
        return $this->placetopay->query($request_id);
    }

    public function getInformationPayments()
    {
        $orders = Order::where('status', Order::PENDING)->get();
        foreach ($orders as $order) {
            if (strtotime(date("Y-m-d H:i:s")) > strtotime($order->expiration_date)) {
                $order->update([
                   'status' => Order::EXPIRED
                ]);
            } else {
                $response = $this->query($order->request_id);
                Log::error($response->status()->message());
                if ($response->isSuccessful()) {
                    if ($response->status()->isApproved()) {
                        $order->update([
                            'status' => Order::PAYED
                        ]);
                    } elseif ($response->status()->isRejected()) {
                        $order->update([
                            'status' => Order::REJECTED
                        ]);
                    } elseif (in_array($response->status()->status(), [Order::PENDING, Order::REJECTED])) {
                        $order->update([
                            'status' => $response->status()->status()
                        ]);
                    }

                }
            }
        }
    }

}
