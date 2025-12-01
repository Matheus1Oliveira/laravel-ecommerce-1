@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Título -->
    <div class="mb-5">
        <h1 class="fw-bold text-dark">Meus Pedidos</h1>
        <p class="text-muted">Acompanhe seus pedidos e status</p>
    </div>

    @if($orders->count() > 0)
    <!-- Tabela de Pedidos -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Pedido #</th>
                            <th>Data</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="align-middle">
                            <td class="ps-4 fw-semibold">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                <div>{{ $order->created_at->format('d/m/Y') }}</div>
                                <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                            </td>
                            <td>
                                <span class="fw-bold text-primary">R$ {{ number_format($order->total, 2, ',', '.') }}</span>
                            </td>
                            <td>
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
                                <span class="badge bg-{{ $color }} px-3 py-2">
                                    {{ $text }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>Detalhes
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Estatísticas -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-2">Total de Pedidos</h6>
                    <h3 class="fw-bold text-primary">{{ $orders->total() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-2">Valor Total</h6>
                    <h3 class="fw-bold text-success">
                        R$ {{ number_format($orders->sum('total'), 2, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-2">Último Pedido</h6>
                    <h5 class="fw-bold">
                        {{ $orders->first()->created_at->format('d/m/Y') }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-muted mb-2">Status Atual</h6>
                    @php
                        $latestOrder = $orders->first();
                        $latestColor = $statusColors[$latestOrder->status] ?? 'secondary';
                        $latestText = $statusText[$latestOrder->status] ?? ucfirst($latestOrder->status);
                    @endphp
                    <span class="badge bg-{{ $latestColor }} px-3 py-2">{{ $latestText }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Paginação -->
    @if($orders->hasPages())
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
    @endif

    @else
    <!-- Sem Pedidos -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-shopping-bag fa-4x text-muted"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-3">Nenhum pedido encontrado</h3>
                    <p class="text-muted mb-4">Você ainda não fez nenhum pedido em nossa loja.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary px-5">
                        <i class="fas fa-store me-2"></i>Ver Produtos
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    .card {
        border-radius: 10px;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.05);
    }
    
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
    
    .badge {
        font-weight: 500;
        font-size: 0.875rem;
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
    
    .table > :not(caption) > * > * {
        padding: 1rem 0.5rem;
    }
</style>
@endsection