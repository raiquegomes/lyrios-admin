<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Insenção de Perdas') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Essa e uma função para registro de perdas dentro de certo prazo.') }}
    </x-slot>

    <x-slot name="form">
          <div class="relative col-span-6 sm:col-span-6 lg:col-span-2">
            <input type="text" name="searchProduct" id="searchProduct" wire:model="searchProduct" placeholder="ID Codigo" autocomplete="searchProduct" class="block p-2.5 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>


          <div class="relative col-span-6 sm:col-span-6 lg:col-span-2">
            <input type="number" name="qty" id="qty" placeholder="Quantidade" autocomplete="qty" wire:model="qty" class="block p-2.5 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Adicionar Item</button>
          </div>
          
          <div class="relative col-span-6 sm:col-span-6 lg:col-span-2">
            <x-jet-label for="filial" value="{{ __('Filial') }}" />
            <select id="filial" name="filial" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" wire:model="filial">
                <option>Selecione uma Filial</option>
                <option value="1">Supermercado P&F</option>
                <option value="2">Supermercado A&E</option>
            </select>
            <x-jet-input-error for="filial" class="mt-2" />
        </div>

          <div class="col-span-6">
            <label class="block text-sm font-medium text-gray-700">Esse serviço e usado apenas para o setor de controle . Todos os items colocados já devem ter passado por verificação do relatorio do sistema.</label>
          </div>
        </div>
    </x-slot>

</x-jet-form-section>
