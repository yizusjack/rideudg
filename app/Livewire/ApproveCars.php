<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Picture;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Crypt;

class ApproveCars extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    
    public function render()
    {
        $cars = Car::where('approved_c', false)
        ->paginate(1);
        $placas = [];
        $index = 0;
        foreach($cars as $car){
            $placas[$index] = Crypt::decryptString($car->placas_c);
            $index ++;
        }
        //dd($placas);
        return view('livewire.approve-cars', compact('cars'));
    }
}
