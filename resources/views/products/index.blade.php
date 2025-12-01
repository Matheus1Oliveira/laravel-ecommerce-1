@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Título -->
    <div class="mb-5">
        <h1 class="fw-bold text-dark">Brinquedos</h1>
        <p class="text-muted">Encontre os melhores brinquedos para todas as idades</p>
    </div>

    <!-- Lista de Produtos -->
    <div class="row g-4">
        @foreach($products as $product)
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm h-100 transition-all">
                <!-- Imagem -->
                <div class="position-relative overflow-hidden" style="height: 200px;">
                    <img 
                        src="{{ $product->image ? asset('images/' . $product->image) : 'https://via.placeholder.com/300x200/e9ecef/6c757d?text=Sem+Imagem' }}" 
                        class="card-img-top h-100 object-fit-cover" 
                        alt="{{ $product->description }}"
                        style="object-fit: cover;"
                    >
                </div>

                <!-- Informações -->
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-semibold text-dark mb-2">{{ $product->modelo }}</h5>
                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit($product->marca, 80) }}</p>
                    
                    <!-- Preço -->
                    <div class="mt-auto">
                        <p class="h5 fw-bold text-primary mb-3">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        
                        <!-- Ações -->
                        <div class="d-grid gap-2">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">
                                Ver detalhes
                            </a>
                            
                            @auth
                                <form action="{{ route('cart.add', $product) }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Adicionar ao carrinho
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                                    Login para comprar
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Paginação -->
    @if($products->hasPages())
    <div class="row mt-5">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    .transition-all {
        transition: all 0.3s ease;
    }
    
    .transition-all:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border: none;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #0b5ed7 0%, #0a58ca 100%);
    }
    
    .btn-outline-primary:hover {
        background: #0d6efd;
        color: white;
    }
</style>
@endsection