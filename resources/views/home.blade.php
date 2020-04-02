@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3>Lista de productos</h3>
                @forelse($products as $product)
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img class="w-50" src="{{ asset($product->image) }}" alt="Producto">
                        </div>
                        <div class="col-md-3">{{ $product->name }}</div>
                        <div class="col-md-3">${{ number_format($product->price) }}</div>
                        <div class="col-md-3">
                            <form action="{{ route("orders.create") }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button class="btn btn-primary">Comprar</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div>No hay productos disponibles en este momento, por favor intente más tarde</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
