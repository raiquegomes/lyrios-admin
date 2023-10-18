<x-guest-layout>
    <x-jet-authentication-card>
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Liryos</b> Admin</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">{{ __('Você esqueceu sua senha? Aqui você pode recuperar facilmente uma nova senha.') }}</p>

            <x-jet-validation-errors class="alert alert-warning alert-dismissible" />

            @if (session('status'))
                <div class="alert alert-green">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group mb-3">
                    <x-jet-input id="email" class="form-control" type="email" placeholder="Digite seu email" name="email" :value="old('email')" required autofocus />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <x-jet-button class="btn btn-primary btn-block">
                            {{ __('Enviar email para redefinir senha') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">Login</a>
              </p>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
