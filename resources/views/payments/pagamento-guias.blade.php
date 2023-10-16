<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Verificação de nota para emissão de guia.') }}
    </x-slot>

    <x-slot name="form">


        <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Selecione o tipo de nota</label>
                        <select class="form-control @error('status_motived') is-invalid @enderror" wire:model="status_motived">
                            <option value="">Selecione</option>
                            <option value="1">Nota Interestadual</option>
                            <option value="2">Produtor Rural</option>
                            <option value="3">Outros</option>
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
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="section">Departamento: </label>
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                              <div class="btn-group w-100">
                                <span class="btn btn-success col fileinput-button">
                                  <i class="fas fa-plus"></i>
                                  <span>Adicionar arquivo</span>
                                </span>
                                <button type="submit" class="btn btn-primary col start">
                                  <i class="fas fa-upload"></i>
                                  <span>Iniciar Envio</span>
                                </button>
                                <button type="reset" class="btn btn-warning col cancel">
                                  <i class="fas fa-times-circle"></i>
                                  <span>Cancelar Envio</span>
                                </button>
                              </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center">
                              <div class="fileupload-process w-100">
                                <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                  <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                              </div>
                            </div>
                            <div class="table table-striped files" id="previews">
                                <div id="template" class="row mt-2">
                                  <div class="col-auto">
                                      <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                  </div>
                                  <div class="col d-flex align-items-center">
                                      <p class="mb-0">
                                        <span class="lead" data-dz-name></span>
                                        (<span data-dz-size></span>)
                                      </p>
                                      <strong class="error text-danger" data-dz-errormessage></strong>
                                  </div>
                                  <div class="col-4 d-flex align-items-center">
                                      <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                      </div>
                                  </div>
                                  <div class="col-auto d-flex align-items-center">
                                    <div class="btn-group">
                                      <button class="btn btn-primary start">
                                        <i class="fas fa-upload"></i>
                                        <span>Enviar</span>
                                      </button>
                                      <button data-dz-remove class="btn btn-warning cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancelar</span>
                                      </button>
                                      <button data-dz-remove class="btn btn-danger delete">
                                        <i class="fas fa-trash"></i>
                                        <span>Deletar</span>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        @error('section')<span id="section-error" class="error invalid-feedback">{{$message}}</span>@enderror
                    </div>
                </div>
                
            </div>
    </x-slot>

    <x-slot name="actions">

        <x-jet-button>
            {{ __('Iniciar Chamado') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
