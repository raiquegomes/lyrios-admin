
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Todos os chamados</h3>
        <div class="card-tools">
            <div class="btn-group">
                <select wire:model="filial" class="form-control">
                    <option>Selecione uma Filial</option>
                    @foreach ($filial_all as $filials)
                        <option value="{{ $filials->id }}">{{ $filials->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="btn-group">
                <input type="text" wire:model="search" class="form-control float-right" placeholder="Digite a identificação">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
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
                        Filial
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Motivo
                    </th>
                    <th>
                        Gerente
                    </th>
                    <th>
                        Operador
                    </th>
                    <th>
                        Ultima Atualização
                    </th>
                    <th>
                       AÇÕES
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                    <tr @if($ticket->status === 2) class="table-warning" @endif>
                        <th>
                            {{ $ticket->id }}
                        </th>
                        <td >
                        @if ($ticket->filial === 1) 
                            <span class="badge bg-warning">(P&F - ARAÇUAI)</span> 
                        @endif
                        @if ($ticket->filial === 2) 
                            <span class="badge bg-warning">(A&E - ARAÇUAI)</span> 
                        @endif
                        @if ($ticket->filial === 3) 
                            <span class="badge bg-warning">(A&E - PADRE PARAISO)</span> 
                        @endif
                        </td>
                        <td>
                        @if($ticket->status === 0) 
                            <span class="badge bg-success">Aberto</span> 
                        @endif
                        @if($ticket->status === 1) 
                            <span class="badge bg-danger">Fechado</span> 
                        @endif
                        @if($ticket->status === 2) 
                            <span class="badge bg-warning">Chamado em Analisado </span> 
                        @endif
                        </td>
                        <td>
                            @if($ticket->motived == 1) Promoção de Validade @endif @if($ticket->motived == 2) Remover produto da promoção @endif @if($ticket->motived == 3) Inconsistência de valor de produto @endif @if($ticket->motived == 4) Duvida sobre produto @endif
                        </td>
                        <td>
                            <p class="font-bold ms-3 mb-0">{{ $ticket->user->name }}</p>
                        </td>
                        <td>
                            <p class="font-bold ms-3 mb-0">{{ $ticket->name_operator }}</p>
                        </td>
                        <td>
                            {{ $ticket->updated_at->format('d/m/y') }} ás {{ $ticket->updated_at->format('H:i:s') }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" wire:click="view({{ $ticket->id }})">
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
        {{ $tickets->links() }}
      </div>
      <!-- /.card-body -->
      @if($isModalOpen)
      @include('tickets.view-call-support-modal')
      @endif
  </div>