<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required
                    autocomplete="current-password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Lembre-me</label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                <a href="{{ route('register') }}" class="m-3">Registrar</a>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
