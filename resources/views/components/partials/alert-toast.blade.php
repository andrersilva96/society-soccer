@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div x-init="$nextTick(() => { $dispatch('danger', '{{ $error }}') })"></div>
    @endforeach
@endif

@if ($toast = Session::get('alert'))
    <div x-init="$nextTick(() => { $dispatch('{{ $toast['type'] }}', '{{ $toast['message'] }}') })"></div>
@endif

{{-- !!! PLEASE DO NOT REMOVE - This is the Laravel Jetstream messages !!! --}}
@if ($jestream = Session::get('status'))
    <div x-init="$nextTick(() => { $dispatch('success', '{{ $jestream }}') })"></div>
@endif
{{-- !!! PLEASE DO NOT REMOVE !!! --}}

@yield('alert')

@push('scripts')
    <script>
        function toast() {
            return {
                type: null,
                msg: null,
                show(type, msg) {
                    console.log(12)
                    this.type = type
                    this.msg = msg
                    new bootstrap.Toast(document.getElementById('toast')).show()
                }
            }
        }
    </script>
@endpush
