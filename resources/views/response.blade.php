@extends("layouts.app")
@section('title', env('APP_NAME') . ' - Orden ' . $reference)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row mb-2">
                    <div class="col-md-2">Orden #</div>
                    <div class="col-md-3">{{ $reference }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
