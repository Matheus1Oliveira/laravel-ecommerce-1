@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Cabeçalho do Pedido -->
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h1 class="fw-bold text-dark">Pedido #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h1>
                <p class="text-muted mb-0">Realizado em {{ $order->created_at->format('d/m/Y') }} às {{ $order->created_at->format('H:i') }}</p>
            </div>
            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Voltar para Pedidos
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- Informações do Pedido -->
        <div class="col-lg-8">
            <!-- Itens do Pedido -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-4">
                    <h4 class="fw-bold mb-0">
                        <i class="fas fa-box-open text-primary me-2"></i>Itens do Pedido
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Produto</th>
                                    <th>Preço Unitário</th>
                                    <th>Quantidade</th>
                                    <th class="text-end pe-4">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr class="border-bottom">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            @if($item->product->image)
                                            <div class="me-3">
                                                <img src="{{ asset('images/' . $item->product->image) }}" 
                                                     alt="{{ $item->product->model }}" 
                                                     class="rounded" 
                                                     width="60" 
                                                     height="60"
                                                     style="object-fit: cover;">
                                            </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-0 fw-semibold">{{ $item->product->model }}</h6>
                                                @if($item->product->marca)
                                                <small class="text-muted">{{ $item->product->marca }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">R$ {{ number_format($item->price, 2, ',', '.') }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border border-secondary px-3 py-2">
                                            {{ $item->quantity }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <span class="fw-bold text-primary">
                                            R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="border-top">
                                <tr>
                                    <td colspan="3" class="pt-4 text-end fw-bold">Total:</td>
                                    <td class="pt-4 text-end pe-4 h5 fw-bold text-primary">
                                        R$ {{ number_format($order->total, 2, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resumo e Status -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header bg-white border-0 py-4">
                    <h4 class="fw-bold mb-0">
                        <i class="fas fa-info-circle text-primary me-2"></i>Resumo do Pedido
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Status -->
                    <div class="mb-4">
                        <h6 class="fw-semibold text-muted mb-2">Status</h6>
                        @php
                            $statusColors = [
                                'pending' => 'warning',
                                'processing' => 'info',
                                'shipped' => 'primary',
                                'delivered' => 'success',
                                'cancelled' => 'danger',
                                'completed' => 'success'
                            ];
                            $color = $statusColors[$order->status] ?? 'secondary';
                            $statusText = [
                                'pending' => 'Pendente',
                                'processing' => 'Processando',
                                'shipped' => 'Enviado',
                                'delivered' => 'Entregue',
                                'cancelled' => 'Cancelado',
                                'completed' => 'Concluído'
                            ];
                            $text = $statusText[$order->status] ?? ucfirst($order->status);
                        @endphp
                        <div class="d-flex align-items-center">
                            <span class="badge bg-{{ $color }} px-3 py-2 fs-6 me-2">{{ $text }}</span>
                        </div>
                    </div>

                    <!-- Informações -->
                    <div class="mb-4">
                        <h6 class="fw-semibold text-muted mb-2">Informações</h6>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Número do Pedido:</span>
                            <span class="fw-semibold">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Data do Pedido:</span>
                            <span class="fw-semibold">{{ $order->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Hora do Pedido:</span>
                            <span class="fw-semibold">{{ $order->created_at->format('H:i') }}</span>
                        </div>
                    </div>

                    <!-- Valor Total -->
                    <div class="pt-3 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="fw-bold mb-0">Valor Total:</h6>
                            <h4 class="fw-bold text-primary mb-0">
                                R$ {{ number_format($order->total, 2, ',', '.') }}
                            </h4>
                        </div>
                    </div>

                    <!-- Ações -->
                    <div class="mt-4 pt-3 border-top">
                        <div class="d-grid gap-2">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-store me-2"></i>Continuar Comprando
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
    }
    
    .table > :not(caption) > * > * {
        padding: 1rem 0.5rem;
    }
    
    .table tbody tr:last-child {
        border-bottom: none;
    }
    
    .sticky-top {
        z-index: 100;
    }
    
    .badge {
        font-weight: 500;
    }
    
    .badge.bg-warning {
        background-color: #ffc107 !important;
        color: #000;
    }
    
    .badge.bg-info {
        background-color: #0dcaf0 !important;
        color: #000;
    }
    
    .badge.bg-primary {
        background-color: #0d6efd !important;
        color: #fff;
    }
    
    .badge.bg-success {
        background-color: #198754 !important;
        color: #fff;
    }
    
    .badge.bg-danger {
        background-color: #dc3545 !important;
        color: #fff;
    }
    
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
    
    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }
</style>
@endsection