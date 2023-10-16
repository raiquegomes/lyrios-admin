<section class="section">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recebimentos de NFe</h3>
            <div class="card-tools">
                <div class="btn-group">
                    <select wire:model="filial" class="form-control">
                        <option>Selecione uma Filial</option>
                        @foreach ($filial_all as $filials)
                            <option value="{{ $filials->id }}">{{ $filials->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            N°
                        </th>
                        <th>
                            CHAVE DE ACESSO
                        </th>
                        <th>
                            Data do Recebimento
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Filial
                        </th>
                        <th>
                           AÇÕES
                        </th>
                    </tr>
                </thead>
                <tbody>

                @foreach($nfe as $nfs)
                    <tr>
                        <td>{{ $nfs->id }}</td>
                        <td>{{ $nfs->access_key }}</td>
                        <td>{{ $nfs->created_at->format('d/m/y') }} ás {{ $nfs->created_at->format('H:i:s') }}</td>
                        <td>@if ($nfs->entry == 0) 
                            <span class="badge bg-danger">Sem entrada</span> 
                        @endif
                        @if($nfs->entry == 1) 
                            <span class="badge bg-warning">Financeiro Pendente</span> 
                        @endif
                        @if($nfs->entry == 2) 
                            <span class="badge bg-success">NOTA CONFIRMA E AJUSTADA!</span> 
                        @endif
                        </td>
                        <td >
                            @if ($nfs->filial === 1) 
                                <span class="badge bg-primary">1 - P&F</span> <span class="badge bg-dark">(ARAÇUAI - CANOEIRO)</span> 
                            @endif
                            @if ($nfs->filial === 2) 
                                <span class="badge bg-primary">2 - A&E</span> <span class="badge bg-dark">(ARAÇUAI - CENTRO)</span> 
                            @endif
                            @if ($nfs->filial === 3) 
                                <span class="badge bg-primary">3 - A&E</span> <span class="badge bg-dark"> (PADRE PARAISO)</span> 
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn icon btn-primary" wire:click="view({{ $nfs->id }})" data-bs-toggle="tooltip" data-bs-placement="top" title="VISUALIZAR INFORMAÇÕES"><i class="fa-solid fa-eye"></i></button>
                            @if(Auth::user()->current_team_id == 5)
                                <button wire:click="delete({{$nfs->id}})" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="DELETAR NOTA" wire:click="view({{ $nfs->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $nfe->links() }}
    </div>
    @if($isModalOpen)
    @include('NFe.view-nfe-modal')
    @endif
</div>