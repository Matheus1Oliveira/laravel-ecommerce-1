@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Título -->
    <div class="mb-4">
        <h1 class="fw-bold text-dark">Carrinho</h1>
        <p class="text-muted">Revise seus produtos antes de finalizar a compra</p>
    </div>

    @guest
    <!-- Usuário não logado -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="bi bi-person-x" style="font-size: 4rem; color: #6c757d;"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-3">Faça login para acessar o carrinho</h3>
                    <p class="text-muted mb-4">Você precisa estar logado para visualizar e gerenciar seu carrinho de compras</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('login') }}" class="btn btn-primary px-5">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Fazer Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary px-5">
                            <i class="bi bi-person-plus me-2"></i>Criar Conta
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        @if(count($cartItems) > 0)
        <!-- Tabela do Carrinho -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">Produto</th>
                                        <th>Preço</th>
                                        <th>Quantidade</th>
                                        <th>Total</th>
                                        <th class="text-end pe-4">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                    <tr class="align-middle">
                                        <!-- Produto -->
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <img src="{{ $item['image'] ? asset('images/' . $item['image']) : 'https://via.placeholder.com/80/6c757d/ffffff?text=Sem+Imagem' }}" 
                                                         alt="{{ $item['model'] }}" 
                                                         class="rounded" 
                                                         width="60" 
                                                         height="60"
                                                         style="object-fit: cover;">
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-semibold">{{ $item['model'] }}</h6>
                                                    <small class="text-muted">{{ $item['marca'] ?? '' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <!-- Preço Unitário -->
                                        <td>
                                            <span class="fw-semibold">R$ {{ number_format($item['price'], 2, ',', '.') }}</span>
                                        </td>
                                        
                                        <!-- Quantidade -->
                                        <td>
                                            <form action="{{ route('cart.update', $item['product_id']) }}" method="POST" class="d-flex align-items-center gap-2">
                                                @csrf
                                                <input type="number" 
                                                       name="quantity" 
                                                       value="{{ $item['quantity'] }}" 
                                                       min="1" 
                                                       max="99" 
                                                       class="form-control form-control-sm" 
                                                       style="width: 70px;">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Atualizar
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                        
                                        <!-- Total do Item -->
                                        <td>
                                            <span class="fw-bold text-primary">R$ {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</span>
                                        </td>
                                        
                                        <!-- Remover -->
                                        <td class="text-end pe-4">
                                            <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i> Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resumo e Ações -->
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Continuar Comprando
                </a>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Resumo do Carrinho</h5>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-semibold">R$ {{ number_format($total, 2, ',', '.') }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                            <span class="text-muted">Frete</span>
                            <span class="text-success fw-semibold">Grátis</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold">Total</span>
                            <span class="h5 fw-bold text-primary">R$ {{ number_format($total, 2, ',', '.') }}</span>
                        </div>
                        
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-shopping-bag me-2"></i>Finalizar Compra
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Carrinho Vazio (usuário logado) -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-shopping-cart fa-4x text-muted"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-3">Seu carrinho está vazio</h3>
                        <p class="text-muted mb-4">Adicione produtos ao carrinho para continuar</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary px-5">
                            <i class="fas fa-store me-2"></i>Buscar Produtos
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endguest
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.05);
    }
    
    .card {
        border-radius: 10px;
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
    
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
    
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
</style>
@endsection