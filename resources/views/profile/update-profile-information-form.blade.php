<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informação do Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Atualize as informações do perfil e o endereço de e-mail da sua conta.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div class="col-md-4">
            <x-jet-label for="photo" value="{{ __('Foto') }}" />
        </div>
        <div class="col-md-8">
            <div class="form-group has-icon-left">
                <div x-data="{photoName: null, photoPreview: null}" width="86" height="86" class="position-relative">
                    <!-- Profile Photo File Input -->
                    <input type="file" wire:model="photo" x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                <!-- Current Profile Photo -->
                <div class="profile-user-img img-fluid img-circle" x-show="! photoPreview">
                    <img width="86" height="86" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" srcset="">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="profile-user-img img-fluid img-circle" x-show="photoPreview" style="display: none;">
                    <img width="86" height="86" x-bind:style="'background-image: url(\'' + photoPreview + '\');'" srcset="">
                </div>

                <x-jet-secondary-button type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecione uma nova foto') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" wire:click="deleteProfilePhoto">
                        {{ __('Remover foto') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
                </div>
            </div>
        </div>
        @endif

        
        <div class="col-md-4">
            <x-jet-label for="name" value="{{ __('Seu nome') }}" />
        </div>
        <div class="col-md-8">
            <div class="form-group has-icon-left">
                <div class="position-relative">
                    <x-jet-input id="name" type="text" class="form-control" wire:model.defer="state.name" autocomplete="name" />
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <x-jet-input-error for="name"/>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
        </div>
        <div class="col-md-8">
            <div class="form-group has-icon-left">
                <div class="position-relative">
                    <x-jet-input id="email" type="email" class="form-control" wire:model.defer="state.email" />
                    <x-jet-input-error for="email"/>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                        <p class="text-sm mt-2">
                            {{ __('Seu endereço de e-mail não foi verificado.') }}

                            <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                                {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                            </button>
                        </p>

                        @if ($this->verificationLinkSent)
                            <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                                {{ __('Um novo link de verificação foi enviado para seu endereço de e-mail.') }}
                            </p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Foi alterado com sucesso.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
