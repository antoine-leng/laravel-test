<x-app-layout>
    <h2 class="text-xl font-semibold mb-4">Propriétés disponibles</h2>

    <ul>
        @foreach ($properties as $property)
            <li class="mb-2">
                {{ $property->name }} — {{ $property->price_per_night }} €
            </li>
        @endforeach
    </ul>
</x-app-layout>
