<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Inserimento de produto em listagem das OEFs ') }}
    </x-slot>

    <x-slot name="form">
      <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <x-jet-label value="{{ __('ID do Produto')}}" />
                <input type="text" name="searchProduct" id="searchProduct" wire:model="searchProduct" placeholder="ID Codigo" class="form-control @if (session()->has('success')) is-valid @endif" />
                @if (session()->has('success'))<span id="id_product-success" class="success valid-feedback">{{ session('success') }}</span>@endif
                @if (session()->has('danger'))<span id="id_product-invalid" class="error invalid-feedback">{{ session('danger') }}</span>@endif
                <x-jet-input-error for="searchProduct" class="mt-2" />
            </div>
        </div>

        <div class="col-sm-6">
          <label for="responsavel">Quantidade: </label>
          <div class="input-group">
            <x-jet-input type="number" name="qty" id="qty" placeholder="Quantidade" autocomplete="qty" wire:model="qty" class="form-control" />
            <button type="submit" class="btn btn-primary">Adicionar Item</button>
            <x-jet-input-error for="qty" class="mt-2" />
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="nome">Nome: </label>
            <x-jet-input type="text" name="name" id="name" placeholder="Nome do produto" autocomplete="nome" wire:model="nome" class="form-control" readonly/>
            <x-jet-input-error for="nome" class="mt-2" />
          </div>
        </div>
        
        <div class="col-sm-6">
          <div class="form-group">
              <x-jet-label value="{{ __('Codigo de Barra')}}" />
              <x-jet-input type="text" name="ean" id="ean" value="{{ $ean }}" placeholder="Codigo de Barra" class="form-control" readonly/>
              <x-jet-input-error for="ean" class="mt-2" />
          </div>
        </div>

      </div>
      <div class="col-span-6">
        <label class="block text-sm font-medium text-gray-700">Esse serviço e usado para fins de controle e gestão de produtos em questões de licitação dentro do setor de compras.</label>
      </div>
    </x-slot>
</x-jet-form-section>
