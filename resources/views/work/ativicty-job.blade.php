<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Atividades') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Aqui você pode ter a liberdade de inicia atividades para os funcionários cadastrados dentro do nosso site. (Essa função e exclusiva para setores responsaveis.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Funcionário') }}" />
            <select id="name" name="name" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" wire:model="name">
                <option>Selecione um funcionário</option>
                @foreach($activity as $activitys)
                <option value="{{$activitys->id }}">{{ $activitys->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="filial" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="responsavel" value="{{ __('Informa o nome do responsavel pela abertura') }}" />
            <x-jet-input id="responsavel" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model.defer="responsavel" placeholder="Informe o nome do responsavel" />
            <x-jet-input-error for="responsavel" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="description" class="block text-sm font-medium text-gray-700">Informe as informações do produto</label>
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Digite as informações do produto..." wire:model="description">
            </textarea>
            <x-jet-input-error for="description" class="mt-2" />
            <label class="block text-sm font-medium text-gray-700">OBS: Informe o codigo de barra, quantidade e a data de validade do produto!</label>
        </div>

    </x-slot>

    <x-slot name="actions">

        <x-jet-button>
            {{ __('INICIAR CHAMADO') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
