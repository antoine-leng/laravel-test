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
    public $bookingExists;

    public function mount() 
    {
        if (Auth::check()) {
            $this->bookingExists = Booking::where('user_id', Auth::id())
                ->where('property_id', $this->propertyId)
                ->exists();
        }
    }

    public function submit()
    {
        $this->validate([
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        $this->bookingExists = true;
    }

    public function cancel()
    {
        Booking::where('user_id', Auth::id())
            ->where('property_id', $this->propertyId)
            ->delete();

        $this->bookingExists = false;
    }

}
