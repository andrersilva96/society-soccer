<div>
    @push('title', 'Times')

    <form wire:submit.prevent="submit" class="row">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Número de jogadores por time." wire:model="num">
            <button class="btn btn-primary" type="submit">Sortear Times</button>
        </div>
        @error('num')
            <x-error :message="$message"></x-error>
        @enderror
    </form>

    <div class="row">
        @foreach (\App\Models\Sort::orderByDesc('id')->get() as $sort)
            <h1>Sorteio: {{ $sort->id }}</h1>
            @foreach ($sort->teams as $team)
                <div class="col-12 col-lg-6">
                    <table class="table mb-0 table-bordered mb-3">
                        <tbody>
                            @foreach ($team->players()->orderByRaw('is_goalkeeper DESC, level DESC')->get() as $k => $player)
                                <tr>
                                    <td class="{{ $player->is_goalkeeper ? 'fw-bold' : '' }}">
                                        {{ $k + 1 }}. {{ $player->name }}
                                        {{ $player->is_goalkeeper ? '(Goleiro)' : '' }}
                                    </td>
                                    <td class="text-center">
                                        {{ __('levels.' . \App\Enums\Level::array_flip($player->level)) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
