                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Equipe de Atendimento</h3>
  
                        <div class="card-tools">
                          <div class="btn-group">
                            <a type="button" href="{{ route('chamado') }}" class="btn btn-block btn-success"><i class="fas fa-plus"></i> Abrir Chamado</a>
                          </div>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="users-list clearfix">
                        @foreach($teams as $team)
                            <li>
                                @if($team->profile_photo_path == true)
                                
                                    <img src="/storage/{{ $team->profile_photo_path }}" alt="User Image">
                                @endif
                                    <a class="users-list-name" href="#">{{ $team->name }}</a>
                                <span class="users-list-date">Cadastro</span>
                            </li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="card-footer text-center">
                      <a href="javascript:">Ver todos os usuários</a>
                    </div>
                  </div>