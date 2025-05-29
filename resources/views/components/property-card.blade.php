@props(['property'])

<div class="bg-neutral rounded-lg shadow p-4 flex flex-col justify-between h-full">
    <div>
        <h3 class="text-xl font-semibold text-text mb-1">{{ $property->name }}</h3>
        <p class="text-text font-medium mb-2">{{ number_format($property->price_per_night, 2) }} € / nuit</p>
        <p class="text-sm text-gray-600">{{ $property->description }}</p>
    </div>

    <div class="mt-4">
        <livewire:booking-manager :property-id="$property->id" />
    </div>
</div>
