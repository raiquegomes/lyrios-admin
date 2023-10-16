<x-jet-form-section submit="calcultor">
    <x-slot name="title">
        {{ __('Validação') }}
    </x-slot>

    <x-slot name="form">
      <div class="col-md-4">
        <x-jet-label value="{{ __('Codigo de Barra')}}" />
      </div>
      <div class="col-md-8">
        <div class="form-group has-icon-left">
          <div class="input-group position-relative">
            <x-jet-input type="text" name="code" id="code" placeholder="Codigo de Barra" autocomplete="code" wire:model="code" class="form-control" />
            <button type="submit" class="btn btn-primary">Validar</button>
            <div class="form-control-icon">
                <i class="bi bi-upc-scan"></i>
              </div>
          </div>
        </div>
        <div class="col-md-8">
            <div class="form-group has-icon-left">
              <div class="position-relative">
                <input class="form-control" type="number" name="number" id="number" wire:model="number" placeholder="" readonly="readonly">
                <div class="form-control-icon">
                  <i class="bi bi-upc-scan"></i>
                </div>
              </div>
            </div>
          </div>
    </x-slot>

</x-jet-form-section>
