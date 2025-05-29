<div class="space-y-4">
    @auth
        @if (session()->has('message'))
            <p class="text-green-600">{{ session('message') }}</p>
        @endif

        @if (session()->has('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

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
    @else
        <p class="text-danger">
            Vous devez être connecté pour réserver.
            <a href="{{ route('login') }}" class="underline text-primary">Se connecter</a>
        </p>
    @endauth
</div>
