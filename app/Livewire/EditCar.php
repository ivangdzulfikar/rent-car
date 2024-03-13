<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts/app')]
class EditCar extends Component
{
    #[Validate('required|min:3')]
    public $brand;

    #[Validate('required|min:3')]
    public $model;

    #[Validate('required|min:3')]
    public $number_plate;

    #[Validate('required|min:3|numeric')]
    public $price_perday;


    
    public function render()
    {
        return view('livewire.edit-car');
    }
}
