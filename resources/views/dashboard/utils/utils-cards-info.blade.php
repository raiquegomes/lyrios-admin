             
        <div>
            <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Funcionários</span>
                    <span class="info-box-number">{{ $team }}</span>
                </div>
            </div>
            <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="far fa-heart"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Produtos</span>
                <span class="info-box-number">{{ $products }}</span>
                </div>
            </div>
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="far fa-comment"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Ticket's</span>
                    <span class="info-box-number">{{ $tickets }}</span>
                </div>
            </div>

            @livewire('utils.utils-cards-team-users')
        </div>
