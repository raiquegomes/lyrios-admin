<x-jet-form-section submit="create">
    <x-slot name="title">
        {{ __('Verificação de nota para emissão de guia.') }}
    </x-slot>

    <x-slot name="form">
        <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="status_motived">Selecione o tipo de nota</label>
                        <select class="form-control @error('status_motived') is-invalid @enderror" id="status_motived" wire:model="status_motived">
                            <option value="">Selecione</option>
                            @foreach ($tips as $tip)
                            <option value="{{ $tip->id }}">{{ $tip->name }}</option>
                            @endforeach
                        </select>
                        @error('status_motived')<span id="status_motived-error" class="error invalid-feedback">{{$message}}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="number_nota" class="form-label">N° da Nota</label>
                    <input type="number" class="form-control @error('number_nota') is-invalid @enderror" id="number_nota" wire:model="number_nota" placeholder="Numero da nota">
                    @error('number_nota')<span id="status_motived-error" class="error invalid-feedback">{{$message}}</span>@enderror
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="filial">Filial</label>
                        <select class="form-control @error('filial') is-invalid @enderror" id="filial" wire:model="filial">
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
                        <label for="files">Selecione os Arquivos: </label>
                        <input type="file" class="form-control @error('files') is-invalid @enderror" id="files" wire:model="files">
                        @error('files')<span id="files-error" class="error invalid-feedback">{{$message}}</span>@enderror
                    </div>
                    @if ($uploading)
                    <div wire:loading>
                        Uploading...
                        @foreach ($uploads as $upload)
                            <div>
                                {{ $upload['name'] }}
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $upload['progress'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                  @endif
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <label for="description">Informações Complementares</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description" rows="3" placeholder="Informações opcionais sobre a guia ..."></textarea>
                      @error('description')<span id="description-error" class="error invalid-feedback">{{$message}}</span>@enderror
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
