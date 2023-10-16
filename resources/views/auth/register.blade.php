<x-guest-layout>
    <x-jet-authentication-card>
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Liryos</b> Admin</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Faça login para iniciar sua sessão</p>

            <x-jet-validation-errors class="alert alert-warning" />

        
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <x-jet-input id="name" class="form-control" placeholder="Informe seu nome" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <x-jet-input id="email" class="form-control" placeholder="Informe seu email" type="email" name="email" :value="old('email')" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <x-jet-input id="password" class="form-control" placeholder="Informe sua senha" type="password" name="password" required autocomplete="new-password" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <x-jet-input id="password_confirmation" class="form-control form-control-xl" placeholder="Confirme sua senha" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="col-8">
                            <div class="icheck-primary">
                                <x-jet-checkbox class="form-check-input me-2" name="terms" id="terms"/>
                                <x-jet-label for="terms">
                                    {!! __('Eu concordo com o :terms_of_service e :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Termos de serviço').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Política de Privacidade').'</a>',
                                    ]) !!}
                                </x-jet-label>
                            </div>
                        </div>
                    @endif

                    <div class="col-4">
                        <x-jet-button class="btn btn-primary btn-block">
                            {{ __('Registrar') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
                <a href="{{ route('login') }}" class="text-center">Já tem uma conta? {{ __('Logar') }}</a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
