@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h1 class="fw-bold display-4 mb-3">Bem-vindo à nossa Loja</h1>
            <p class="lead text-muted mb-4">
                Encontre os melhores produtos com qualidade e preço justo. 
                Faça suas compras com segurança e conveniência.
            </p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4 py-3">
                <i class="fas fa-shopping-cart me-2"></i>Ver Produtos
            </a>
        </div>
        <div class="col-lg-6">
            <img src="https://via.placeholder.com/600x400/6c757d/ffffff?text=Bem-vindo" 
                 alt="Bem-vindo" 
                 class="img-fluid rounded shadow">
        </div>
    </div>

    <!-- Cards de Recursos -->
    
</div>

<style>
    .card {
        border-radius: 10px;
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }
    
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>
@endsection