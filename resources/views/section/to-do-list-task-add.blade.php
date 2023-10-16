<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Adicionar um tarefa') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-md-6">
            <div class="form-group mandatory row align-items-center @error('title') is-invalid @enderror">
                <div class="col-lg-2 col-3">
                    <label class="col-form-label">Tarefa:</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-jet-input id="title" name="title" wire:model="title" class="form-control" placeholder="Informe a atividade" data-parsley-required="true" />
                    <x-jet-input-error for="title" />
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row align-items-center @error('section') is-invalid @enderror">
                <div class="col-lg-2 col-3">
                    <label class="col-form-label">Departamento:</label>
                </div>
                <div class="col-lg-10 col-9">
                    <select id="section" name="section" class="form-select" wire:model="section">
                        <option>Selecione o Setor</option>
                        @foreach ($team as $teams)
                            <option value="{{ $teams->id}}">{{ $teams->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="section"/>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row align-items-center @error('start_task_date') is-invalid @enderror">
                <div class="col-lg-2 col-3">
                    <label class="col-form-label">Inicio:</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="date" id="start_task_date" name="start_task_date" wire:model="start_task_date" class="form-control" placeholder="Data de inicio da atividade" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    <x-jet-input-error for="section"/>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row align-items-center @error('end_task_date') is-invalid @enderror">
                <div class="col-lg-2 col-3">
                    <label class="col-form-label">Fim:</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="date" id="end_task_date" name="end_task_date" wire:model="end_task_date" class="form-control" placeholder="Data de finalização da atividade" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    <x-jet-input-error for="section"/>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="block text-sm font-medium text-gray-700">Informações sobre a tarefa designada: (Opcional)</label>
            <textarea id="description" name="description" rows="5" class="form-control" placeholder="Digite as informações do produto..." wire:model="description">
            </textarea>
            <x-jet-input-error for="description"/>
        </div>

    </x-slot>

    <x-slot name="actions">

        <x-jet-button>
            {{ __('Adicionar Tarefa') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
