@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Título -->
    <div class="mb-4">
        <h1 class="fw-bold text-dark">Checkout</h1>
        <p class="text-muted">Finalize sua compra</p>
    </div>

    <div class="row g-4">
        <!-- Resumo do Pedido -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="fw-bold mb-4">Resumo do Pedido</h4>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr>
                                    <td>{{ $item['model'] }}</td>
                                    <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>R$ {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Total:</td>
                                    <td class="fw-bold text-primary">R$ {{ number_format($total, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informações de Pagamento -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="fw-bold mb-4">Pagamento</h4>
                    
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nome no Cartão</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="card" class="form-label fw-semibold">Número do Cartão</label>
                            <input type="text" class="form-control" id="card" required>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="expiry" class="form-label fw-semibold">Validade</label>
                                <input type="text" class="form-control" id="expiry" placeholder="MM/AA" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="form-label fw-semibold">CVV</label>
                                <input type="text" class="form-control" id="cvv" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2">Finalizar Compra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
    }
    
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .table th {
        font-weight: 600;
        color: #495057;
    }
</style>
@endsection