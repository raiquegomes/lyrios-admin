<x-guest-layout>
    <x-jet-authentication-card>
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Liryos</b> Admin</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Faça login para iniciar sua sessão</p>

            <x-jet-validation-errors class="alert alert-warning alert-dismissible" />

            @if (session('status'))
                <div class="alert alert-green">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf  
                <div class="input-group mb-3">
                    <x-jet-input id="email" class="form-control" placeholder="Digite seu email" type="email" name="email" :value="old('email')" required autofocus />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <x-jet-input id="password" class="form-control" type="password" placeholder="Digite sua senha" name="password" required autocomplete="current-password" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <x-jet-checkbox class="form-check-input me-2" id="remember_me" name="remember" />
                            <label for="remember">{{ __('Mantenha-me conectado') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <x-jet-button class="btn btn-primary btn-block">
                            {{ __('Logar') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>

            @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">Esqueci a minha senha</a>
            </p>
            @endif
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Registrar uma nova assinatura</a>
            </p>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
