<div class="card my-3">
    <div class="card-body">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
        <hr>
        {{ $content }}
    </div>
</div>
