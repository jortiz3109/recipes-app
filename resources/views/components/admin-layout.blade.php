<x-layout>
    @include('navbars.main')
    <div class="container px-3 mx-auto">
        {{ $slot }}
    </div>
</x-layout>
