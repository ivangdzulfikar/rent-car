<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts/app')]
class CarsList extends Component
{
    use WithPagination;

    public $search;
    public Car $selectedCar;

    public $editingCarId = null;

    #[Validate('required')]
    public $editingCarBrand;

    #[Validate('required')]
    public $editingCarModel;

    #[Validate('required')]
    public $editingCarNumberPlate;

    #[Validate('required')]
    public $editingCarPricePerDay;

    public $current;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(Car $carId)
    {
        // dd($carId->brand);
        $this->editingCarId = $carId->id;
        $this->editingCarBrand = $carId->brand;
        $this->editingCarModel = $carId->model;
        $this->editingCarNumberPlate = $carId->number_plate;
        $this->editingCarPricePerDay = $carId->price_perday;
    }

    public function delete(Car $car)
    {
        $this->selectedCar = $car;
        $this->selectedCar->delete();

        session()->flash('deleted', 'Data berhasil hapus!');
    }

    public function update()
    {
        $validated = $this->validate();
        Car::find($this->editingCarId)->update([
            'brand' => $this->editingCarBrand,
            'model' => $this->editingCarModel,
            'number_plate' => $this->editingCarNumberPlate,
            'price_perday' => $this->editingCarPricePerDay
        ]);

        session()->flash('updated', 'Data berhasil di update!');
        $this->cancelEdit();
    }

    public function cancelEdit()
    {
        $this->reset('editingCarId');
    }

    public function render()
    {
        $cars = Car::latest()
            ->where('brand', 'like', "%{$this->search}%")
            ->orWhere('model', 'like', "%{$this->search}%")
            ->orWhere('model', 'like', "%{$this->search}%")
            ->paginate(10);
        return view('livewire.cars-list', [
            'cars' => $cars
        ]);
    }
}
