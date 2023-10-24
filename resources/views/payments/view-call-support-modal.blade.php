
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
                        <div class="row">
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="ticket_valor_guia" placeholder="Valor do Imposto (R$)" wire:model="ticket_valor_guia" disabled>
                                        <label for="ticket_valor_guia">{{ __('Valor do Imposto (R$)') }}</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                    <label for="ticket_url_guia">{{ __('GUIA PARA PAGAMENTO: ') }}</label>
                                    <li>
                                        @if($ticket_url_guia)
                                        <a href="{{ asset('storage/' . $ticket_url_guia) }}" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> {{ $ticket_name_guia}}</a>
                                        @endif
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#ModalSendUpload" data-bs-toggle="modal">Informações Contabilidade</button>
                @if(Auth::user()->current_team_id == 1 && $ticket_status == 0 || $ticket_status == 2)
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

<div wire:ignore.self class="modal fade" id="ModalSendUpload" aria-hidden="true" aria-labelledby="ModalSendUploadLabel" tabindex="-1">
    <div class="modal-dialog modal-lg centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Envio da Guia</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="row g-2">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="valor_guia" wire:model="valor_guia">
                        <label for="valor_guia">Valor (R$)</label>
                      </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" readonly id="ticket_id" placeholder="Valor do Imposto (R$)" wire:model="ticket_id">
                            <label for="ticket_valor_guia">{{ __('N° do Ticket)') }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <div class="mb-3">
                            <label for="file_guia" class="form-label">GUIA*: </label>
                            <input type="file" class="form-control @error('file_guia') is-invalid @enderror" wire:model="file_guia" id="file_guia">
                        </div>
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark" wire:click="uploadComprovante">Enviar</button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#modalGUI" data-bs-toggle="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Anexar Comprovante de Pagamento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Hide this modal and show the first with the button below.
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
        </div>
      </div>
    </div>
</div>