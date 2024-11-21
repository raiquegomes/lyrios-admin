
<div wire:ignore.self class="modal fade" id="modalGUI" tabindex="-1" aria-labelledby="modalGUILabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Informações de NFe/Boletos</h4>
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
                                <h6>{{ __('Filial') }}</h6>
                                <input class="form-control" wire:model="slip_filial" readonly />
                            </div>
                            <div class="col-sm-6">
                                <h6>{{ __('NFe') }}</h6>
                                <input class="form-control" wire:model="slip_nfe" readonly />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>{{ __('Data da Abertura') }}</h6>
                                <input class="form-control form-control-sm" wire:model="slip_created" readonly />
                            </div>
                            <div class="col-sm-6">
                                <h6>{{ __('Ultima Atualização') }}</h6>
                                <input class="form-control form-control-sm" wire:model="slip_updated" readonly />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">CHAVE DE ACESSO (BOLETOS)</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($viewslip->slips as $index => $slip)
                                    <tr>
                                    <td>
                                        <input type="text" value="{{ $slip->slips_key}}" class="form-control" readonly>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>{{ __('Atendimento CPD:') }}</h6>
                                <input class="form-control" wire:model="cpd_user" readonly />
                            </div>
                            <div class="col-sm-6">
                                <h6>{{ __('Atendimento Financeiro:') }}</h6>
                                <input class="form-control" wire:model="financeiro_user" readonly />
                            </div>
                        </div>       
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button wire:click="closeModalPopover()" type="button" class="btn btn-default">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Voltar</span>
                </button>
                @if(Auth::user()->current_team_id == 1)
                    @if($nfe_status == 0)
                    <button wire:click="confirmAction({{$nfe_id}})" type="button" class="btn btn-warning">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">NF'e Confirmado!</span>
                    </button>
                    <button wire:click="confirmProblem({{$nfe_id}})" type="button" class="btn btn-danger">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">PROBLEMAS TECNICOS (RCF)</span>
                    </button>
                    @endif
                @endif
                @if(Auth::user()->current_team_id == 4)
                    @if($nfe_status == 1)
                    <button wire:click="confirmAction({{$nfe_id}})" type="button" class="btn btn-warning">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Financeiro Ajustado!</span>
                    </button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>