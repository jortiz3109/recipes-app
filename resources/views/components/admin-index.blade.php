<x-admin-layout :actions="$actions" :title="$title">
    @includeWhen($search, 'search', $search)
    {{ $slot }}
</x-admin-layout>
