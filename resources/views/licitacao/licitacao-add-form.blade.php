    <div class="modal fade" id="modalAction" tabindex="-1" aria-labelledby="modalActionLabel" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-xl" role="document">
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

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">N°</th>
                    <th scope="col">ID do Produto</th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço Unit.</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $index => $product)
                  <tr>
                    <th scope="row">{{$index}}</th>
                    <td>
                        <input type="text" wire:model="products.{{ $index }}.id_product" class="form-control @error('products.'.$index.'.id_product') is-invalid @enderror">
                        @error('products.'.$index.'.id_product')
                            <span class="error invalid-feedback">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input type="text" wire:model="products.{{ $index }}.name" class="form-control @error('products.'.$index.'.name') is-invalid @enderror" readonly>
                        @error('products.'.$index.'.name')
                            <span class="error invalid-feedback">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input type="number" wire:model="products.{{ $index }}.Qty" class="form-control @error('products.'.$index.'.Qty') is-invalid @enderror">
                        @error('products.'.$index.'.Qty')
                            <span class="error invalid-feedback">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input type="text" wire:model="products.{{ $index }}.price" id="price" data-affixes-stay="true" data-thousands="." data-decimal="," class="form-control @error('products.'.$index.'.price') is-invalid @enderror">
                        @error('products.'.$index.'.price')
                            <span class="error invalid-feedback">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <button type="button" wire:click="removeProduct({{ $index }})" class="btn btn-danger">Remover</button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

              <button type="button" wire:click="addProduct" class="btn btn-success">Adicionar Produto</button>
            </div>
            <div class="modal-footer justify-content-between">
              @if($products)
              <button type="button" wire:click="refreshInformacoes" class="btn btn-warning"><i class="fa-solid fa-arrows-rotate"></i></button>
              @endif
              <button type="button" wire:click="closeModalAction()" class="btn btn-default">Fechar</button>
              <button type="submit" class="btn btn-primary">Abrir</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <script>
          $(document).ready(function () {
              $('#price').maskMoney();
          });
        </script>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->