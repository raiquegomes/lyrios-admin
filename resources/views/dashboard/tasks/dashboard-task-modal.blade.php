<div class="modal fade" id="modalAction" wire:ignore.self>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Informações sobre o usuário</h4>
        <button type="button" class="close" wire:click="isModalClose()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          @foreach($user_info as $user)
            <div class="card card-widget widget-user">
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">{{$user->name}}</h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="/storage/{{ $user->profile_photo_path }}" alt="{{ $user->name }}">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ $user->created_at }}</h5>
                      <span class="description-text">Data de inicio</span>
                    </div>
                  </div>
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ $user->email}}</h5>
                      <span class="description-text">EMAIL</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach           
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="isModalClose()">Fechar</button>
      </div>
    </div>
  </div>
</div>