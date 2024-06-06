@extends('components.partials.alert-toast')

@section('alert')
    <div x-data="toast()" id="alert" class="alert alert-dismissible fade hide" role="alert"
        :class="'alert-' + type" @success.window="show('success', $event.detail)"
        @danger.window="show('danger', $event.detail)" @warning.window="show('warning', $event.detail)"
        @info.window="show('info', $event.detail)">
        <span x-text="msg"></span>
        <button type="button" class="btn-close bg-transparent" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsection
