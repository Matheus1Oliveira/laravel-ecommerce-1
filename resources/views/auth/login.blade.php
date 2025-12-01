@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Logo e Título -->
                    <div class="text-center mb-5">
                        <h1 class="fw-bold text-primary mb-3">Entrar na Conta</h1>
                        <p class="text-muted">Faça login para acessar sua conta</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-2 text-primary"></i>E-mail
                            </label>
                            <input id="email" 
                                   type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="seu@email.com"
                                   required 
                                   autocomplete="email" 
                                   autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Senha -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="fas fa-lock me-2 text-primary"></i>Senha
                            </label>
                            <input id="password" 
                                   type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" 
                                   placeholder="Digite sua senha"
                                   required 
                                   autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Lembrar de mim e Esqueci senha -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-muted" for="remember">
                                    Lembrar de mim
                                </label>
                            </div>
                            
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none text-primary fw-semibold" href="{{ route('password.request') }}">
                                    Esqueceu a senha?
                                </a>
                            @endif
                        </div>

                        <!-- Botão de Login -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold">
                                <i class="fas fa-sign-in-alt me-2"></i>Entrar
                            </button>
                        </div>

                        <!-- Divisor -->
                        <div class="text-center my-4 position-relative">
                            <hr class="my-4">
                            <span class="bg-white px-3 text-muted position-absolute top-50 start-50 translate-middle">
                                ou
                            </span>
                        </div>

                        <!-- Link para Registrar -->
                        <div class="text-center">
                            <p class="text-muted mb-0">Não tem uma conta?</p>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg w-100 mt-3 py-3">
                                <i class="fas fa-user-plus me-2"></i>Criar Conta
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
    }
    
    .form-control-lg {
        padding: 0.875rem 1rem;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        transition: all 0.3s;
    }
    
    .form-control-lg:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .form-control-lg.is-invalid {
        border-color: #dc3545;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }
    
    .btn-outline-primary {
        border: 2px solid #0d6efd;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .btn-outline-primary:hover {
        background: #0d6efd;
        transform: translateY(-2px);
    }
    
    .invalid-feedback {
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }
</style>
@endsection