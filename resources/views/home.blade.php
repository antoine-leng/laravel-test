<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-primary">
            Propriétés disponibles
        </h2>
    </x-slot>
    <ul>
        @foreach ($properties as $property)
            <li class="mb-2 text-secondary">
                {{ $property->name }} — {{ $property->price_per_night }} € <br>
                {{ $property->description }}
            </li>
        @endforeach
    </ul>
</x-app-layout>
