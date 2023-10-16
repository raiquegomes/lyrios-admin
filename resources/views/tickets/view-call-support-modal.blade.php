
<div wire:ignore.self class="modal fade" id="modalGUI" tabindex="-1" aria-labelledby="modalGUILabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Informações do Ticket</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>{{ __('Repositor') }}</h6>
                                <input class="form-control" wire:model="ticket_operator" readonly />
                            </div>
                            <div class="col-sm-6">
                                <h6>{{ __('Filial') }}</h6>
                                <input class="form-control" wire:model="ticket_filial" readonly />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>{{ __('Data da Abertura') }}</h6>
                                <input class="form-control form-control-sm" wire:model="ticket_created" readonly />
                            </div>
                            <div class="col-sm-6">
                                <h6>{{ __('Ultima Atualização') }}</h6>
                                <input class="form-control form-control-sm" wire:model="ticket_updated" readonly />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>{{ __('Departamento') }}</h6>
                                <input class="form-control" wire:model="ticket_section" readonly />
                            </div>
                            <div class="col-sm-6">
                                <h6>{{ __('Motivo da Abertura') }}</h6>
                                <input class="form-control" wire:model="ticket_motived" readonly />
                            </div>
                        </div>
                        <hr>
                        <h4>Detalhes do Chamado</h4>
                        @if($viewTicket->products->isEmpty())
                        <div class="sm:col-span-2">
                            <h6>{{ __('Informações') }}</h6>
                            <textarea class="form-control" wire:model="ticket_description" rows="8" readonly></textarea>
                        </div>
                        @else
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Codigo Interno</th>
                                    <th scope="col">Codigo de Barra</th>
                                    <th scope="col">Nome do Produto</th>
                                    <th scope="col">Estoque</th>
                                    <th scope="col">Data de Validade</th>
                                    <th scope="col">Preço Sugestão</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($viewTicket->products as $index => $product)
                                    <tr>
                                    <td>
                                        <input type="text" value="{{ $product->internal_id}}" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $product->EAN }}" class="form-control" readonly>
                                    </td>
                                    <td width="25%">
                                        <input type="text" value="{{ $product->name }}" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $product->Qty }}" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $product->date_validated->format('d/m/y') }}" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $product->safe_price }}" class="form-control" readonly>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                        </div>
                        @endif
                        <hr>
                        <div class="col-sm-6">
                            <h6>{{ __('Atendimento realizado por:') }}</h6>
                            <input class="form-control" wire:model="ticket_setor_operation" readonly />
                        </div>                
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                @if(Auth::user()->current_team_id == 1 && $ticket_status == 0 || $ticket_status == 2)
                <button type="button" class="btn btn-warning" wire:click="createAnalisy({{ $ticket_id }})">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">ABRIR ANALISE</span>
                </button>
                <button type="button" class="btn btn-danger" wire:click="close({{ $ticket_id }})">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Fechar o chamado</span>
                </button>
                @endif
                <button wire:click="closeModalPopover()" type="button" class="btn btn-default">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Voltar</span>
                </button>
            </div>
        </div>
    </div>
</div>