@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1>Brinquedos</h1>
    </div>
</div>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <img 
                src="{{ $product->image ? asset('images/' . $product->image) : 'https://via.placeholder.com/400x300' }}" 
                class="card-img-top img-product-card" 
                alt="{{ $product->description }}"
            >
            <div class="card-body">
                <h5 class="card-title">{{ $product->modelo }}</h5>
                <p class="card-text">{{ Str::limit($product->marca, 100) }}</p>
                <p class="h5">${{ number_format($product->price, 2) }}</p>
            </div>
            <div class="card-footer bg-white">
    <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Ver detalhes</a>

    @auth
        <form action="{{ route('cart.add', $product) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Adicionar ao carrinho</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login para comprar</a>
    @endguest
</div>

        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-12">
        {{ $products->links() }}
    </div>
</div>
@endsection