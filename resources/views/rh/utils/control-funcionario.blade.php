<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Funcionários</h3>

          <div class="card-tools">
            <div class="btn-group">
              <button type="button" class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus" aria-hidden="true"></i> Adicionar Funcionário</button>
            </div>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus" aria-hidden="true"></i>
              </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach($funcionarios as $funcionario)
              <tr>
                <td>{{ $funcionario->id }}</td>
                <td>{{ $funcionario->nome }}</td>
                <td>11-7-2014</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Funcionário</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="form-floating">
                <div class="row">
                    <div class="row g-2">
                        <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ticket_created" placeholder="Nome Completo">
                            <label for="ticket_created">Nome Completo</label>
                        </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ticket_updated" placeholder="Endereço">
                                <label for="ticket_updated">Endereço</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="ticket_updated" placeholder="N° da Casa">
                                <label for="ticket_updated">N° da Casa</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ticket_updated" placeholder="CEP">
                                <label for="ticket_updated">CEP</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ticket_created" placeholder="Cidade" readonly>
                                <label for="ticket_created">Cidade</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ticket_created" placeholder="Cidade" readonly>
                                <label for="ticket_created">Estado</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ticket_created" placeholder="Cidade">
                            <label for="ticket_created">CPF</label>
                        </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ticket_updated" placeholder="RG (Identidade)">
                                <label for="ticket_updated">RG (Identidade)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ticket_created" placeholder="Cidade">
                            <label for="ticket_created">Data de Nascimento</label>
                        </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                  <option selected>Selecione o Departamento</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">Departamento</label>
                              </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="mae" placeholder="Nome da Mãe">
                            <label for="mae">Nome da Mãe</label>
                        </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="pai" placeholder="Nome do Pai">
                                <label for="pai">Nome do Pai</label>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Adicionar</button>
        </div>
      </div>
    </div>
  </div>