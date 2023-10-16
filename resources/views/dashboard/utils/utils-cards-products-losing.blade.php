
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">PRODUTOS EM VENCIMENTO</h5>
                
                <div class="card-tools">
                    <div class="btn-group">
                        <a type="button" href="{{ route('productsVal') }}" class="btn btn-block btn-primary"><i class="fas fa-plus"></i> Adicionar Produto</a>
                    </div>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data de Vencimento</th>
                                <th>Filial</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($searchProducts)
                            @foreach ($searchProducts as $searchProduct)
                                <tr class="table-danger">
                                    <th class="text-bold-500">
                                        {{ $searchProduct->name}}
                                    </th>
                                    <td class="text-bold-500">
                                        {{ $searchProduct->date_validated->format('d/m/y') }}
                                    </td>
                                    <td class="text-bold-500">
                                        @if($searchProduct->Filial === 1)
                                        P&F
                                        @else
                                        A&E
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>