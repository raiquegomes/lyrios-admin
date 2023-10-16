<div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Todos os processos</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm">
              <div class="input-group-append">
                <button type="button" wire:click="showModalAction()" class="btn btn-block btn-success">
                  <i class="fas fa-plus" aria-hidden="true"></i> Abrir Processo
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>N° do Processo</th>
                <th>Destinatário</th>
                <th>Data de Entrega</th>
                <th>Status</th>
                <th>Alerta</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($licitacao as $licitacoes)
              <tr>
                <td>{{ $licitacoes->processo_number }}</td>
                <td>{{ $licitacoes->cliente_nome }}</td>
                <td>{{ $licitacoes->date_entrega }}</td>
                <td>Em andamento</td>
                <td><div class="form-group">
                  <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="a">
                  <label class="custom-control-label" for="a"></label>
                  </div>
                </div></td>
                <td><button type="button" wire:click="viewLicitacao({{$licitacoes->id}})" class="btn btn-dark btn-sm"><i class="fa-solid fa-eye"></i></button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @livewire('licitacao-add-form')
  @if($viewProcesso)
    <div wire:ignore.self class="modal fade" id="ModalLicitacao" tabindex="-1" aria-labelledby="ModalLicitacaoLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Licitação - </h4>
            <button wire:click="closeModalLicitacao" class="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4>Informações das licitações</h4>
            <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label>N° do Processo: </label>
                      <input wire:model="licitacao_id_processo" class="form-control" placeholder="Informe o N° do processo" readonly/>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="destino">Destinatário: </label>
                      <input wire:model="licitacao_destino" class="form-control" placeholder="Informe o nome do destinatário" readonly/>
                  </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Data da entrega:</label>
                    <input wire:model="licitacao_date_entrega" class="form-control" placeholder="Data de entrega da mercadoria" readonly>
                </div>
              </div>
            </div>
            <h4>Produtos da licitação</h4>
            <div class="row">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID do Produto</th>
                    <th>Nome</th>
                    <th>Preço Unit</th>
                    <th>Quantidade</th>
                    <th>Qt. Disponivel</th>
                  </tr>
                  </thead>
                <tbody>
                  @forelse($viewProcesso->products as $index => $product)
                  <tr wire:key="{{$index}}">
                    <td><input type="text" class="form-control" value="{{ $product->id_product }}" readonly></td>
                    <td><input type="text" class="form-control" value="{{ $product->name }}" readonly></td>
                    <td><input type="text" class="form-control" value="{{ $product->price_unit }}" readonly></td>
                    <td><input type="text" class="form-control" value="{{ $product->quantity }}" readonly></td>
                    <td><input type="text" class="form-control" value="{{ $product->available_quantity  }}" readonly></td>
                  </tr>
                  @empty
                  <tr>
                    <td>Nenhum item foi encontrado!</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <h4>Notas - (EMITIDAS)</h4>
            <div class="row">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Opções</th>
                  </tr>
                  </thead>
                <tbody>
                  @forelse($issuanceNotes as $issuedNote)
                  <tr wire:key="{{$index}}">
                    <td><input type="text" class="form-control" value="{{ $issuedNote->number }}" readonly></td>
                    <td><input type="text" class="form-control" value="{{ $issuedNote->product->name }}" readonly></td>
                    <td><input type="text" class="form-control" value="{{ $issuedNote->quantity }}" readonly></td>
                    <td><a wire:click="removeNote.{{ $issuedNote->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Remover</a></td>
                  </tr>
                  @empty
                  <tr>
                    <td>Nenhum nota foi emitida para esse processo!</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <h4>Adicionar Nota</h4>
              <form wire:submit.prevent="createNote">
              <div class="form-row">
              <input type="hidden" wire:model="note_number" class="form-control" readonly/>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Selecione um Produto</label>
                  <select class="custom-select my-1 mr-sm-2 @error('note_product_id') is-invalid @enderror" wire:model="note_product_id" id="note_product_id" @error('note_product_id') aria-describedby="note_product_id-error" aria-invalid="true" @enderror>
                    <option>Selecione...</option>
                    @foreach($processProducts as $product_view)
                    <option value="{{ $product_view->id }}">{{ $product_view->name }}</option>
                    @endforeach
                  </select>
                  @error('note_number')<span id="note_number-error" class="error invalid-feedback">{{$message}}</p>@enderror
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>N° da Nota:</label>
                    <input type="number" wire:model="note_number" class="form-control @error('note_number') is-invalid @enderror" placeholder="N° da nota emitida" @error('note_number') aria-describedby="id_processo-error" aria-invalid="true" @enderror/>
                    @error('note_number')<span id="note_number-error" class="error invalid-feedback">{{$message}}</p>@enderror
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Quantidade:</label>
                    <input type="number" wire:model="note_quantity" class="form-control @error('note_quantity') is-invalid @enderror" placeholder="Digite a quantidade" @error('note_quantity') aria-describedby="note_quantity-error" aria-invalid="true" @enderror/>
                    @error('note_quantity')<span id="note_quantity-error" class="error invalid-feedback">{{$message}}</p>@enderror
                </div>
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-warning">Adicionar Nota</button>
              </div>
            </div>
          </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button wire:click="closeModalLicitacao" class="btn btn-default">Fechar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endif
  </div>
</div>