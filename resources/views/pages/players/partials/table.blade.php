<table class="table table-striped mb-0 table-bordered mb-3">
    <thead>
        <tr>
            <th>Nome</th>
            <th class="text-center">Nível</th>
            <th class="text-center">É Goleiro?</th>
            <th class="text-center">Confirma Presença?</th>
            <th class="text-center">Ação</th>
        </tr>
    </thead>
    <tbody x-data>
        @foreach (\App\Models\Player::orderBy('id', 'desc')->get() as $player)
            <tr>
                <td>{{ $player->name }}</td>
                <td class="text-center">{{ __('levels.'.\App\Enums\Level::array_flip($player->level)) }}</td>
                <td class="text-center">{{ $player->is_goalkeeper ? 'Sim' : 'Não' }}</td>
                <td class="text-center">{{ $player->is_presence ? 'Sim' : 'Não' }}</td>
                <td x-data class="text-center">
                    <button class="btn btn-sm btn-warning" @click="window.scrollTo({top: 0})"
                        wire:click="update({{ $player->id }})">
                        @include('icons.pencil')
                    </button>
                    <button class="btn btn-sm btn-danger" @click="window.scrollTo({top: 0})"
                        wire:click="delete({{ $player->id }})">
                        @include('icons.x')
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
