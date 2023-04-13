<x-layout>
    @include('navbars.main')
    <div class="container px-3 mx-auto">
        <div class="flex justify-between items-center mb-3">
            <span class="normal-case text-xl">{{ $title }}</span>
            @includeWhen($actions, 'toolbars.index')
        </div>
        {{ $slot }}
    </div>
</x-layout>
