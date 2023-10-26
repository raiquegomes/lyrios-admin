<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Abertura de Chamado') }}
    </x-slot>

    <x-slot name="form">
        <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Motivo</label>
                        <select class="form-control @error('status_motived') is-invalid @enderror" wire:model="status_motived">
                            <option value="">Selecione o Motivo</option>
                            <option value="1">Promoção de Validade</option>
                            <option value="2">Remover produto da promoção</option>
                            <option value="3">Inconsistência de valor de produto</option>
                            <option value="4">Duvida sobre produto</option>
                            <option value="5">Cadastro de Receita</option>
                        </select>
                        @error('status_motived')<span id="status_motived-error" class="error invalid-feedback">{{$message}}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Filial</label>
                        <select class="form-control @error('filial') is-invalid @enderror" wire:model="filial">
                            <option value="">Selecione a Filial</option>
                            @foreach ($filial_all as $filials)
                                <option value="{{ $filials->id }}">{{ $filials->name }}</option>
                            @endforeach
                        </select>
                        @error('filial')<span id="filial-error" class="error invalid-feedback">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="section">Departamento: </label>
                        <select class="form-control @error('section') is-invalid @enderror" wire:model="section">
                            <option value="">Selecione o Departamento</option>
                            @foreach ($team as $teams)
                                <option value="{{ $teams->id }}">{{ $teams->name }}</option>
                            @endforeach
                        </select>
                        @error('section')<span id="section-error" class="error invalid-feedback">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="responsavel">Repositor: </label>
                            <input type="text" class="form-control @error('responsavel') is-invalid @enderror" wire:model="responsavel" placeholder="Informe o nome do responsavel" />
                            @error('responsavel')<span id="responsavel-error" class="error invalid-feedback">{{$message}}</span>@enderror
                    </div>
                </div>  
            @if($status_motived == 1)
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInput1">Ferramentas</label><br>
                        <button type="button" class="btn btn-info @error('products') is-invalid @enderror" data-bs-toggle="modal" data-bs-target="#produtos">
                            Informar os produtos
                        </button>
                        @error('products')
                        <span class="error invalid-feedback">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div wire:ignore.self class="modal fade" id="produtos" tabindex="-1" aria-labelledby="produtosLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Produtos</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Codigo de Barra</th>
                                    <th scope="col">Codigo Interno</th>
                                    <th scope="col">Nome do Produto</th>
                                    <th scope="col">Quantidade no Estoque</th>
                                    <th scope="col">Data de Validade</th>
                                    <th scope="col">Preço Sugerido</th>
                                    <th>Opções</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $index => $product)
                                <tr>
                                    <th scope="row">{{$index}}</th>
                                    <td>
                                        <input type="text" wire:model="products.{{ $index }}.ean" class="form-control @error('products.'.$index.'.ean') is-invalid @enderror">
                                        @error('products.'.$index.'.ean')
                                            <span class="error invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" wire:model="products.{{ $index }}.internal_id" class="form-control @error('products.'.$index.'.internal_id') is-invalid @enderror" readonly>
                                        @error('products.'.$index.'.internal_id')
                                            <span class="error invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" wire:model="products.{{ $index }}.name" class="form-control @error('products.'.$index.'.name') is-invalid @enderror" readonly>
                                        @error('products.'.$index.'.name')
                                            <span class="error invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" wire:model="products.{{ $index }}.Qty" class="form-control @error('products.'.$index.'.Qty') is-invalid @enderror">
                                        @error('products.'.$index.'.Qty')
                                            <span class="error invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="date" wire:model="products.{{ $index }}.date_validated" class="form-control @error('products.'.$index.'.date_validated') is-invalid @enderror">
                                        @error('products.'.$index.'.date_validated')
                                            <span class="error invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" wire:model="products.{{ $index }}.safe_price" class="form-control @error('products.'.$index.'.safe_price') is-invalid @enderror">
                                        @error('products.'.$index.'.safe_price')
                                            <span class="error invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <button type="button" wire:click="removeProduct({{ $index }})" class="btn btn-danger">Remover</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <button type="button" wire:click="addProduct" class="btn btn-success">Adicionar Produto</button>
                        </div>
                        <div class="modal-footer justify-content-between">
                            @if($products)
                            <button type="button" wire:click="refreshInformacoes" class="btn btn-warning"><i class="fa-solid fa-arrows-rotate"></i></button>
                            @endif
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            @endif
            @if($status_motived == 5)
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInput1">RECEITA</label><br>
                    <button type="button" class="btn btn-info @error('products') is-invalid @enderror" data-toggle="modal" data-target="#modal-xl">
                        Informar a Receita
                    </button>
                    @error('products')
                    <span class="error invalid-feedback">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
            <div wire:ignore.self class="modal fade" id="modal-xl">
                <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Receita</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nome do Produto</th>
                                    <th scope="col">Quantidade (KG)</th>
                                    <th>Opções</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $index => $product)
                                <tr>
                                    <th scope="row">{{$index}}</th>
                                    <td>
                                        <input type="text" wire:model="products.{{ $index }}.name" class="form-control @error('products.'.$index.'.name') is-invalid @enderror" readonly>
                                        @error('products.'.$index.'.name')
                                            <span class="error invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" wire:model="products.{{ $index }}.safe_price" class="form-control @error('products.'.$index.'.safe_price') is-invalid @enderror">
                                        @error('products.'.$index.'.safe_price')
                                            <span class="error invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <button type="button" wire:click="removeProduct({{ $index }})" class="btn btn-danger">Remover</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="button" wire:click="addProduct" class="btn btn-success">Adicionar Produto</button>
                    </div>
                    <div class="modal-footer justify-content-between">
                        @if($products)
                        <button type="button" wire:click="refreshInformacoes" class="btn btn-warning"><i class="fa-solid fa-arrows-rotate"></i></button>
                        @endif
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            @endif
            @if($status_motived == 3 and 4 )
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="description" class="block text-sm font-medium text-gray-700">Informações sobre o chamado</label>
                        <textarea id="description" name="description" rows="5" class="form-control" placeholder="Digite as informações do produto..." wire:model="description"></textarea>
                        <x-jet-input-error for="description" class="mt-2" />
                        <label class="block text-sm font-medium text-gray-700">OBS: Essa aréa e para insenção de informações complementares! Para insenção de produtos, ative a area dos produtos para seguir com o processo corretamente. </label>
                    </div>
                </div>
            @endif
        </div>
        @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('productFound', function (index, name) {
                Livewire.emit('updateProductName', index, name);
            });
        });
    </script>
@endpush
    </x-slot>

    <x-slot name="actions">

        <x-jet-button>
            {{ __('Iniciar Chamado') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
