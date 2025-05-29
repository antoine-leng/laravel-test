<div class="space-y-4">
@auth
    @if ($bookingExists)
        <p class="text-green-700 text-sm">Vous avez réservé cette propriété.</p>

        <button wire:click="cancel" class="bg-danger text-white px-4 py-2 rounded mt-2">
            Annuler la réservation
        </button>
    @else
        <form wire:submit.prevent="submit">
            <input type="hidden" wire:model="propertyId" />

            <div>
                <label for="startDate">Date de début</label>
                <input type="date" id="startDate" wire:model="startDate" class="w-full border rounded">
                @error('startDate') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="endDate">Date de fin</label>
                <input type="date" id="endDate" wire:model="endDate" class="w-full border rounded">
                @error('endDate') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-primary text-white px-4 py-2 rounded mt-2">
                Réserver
            </button>
        </form>
    @endif
@endauth

</div>
