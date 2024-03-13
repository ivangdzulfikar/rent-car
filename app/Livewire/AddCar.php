<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts/app')]
class AddCar extends Component
{

    #[Validate('required|min:3')]
    public $brand;

    #[Validate('required|min:3')]
    public $model;

    #[Validate('required|min:3')]
    public $number_plate;

    #[Validate('required|min:3|numeric')]
    public $price_perday;

    public function create()
    {
        $validated = $this->validate();

        Car::create($validated);
        session()->flash('created', 'Data berhasil ditambahkan!');

        $this->reset('brand', 'model', 'number_plate', 'price_perday');
    }

    public function render()
    {
        return view('livewire.add-car');
    }
}
