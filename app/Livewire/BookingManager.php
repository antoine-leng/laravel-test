<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingManager extends Component
{
    public $propertyId;
    public $startDate;
    public $endDate;

    public function submit()
    {
        if (!Auth::check()) {
            session()->flash('error', 'Vous devez être connecté pour réserver.');
            return;
        }
        $this->validate([
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $alreadyBooked = Booking::where('user_id', Auth::id())
            ->where('property_id', $this->propertyId)
            ->exists();

        if ($alreadyBooked) {
            session()->flash('error', 'Vous avez déjà réservé cette propriété du ' . date('d/m/Y', strtotime($this->startDate)) . ' au ' . date('d/m/Y', strtotime($this->endDate)) . '.');
            return;
        }
        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        session()->flash('message', 'Réservation effectuée avec succès du ' . date('d/m/Y', strtotime($this->startDate)) . ' au ' . date('d/m/Y', strtotime($this->endDate)) . '.');

        $this->reset(['startDate', 'endDate']);
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
