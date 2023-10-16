<x-jet-action-section>
    <x-slot name="title">
        {{ __('Deletar time') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Elimine permanentemente esta equipa.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Uma vez que uma equipe é excluída, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir essa equipe, faça o download de quaisquer dados ou informações sobre essa equipe que você deseja reter.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('Deletar equipe') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-jet-confirmation-modal wire:model="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('Deletar equipe') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Você tem certeza de que deseja excluir essa equipe? Uma vez que uma equipe é excluída, todos os seus recursos e dados serão excluídos permanentemente.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('Deletar equipe') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </x-slot>
</x-jet-action-section>
