@if ($errors->any())


    <div {{ $attributes }}>
        <div class="alert-heading">{{ __('Ops! Algo deu errado.') }}</div>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
