<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="mb-3">
            <x-label class="form-label" for="current_password" value="{{ __('Current Password') }}" />
            <x-input id="current_password" type="password" class="form-control" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-label class="form-label" for="password" value="{{ __('New Password') }}" />
            <x-input id="password" type="password" class="form-control" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-label class="form-label" for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input id="password_confirmation" type="password" class="form-control" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
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
