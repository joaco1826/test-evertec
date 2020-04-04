@extends("layouts.app")
@section('title', env('APP_NAME') . ' - Ordenes')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row mb-2">
                    <div class="col-md-2">Orden #</div>
                    <div class="col-md-2">Total</div>
                    <div class="col-md-3">Fecha creación</div>
                    <div class="col-md-2">Estado</div>
                    <div class="col-md-2"></div>
                </div>
                @foreach($orders as $order)
                    <div class="row mb-2 align-items-center">
                        <div class="col-md-2">{{ $order->reference }}</div>
                        <div class="col-md-2">${{ number_format($order->total) }}</div>
                        <div class="col-md-3">{{ $order->created_at }}</div>
                        <div class="col-md-2">{{ $order->status }}</div>
                        <div class="col-md-2">
                            <a href="{{ route("orders.show", $order->id) }}">
                                <button class="btn btn-primary">Ver detalle</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
