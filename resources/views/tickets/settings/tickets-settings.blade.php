
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Todos os produtos</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" wire:model="search" class="form-control float-right" placeholder="Digite a identificação">
                <div class="input-group-append">
                    <a type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
      <div class="card-body">
        <table wire:loading.class.delay="" class="table">
            <thead>
                <tr>
                    <th>
                        N°
                    </th>
                    <th>
                        Nome
                    </th>
                    <th>
                        EAN
                    </th>
                    <th>
                        Codigo Interno
                    </th>
                    <th>
                        Filial
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Data de Entrada
                    </th>
                    <th scope="col">
                        AÇÃO
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <th>
                        {{ $product->id }}
                    </th>
                    <td>
                        <p class="font-bold ms-3 mb-0">{{ $product->name }}</p>
                    </td>
                    <td>
                        <p class="font-bold ms-3 mb-0">{{ $product->EAN }}</p>
                    </td>
                    <td>
                        <p class="font-bold ms-3 mb-0">{{ $product->internal_id }}</p>
                    </td>
                    <td>
                        @if ($product->filial === 1) 
                            <span class="badge bg-primary">(P&F)</span> 
                        @endif
                        @if ($product->filial === 2) 
                            <span class="badge bg-warning">(A&E)</span> 
                        @endif
                        @if ($product->filial === 3) 
                        <span class="badge bg-warning">(A&E - PADRE PARAISO)</span> 
                        @endif
                        </td>
                        <td>
                            @if ($product->status === 1) 
                            <span class="badge bg-danger">Fechado</span> 
                        @else
                            <span class="badge bg-success">Aberto</span> 
                        @endif
                        </td>
                    <td>
                        {{ $product->updated_at->format('d/m/y') }} ás {{ $product->updated_at->format('H:i:s') }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#updatePrecoSugest" wire:click="editProductTicket({{$product->id}})">
                            <i class="fas fa-inbox"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <td>
                    <th>Não dado procurado foi encontrado!</th>
                </td>
            @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
      </div>
        <div wire:ignore.self class="modal fade" id="updatePrecoSugest" tabindex="-1" aria-labelledby="updatePrecoSugestLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Preço Sugestão</h4>
                    <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="updatePriceSuggest">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>{{ __('Data da Abertura') }}</h6>
                            <input class="form-control form-control-sm" wire:model="data_abertura" readonly />
                        </div>
                        <div class="col-sm-6">
                            <h6>{{ __('Ultima Atualização') }}</h6>
                            <input class="form-control form-control-sm" wire:model="data_updated" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>{{ __('Nome') }}</h6>
                            <input class="form-control" wire:model="name" readonly />
                        </div>
                        <div class="col-sm-6">
                            <h6>{{ __('Quantidade') }}</h6>
                            <input class="form-control" wire:model="qty" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>{{ __('Data de Validade') }}</h6>
                            <input class="form-control" type="text" wire:model="date_validated" class="form-control" id="date_validated" placeholder="Digite um preço sugestão" readonly/>
                        </div>
                        <div class="col-sm-6">
                            <h6>{{ __('Preço Sugestão') }}</h6>
                            <input class="form-control" type="text" wire:model="price" class="form-control" id="price" placeholder="Digite um preço sugestão" >
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>{{ __('Codigo Interno') }}</h6>
                            <input class="form-control form-control-sm" wire:model="internal_id" readonly />
                        </div>

                        <div class="col-sm-6">
                            <h6>{{ __('Preço sugestivo fornecido por: ') }}</h6>
                            <input class="form-control form-control-sm" wire:model="comprador" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>{{ __('O atendimento foi realizado em') }}</h6>
                            <input class="form-control form-control-sm" wire:model="internal_id" readonly />
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="closeModal" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>