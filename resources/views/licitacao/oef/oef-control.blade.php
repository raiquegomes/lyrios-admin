<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Produtos de OEF's</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar...">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Ultima At.</th>
                <th>Estoque</th>
                <th>Enviado</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
                @forelse($products_oef as $products)
                <tr>
                    <td>{{ $products->product_id }}</td>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->updated_at }}</td>
                    <td><span class="tag tag-success">{{ $products->quantity }}</span></td>
                    <td>0</td>
                    <td><button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                </tr>
                @empty
                <tr>
                    <td>Nenhum resultado encontrado...</td>
                </tr>
                @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>