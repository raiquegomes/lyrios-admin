<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('NFe') }}
    </x-slot>

<x-slot name="form">    
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>CHAVE DE ACESSO DA NFE</label>
                <input type="text" id="access_key" name="access_key" wire:model="access_key" class="form-control @error('access_key') is-invalid @enderror">
                @error('access_key')
                    <span class="error invalid-feedback">{{ $message }}</p>
                @enderror
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
                <label for="exampleInput1">Ferramentas</label><br>
                <button type="button" class="btn btn-info @error('slips') is-invalid @enderror" data-bs-toggle="modal" data-bs-target="#modal-xl">
                    Informar os boletos
                </button>
                @error('slips')
                <span class="error invalid-feedback">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>
    <div wire:ignore.self class="modal fade" id="modal-xl" tabindex="-1" aria-labelledby="modal-xlLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Informe todos os boletos da nota!</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">N°</th>
                        <th scope="col">CHAVE DE ACESSO (BOLETOS)</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($slips as $index => $product)
                      <tr>
                        <th scope="row">{{$index}}</th>
                        <td>
                            <input type="text" id="slips.{{ $index }}" wire:model="slips.{{ $index }}.slips_key" class="form-control @error('slips.'.$index.'.slips_key') is-invalid @enderror">
                            @error('slips.'.$index.'.slips_key')
                                <span class="error invalid-feedback">{{ $message }}</p>
                            @enderror
                        </td>
                        <td>
                            <button type="button" wire:click="removeSlips({{ $index }})" class="btn btn-danger">Remover</button>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>

                  <button type="button" wire:click="addSlips" class="btn btn-success">Adicionar +</button>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
</x-slot>
<x-slot name="actions">

  <x-jet-button>
      {{ __('INSERIR NOTA') }}
  </x-jet-button>
</x-slot>

</x-jet-form-section>
