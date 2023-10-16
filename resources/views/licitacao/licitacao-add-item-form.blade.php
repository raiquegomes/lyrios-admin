<x-jet-form-section submit="addItem">
    <x-slot name="title">
        {{ __('Adicionar item ao processo') }}
    </x-slot>

    <x-slot name="form">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>ID do Produto</label>
                    <input type="text" name="id_product" id="id_product" wire:model="id_product" placeholder="ID do Produto" class="form-control @if (session()->has('success')) is-valid @endif @if (session()->has('danger')) is-invalid @endif"/>
                    @if (session()->has('success'))<span id="id_product-success" class="success valid-feedback">{{ session('success') }}</span>@endif
                    @if (session()->has('danger'))<span id="id_product-invalid" class="error invalid-feedback">{{ session('danger') }}</span>@endif
                    <x-jet-input-error for="status_motived" class="mt-2" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nome do Produto</label>
                    <input type="text" name="name_product" id="name_product" value="{{ $name_product }}" placeholder="Nome do produto" class="form-control @if (session()->has('success')) is-valid @endif @if (session()->has('danger')) is-invalid @endif" readonly/>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="section">Preço Unitário (R$): </label>
                    <input type="text" class="form-control money" name="price_unit_product" id="price_unit_product" wire:model="price_unit_product" placeholder="Preço unitário do produto (R$)">
                    <x-jet-input-error for="section" class="mt-2" />
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="responsavel">Quantidade: </label>
                    <input type="number" class="form-control" id="qty_product" wire:model="qty_product" placeholder="Quantidade do produto dentro da licitação">
                    <x-jet-input-error for="responsavel" class="mt-2" />
                </div>
            </div>  
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Processos</label>
                    <select id="id_processo" name="id_processo" class="form-control" wire:model="id_processo">
                      <option>Selecione um Processo</option>
                      @foreach($list_processo as $process)
                        <option value="{{ $process->id }}">{{ $process->cliente_nome}} </option>
                      @endforeach
                    </select>
                    <x-jet-input-error for="filial" class="mt-2" />
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">

        <x-jet-button>
            {{ __('Adicionar o Produto') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
