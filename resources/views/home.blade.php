<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-primary">
            Propriétés disponibles
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @forelse ($properties as $property)
            <x-property-card :property="$property" />
        @empty
            <p class="text-text">Aucune propriété disponible pour le moment.</p>
        @endforelse
    </div>
</x-app-layout>
