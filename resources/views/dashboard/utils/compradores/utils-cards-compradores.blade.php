<div class="row">
    @foreach($responseTimes as $comprador)
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-danger">
            <h3 class="widget-user-username">{{ $comprador['attendant'] }}</h3>
            <h5 class="widget-user-desc">{{ $comprador['departamento'] }}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" @if($comprador['profile_photo_path'] == '') src="/storage/profile-photos/Logo.png" @else src="/storage/{{$comprador['profile_photo_path']}}" @endif alt="{{ $comprador['attendant'] }}">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">0</h5>
                  <span class="description-text">ULTIMO LOGIN</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header"></h5>
                  <span class="description-text">PRODUTOS ATENDIDOS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">{{ \Carbon\CarbonInterval::seconds($comprador['average_response_time'])->cascade()->forHumans(); }}</h5>
                  <span class="description-text">TEMPO DE RESPOSTA</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
      @endforeach
</div>
