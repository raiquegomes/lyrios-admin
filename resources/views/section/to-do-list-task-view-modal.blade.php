
<div wire:ignore.self class="modal fade text-left" aria-modal="true" id="taskEditModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Informações da Atividade</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="taskEditUser">
                        <div class="modal-body">
                            <div class="form-group @error('task_id') is-invalid @enderror">
                                <x-jet-label for="task_id" value="{{ __('Identificação da Atividade') }}" />
                                <input type="number" class="form-control" id="task_id" name="task_id" wire:model="task_id" readonly/>
                                <x-jet-input-error for="task_id" />
                            </div>
                            <div class="form-group @error('task_title') is-invalid @enderror">
                                <x-jet-label for="task_title" value="{{ __('Atividade') }}" />
                                <input type="text" class="form-control" id="task_title" name="task_title" wire:model="task_title" readonly/>
                                <x-jet-input-error for="task_title" />
                            </div>
                            <div class="form-group @error('task_description') is-invalid @enderror">
                                <x-jet-label for="task_description" value="{{ __('Descrição da Atividade') }}" />
                                <textarea class="form-control" id="task_description" name="task_description" wire:model="task_description" rows="4" readonly></textarea>
                                <x-jet-input-error for="task_description" />
                            </div>
                            <div class="form-group">
                                <x-jet-label for="task_observation" value="{{ __('Observação') }}" /><small class="text-muted"><i>Esse campo e usado pelos funcionários para relatar dificuldades que ocorreu ao longo da atividade.</i></small>
                                <textarea class="form-control" id="task_observation" name="task_observation" wire:model="task_observation" rows="6"></textarea>
                                <x-jet-input-error for="task_observation" />
                            </div>                        
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Gravar</button>
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Voltar</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>