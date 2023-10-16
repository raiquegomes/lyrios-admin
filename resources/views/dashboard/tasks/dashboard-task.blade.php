  <div class="row">
    @foreach($team as $teams)
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Equipe - {{ $teams->name }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <ul class="users-list clearfix">
              @foreach($teams->users as $users)
              <li>
                @if($users ->profile_photo_path == true)
                    <img src="/storage/{{ $users->profile_photo_path }}" class="avatar" alt="User Image">
                @endif
                    <a class="users-list-name" href="#">{{ $users->name }}</a>
                    <button type="button" class="btn btn-block bg-gradient-primary btn-sm" wire:click="view({{$users->id}})"><i class="fa fa-info"></i> Informações</button>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    @endforeach
    @if($isModal)
      @include('dashboard.tasks.dashboard-task-modal')
    @endif
</div>