

        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <span class="font-medium"><b>Tudo certo!</b></span> {{ session('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    Atividades
                </h3>
            </div>
            <div class="card-body">
                <ul class="todo-list">
                    @if($tasks == true)
                        @foreach($tasks as $index => $task)
                            <li wire:key="{{ $index }}" @if($task->completed_at == true) class="done" @endif >
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" id="TaskCheck{{$index}}" value="" wire:click="taskCompleted({{$task->id}})" {{isset($task->completed_at)? 'checked' : ''}}>
                                    <label for="TaskCheck{{$index}}"></label>
                                </div>
                                <span class="text">{{ $task->title }}</span>
                                @if($task->completed_at == true)<small class="badge badge-danger"><i class="far fa-clock"></i> {{ $task->completed_at->format('d/m/y') }} ás {{ $task->completed_at->format('H:i:s') }} </small>@endif
                                <div class="tools">
                                    <a href="#" wire:click="taskEdit({{$task->id}})" ><i class="fas fa-edit"></i></a>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        <div class="card-footer clearfix">
            <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Adicionar Item</button>
        </div>
    </div>