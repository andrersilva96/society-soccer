<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required
                    autocomplete="new-password">
            </div>

            <div class="mb-3">
                <label for="new-password" class="form-label">Senha</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                required autocomplete="new-password">
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}" class="m-3">Já possui conta?</a>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
