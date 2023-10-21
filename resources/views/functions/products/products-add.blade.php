<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Adicionar Produto ao Banco de Dados') }}
    </x-slot>

    <x-slot name="form">
      <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <x-jet-label value="{{ __('ID do Produto')}}" />
                <input type="text" class="form-control @error('id_product') is-invalid @enderror" wire:model="id_product" placeholder="ID Codigo" />
                @error('id_product')<span id="responsavel-error" class="error invalid-feedback">{{$message}}</span>@enderror
            </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
              <label for="nome">Nome: </label>
              <input type="text" class="form-control @error('nome') is-invalid @enderror" wire:model="nome" placeholder="Nome do produto" />
              @error('nome')<span id="responsavel-error" class="error invalid-feedback">{{$message}}</span>@enderror
          </div>
        </div>
        
        <div class="col-sm-6">
          <div class="form-group">
              <x-jet-label value="{{ __('Codigo de Barra')}}" />
              <input type="text" class="form-control @error('ean') is-invalid @enderror" wire:model="ean" placeholder="Codigo de Barra" />
              @error('ean')<span id="responsavel-error" class="error invalid-feedback">{{$message}}</span>@enderror
          </div>
        </div>

      </div>
      <div class="col-span-6">
        <label class="block text-sm font-medium text-gray-700">Esse serviço e usado apenas para o setor de controle de corte. Todos os items colocados já devem ter passado por verificação do relatorio do sistema.</label>
      </div>

      <x-slot name="actions">

        <x-jet-button>
            {{ __('Adicionar o Produto') }}
        </x-jet-button>
    </x-slot>
    </x-slot>
</x-jet-form-section>
