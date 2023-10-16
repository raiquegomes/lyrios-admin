<section class="section">
    <div class="card">
        <div class="card-header">
            Registros de Cortes (Supermercado A&E)
        </div>
        <div class="card-body">
            <table id="cut_ae" class="table table-striped">
                <thead>
                    <tr>
                        <th>Codigo de Barra</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($CutIntoAE as $CutIntoA)
                    <tr>
                        <th>{{ $CutIntoA->EAN }}</th>
                        <td>{{ $CutIntoA->Qty }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>