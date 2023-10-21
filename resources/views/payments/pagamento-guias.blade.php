<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Verificação de nota para emissão de guia.') }}
    </x-slot>

    <x-slot name="form">

      <form id="dropzoneForm">
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

                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="section">Selecione os Arquivos: </label>
                        <input type="file" wire:model="files" multiple>
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
                </div>
                
            </div>
          </form>
    </x-slot>

    <x-slot name="actions">

        <x-jet-button>
            {{ __('Iniciar Chamado') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
