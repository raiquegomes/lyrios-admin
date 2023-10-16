<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Registrar produtos com validade proxima') }}
    </x-slot>

    <x-slot name="form">
      <div class="col-md-4">
        <x-jet-label value="{{ __('Codigo de Barra')}}" />
      </div>
      <div class="col-md-8">
        <div class="form-group has-icon-left @error('ean') is-invalid @enderror">
          <div class="position-relative">
            <x-jet-input type="text" name="ean" id="ean" placeholder="Codigo de Barra" wire:model="ean" class="form-control"/>
            <div class="form-control-icon">
              <i class="bi bi-upc-scan"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <x-jet-label value="{{ __('Nome do Produto')}}" />
      </div>
      <div class="col-md-8">
        <div class="form-group @error('nome') is-invalid @enderror">
          <div class="input-group mb-3">
            <x-jet-input type="text" name="nome" id="nome" placeholder="Nome do produto" wire:model="nome" class="form-control" readonly/>
            <x-jet-input-error for="nome" />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <x-jet-label value="{{ __('Data do Vencimento')}}" />
      </div>
      <div class="col-md-8">
        <div class="form-group has-icon-left @error('validated_date') is-invalid @enderror">
          <div class="position-relative">
            <x-jet-input type="date" name="validated_date" id="validated_date" placeholder="Data de Vencimento do produto" wire:model="validated_date" class="form-control" />
            <x-jet-input-error for="validated_date"/>
            <div class="form-control-icon ">
              <i class="bi bi-calendar4-event"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <x-jet-label value="{{ __('Filial')}}" />
      </div>
      <div class="col-md-8">
        <div class="form-group has-icon-left">
          <div class="position-relative">
            <select id="filial" name="filial" class="form-control" wire:model="filial">
              <option>Selecione uma Filial</option>
              <option value="1">Supermercado P&F</option>
              <option value="2">Supermercado A&E</option>
          </select>
          <x-jet-input-error for="filial" class="mt-2" />
            <div class="form-control-icon">
              <i class="bi bi-shop"></i>
            </div>
          </div>
        </div>
      </div>
          <div class="col-span-6">
            <label class="block text-sm font-medium text-gray-700">Esse serviço e usado apenas para o setor de controle de corte. Todos os items colocados já devem ter passado por verificação do relatorio do sistema.</label>
          </div>
        </div>
    </x-slot>


    <x-slot name="actions">
      <x-jet-action-message class="mr-3" on="saved">
          {{ __('Foi alterado com sucesso.') }}
      </x-jet-action-message>

      <x-jet-button wire:loading.attr="disabled" wire:target="photo">
          {{ __('Adicionar o Produto') }}
      </x-jet-button>
  </x-slot>

</x-jet-form-section>