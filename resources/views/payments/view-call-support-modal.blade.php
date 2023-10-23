
<div wire:ignore.self class="modal fade" id="modalGUI" tabindex="-1" aria-labelledby="modalGUILabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Informações do Ticket</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating">
                    <div class="modal-body">
                        <div class="row">
                            <div class="row g-2">
                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="ticket_created" placeholder="Data da Abertura" wire:model="ticket_created" disabled>
                                    <label for="ticket_created">{{ __('Data da Abertura') }}</label>
                                  </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="ticket_updated" placeholder="Ultima Atualização" wire:model="ticket_updated" disabled>
                                        <label for="ticket_updated">{{ __('Ultima Atualização') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="ticket_motived" placeholder="Tipo de Guia" wire:model="ticket_motived" disabled>
                                    <label for="ticket_motived">{{ __('Tipo de Guia') }}</label>
                                  </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="ticket_setor_operation" placeholder="Atendimento realizado por:" wire:model="ticket_setor_operation" disabled>
                                        <label for="ticket_setor_operation">{{ __('Atendimento realizado por:') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if($viewTicket->guias->isEmpty())
                        <div class="sm:col-span-2">
                            <h6>{{ __('Informações') }}</h6>
                            <textarea class="form-control" wire:model="ticket_description" rows="8" readonly></textarea>
                        </div>
                        @else
                        <h2 class="fs-5">{{ __('Arquivos') }}</h2>
                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                <ul class="list-unstyled">
                                    @foreach($viewTicket->guias as $index => $guia)
                                    <li>
                                        <a href="{{ asset('storage/' . $guia->url) }}" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> {{ $guia->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <textarea type="text" class="form-control" id="ticket_description" row="3" placeholder="Ultima Atualização" wire:model="ticket_description" disabled></textarea>
                                        <label for="ticket_description">{{ __('Informações Adicionais') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                @if(Auth::user()->current_team_id == 1 && $ticket_status == 0 || $ticket_status == 2)
                <div class="col-auto">
                    <label class="col-form-label">Anexar: </label>
                </div>
                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                <div class="col-auto">
                    <div class="position-relative">
                        <div class="input-group">
                            <input type="file" class="form-control @error('file_g.*') is-invalid @enderror" wire:model="file_g" multiple>
                            @error('file_g.*')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                            @enderror
                            <button class="btn btn-info" wire:click="upload" id="button-addon2">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
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