<x-jet-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Detalhes da equipe') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Crie uma nova equipe para colaborar com outras pessoas em projetos.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-jet-label value="{{ __('Proprietário da equipe') }}" />

            <div class="col-md-8">
                <div class="form-group has-icon-left">
                    <div class="position-relative">
                        <div class="avatar avatar-md">
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">
                        </div>
                   {{ $this->user->name }}
                    <div class="text-gray-700 text-sm">{{ $this->user->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nome da Equipe') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Criar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
