@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-5">
        <!-- Imagem do Produto -->
        <div class="col-lg-6">
            <div class="product-image-wrapper position-relative overflow-hidden rounded-3 shadow-sm">
                <img src="{{ $product->image ? asset('images/' . $product->image) : 'https://via.placeholder.com/600x500/6c757d/ffffff?text=Sem+Imagem' }}" 
                     alt="{{ $product->model }}" 
                     class="img-fluid w-100 product-image">
            </div>
        </div>

        <!-- Informações do Produto -->
        <div class="col-lg-6">
            <div class="product-info p-4">
                <!-- Categoria -->
                @if($product->category)
                <div class="mb-3">
                    <span class="badge bg-light text-primary border border-primary px-3 py-2 rounded-pill">
                        {{ $product->category->name }}
                    </span>
                </div>
                @endif

                <!-- Nome do Produto -->
                <h1 class="fw-bold mb-3 display-6 text-dark">{{ $product->model }}</h1>
                
                <!-- Marca -->
                <div class="mb-4">
                    <p class="text-muted mb-1">Marca</p>
                    <h3 class="h5 fw-semibold text-primary">{{ $product->marca }}</h3>
                </div>

                <!-- Preço -->
                <div class="mb-4">
                    <p class="text-primary display-4 fw-bold">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>

                <!-- Formulário do Carrinho -->
                <div class="cart-form mt-5 pt-4 border-top">
                    @auth
                                <form action="{{ route('cart.add', $product) }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3 shadow-sm">
                                        Adicionar ao carrinho
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg w-100 py-3 shadow-sm">
                                    Login para comprar
                                </a>
                            @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .product-image-wrapper {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 2rem;
    }
    
    .product-image {
        transition: transform 0.3s ease;
        object-fit: contain;
        max-height: 500px;
    }
    
    .product-image:hover {
        transform: scale(1.02);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
    }
    
    .product-info {
        background: #fff;
        border-radius: 12px;
    }
    
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2.5rem;
        }
        
        .product-image-wrapper {
            padding: 1rem;
        }
    }
</style>
@endsection