@extends('components.partials.alert-toast')

@section('alert')
    <div x-data="toast()" class="toast-container position-fixed bottom-0 end-0 p-3"
        @success.window="show('success', $event.detail)" @danger.window="show('danger', $event.detail)"
        @warning.window="show('warning', $event.detail)" @info.window="show('info', $event.detail)">
        <div id="toast" :class="'bg-' + type" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <button type="button" class="btn-close float-end bg-transparent me-2 mt-2"
                data-bs-dismiss="toast" aria-label="Close"></button>
            <div class="toast-body" x-text="msg"></div>
        </div>
    </div>
@endsection
