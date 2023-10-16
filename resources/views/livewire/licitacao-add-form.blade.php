    <div class="modal fade" id="modalAction" tabindex="-1" aria-labelledby="modalActionLabel" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Abertura de Processo de Licitação</h4>
              <button type="button" class="close" wire:click="closeModalAction()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="submitForm">
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>N° do Processo: </label>
                        <input class="form-control @error('id_processo') is-invalid @enderror" id="id_processo" type="number" wire:model="id_processo" placeholder="Informe o N° do processo" @error('id_processo') aria-describedby="id_processo-error" aria-invalid="true" @enderror />
                        
                        @error('id_processo')<span id="id_processo-error" class="error invalid-feedback">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="destino">Destinatário: </label>
                        <input id="destino" type="text" class="form-control @error('destino') is-invalid @enderror" wire:model="destino" placeholder="Informe o nome do destinatário" @error('destino') aria-describedby="destino-error" aria-invalid="true" @enderror />
                        @error('destino')<span id="destino-error" class="error invalid-feedback">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                    <input type="checkbox" wire:model="shippMercadoria" class="custom-control-input" id="shippMercadoria">
                    <label class="custom-control-label" for="shippMercadoria">Processo está incluido data de entrega</label>
                    </div>
                  </div>
                </div>
                @if($shippMercadoria == true)
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Data da entrega:</label>
                        <input type="date" id="start_task_date" name="start_task_date" wire:model="date_entrega" class="form-control @error('date_entrega') is-invalid @enderror" placeholder="Data de entrega da mercadoria" @error('date_entrega') aria-describedby="date_entrega-error" aria-invalid="true" @enderror data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                          @error('date_entrega')<span id="date_entrega-error" class="error invalid-feedback">{{$message}}</p>@enderror
                  </div>
                </div>
                @endif
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" wire:click="closeModalAction()" class="btn btn-default">Fechar</button>
              <button type="submit" class="btn btn-primary">Abrir</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->