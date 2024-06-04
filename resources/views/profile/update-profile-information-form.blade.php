<div class="mt-3">
    <x-form-section submit="updateProfileInformation">
        <x-slot name="title">
            {{ __('Profile Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your account\'s profile information and email address.') }}
        </x-slot>

        <x-slot name="form">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input id="name" class="form-control" type="text" wire:model="state.name" required autocomplete="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" wire:model="state.email" required autocomplete="username">
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="d-flex justify-content-end">
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <button class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </x-slot>
    </x-form-section>
</div>
