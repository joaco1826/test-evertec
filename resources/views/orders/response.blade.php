@extends("layouts.app")
@section('title', env('APP_NAME') . ' - Orden ' . $order->reference)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row mb-2">
                    <div class="col-md-2">Orden #</div>
                    <div class="col-md-3">{{ $order->reference }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-2">Total</div>
                    <div class="col-md-3">${{ number_format($order->total) }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-2">Fecha</div>
                    <div class="col-md-3">{{ date('Y-m-d H:i:s', strtotime($transaction['date'])) }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-2">Estado</div>
                    <div class="col-md-3">{{ $transaction['status'] }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-2">Metodo de pago</div>
                    <div class="col-md-3">{{ $transaction['method'] }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
