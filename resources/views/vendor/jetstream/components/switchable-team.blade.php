@props(['team', 'component' => 'jet-dropdown-link'])

<form method="POST" action="{{ route('current-team.update') }}" x-data>
    @method('PUT')
    @csrf

    <!-- Hidden Team ID -->
    <input type="hidden" name="team_id" value="{{ $team->id }}">

    <x-dynamic-component :component="$component" href="#" x-on:click.prevent="$root.submit();">
            <i class="fas fa-users mr-2"></i> {{ $team->name }}
            @if (Auth::user()->isCurrentTeam($team))
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
            @endif
        <div class="dropdown-divider"></div>
    </x-dynamic-component>
</form>
