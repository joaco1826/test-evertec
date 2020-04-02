@extends("layouts.app")
@section('title', env('APP_NAME') . ' - Orden ' . $order->id)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row mb-2">
                    <div class="col-md-2">Orden #</div>
                    <div class="col-md-3">{{ $order->reference }}</div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-2">Total</div>
                    <div class="col-md-3"><strong>${{ number_format($order->total) }}</strong></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-2">
                        <button class="btn btn-primary">Pagar</button>
                    </div>
                </div>
                <h4>Items</h4>
                @foreach($order->items as $product)
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img class="w-50" src="{{ asset($product->image) }}" alt="Producto">
                        </div>
                        <div class="col-md-3">{{ $product->name }}</div>
                        <div class="col-md-3">${{ number_format($product->price) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
