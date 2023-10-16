<section class="section">
    <div class="card">
        <div class="card-header">
            Registros de Cortes (Supermercado P&F)
        </div>
        <div class="card-body">
            <table id="cut_pf" class="table table-striped">
                <thead>
                    <tr>
                        <th>Codigo de Barra</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($CutInto as $CutIntos)
                    <tr>
                        <th>{{ $CutIntos->EAN }}</th>
                        <td>{{ $CutIntos->Qty }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>