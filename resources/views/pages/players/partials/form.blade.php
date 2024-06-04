<form wire:submit.prevent="save" class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-6 mb-3">
                <label for="name" class="form-label">Nome</label>
                <input id="name" class="form-control" type="text" wire:model="player.name">
                @error('player.name')
                    <x-error :message="$message"></x-error>
                @enderror
            </div>

            <div class="col-12 col-lg-6 mb-3">
                <div class="form-group">
                    <label for="level" class="form-label">Nível</label>
                    <select class="form-control" id="level" wire:model="player.level">
                        <option value="0" disabled selected>Escolha uma opção.</option>
                        @foreach (\App\Enums\Level::array() as $level => $id)
                            <option value="{{ $id }}">{{ __("levels.$level") }}</option>
                        @endforeach
                    </select>
                    @error('player.level')
                        <x-error :message="$message"></x-error>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-lg-6 mb-3">
                <label class="form-label mb-3">É goleiro?</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="1_goalkeep" wire:model="player.is_goalkeeper"
                        value="1">
                    <label class="form-check-label" for="1_goalkeep">
                        Sim
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="0_goalkeeper" wire:model="player.is_goalkeeper"
                        value="0">
                    <label class="form-check-label" for="0_goalkeeper">
                        Não
                    </label>
                </div>
                @error('player.is_goalkeeper')
                    <x-error :message="$message"></x-error>
                @enderror
            </div>

            <div class="col-12 col-lg-6 mb-3">
                <label class="form-label mb-3">Marca presença?</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="1_presencer" wire:model="player.is_presence"
                        value="1">
                    <label class="form-check-label" for="1_presencer">
                        Sim
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="0_presence" wire:model="player.is_presence"
                        value="0">
                    <label class="form-check-label" for="0_presence">
                        Não
                    </label>
                </div>
                @error('player.is_presence')
                    <x-error :message="$message"></x-error>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    @if ($player->exists)
                        @include('icons.person-gear')
                        Atualizar
                    @else
                        @include('icons.person-add')
                        Adicionar
                    @endif
                </button>
            </div>
        </div>
    </div>
</form>
