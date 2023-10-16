<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Atualizar senha') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Certifique-se de que sua conta esteja usando uma senha longa e aleatória para se manter seguro.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-md-4">
            <x-jet-label for="current_password" value="{{ __('Digite a senha antiga') }}" />
        </div>
        <div class="col-md-8">
            <div class="form-group has-icon-left">
                <div class="position-relative">
                    <x-jet-input id="current_password" type="password" placeholder="Insira sua senha antiga" class="form-control" wire:model.defer="state.current_password" autocomplete="current-password" />
                    <x-jet-input-error for="current_password"/>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <x-jet-label for="password" value="{{ __('Digite sua nova senha') }}" />
        </div>
        <div class="col-md-8">
            <div class="form-group has-icon-left">
                <div class="position-relative">
                    <x-jet-input id="password" type="password" placeholder="Insira a sua nova senha" class="form-control" wire:model.defer="state.password" autocomplete="new-password" />
                    <x-jet-input-error for="password" />
                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirme sua nova senha') }}" />
        </div>
        <div class="col-md-8">
            <div class="form-group has-icon-left">
                <div class="position-relative">
                    <x-jet-input id="password_confirmation" placeholder="Confirme sua nova senha" type="password" class="form-control" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation" />
                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('A senha foi alterada com sucesso.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
