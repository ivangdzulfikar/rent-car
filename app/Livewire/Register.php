<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;


#[Layout('layouts/app')]
class Register extends Component
{
    #[Validate('required|min:3')]
    public $name;

    #[Validate('required')]
    public $email;

    #[Validate('required')]
    public $address;

    #[Validate('required')]
    public $telepon;

    #[Validate('required')]
    public $SIM;

    #[Validate('required')]
    public $password;

    public function create()
    {
        $validated = $this->validate();

        User::create($validated);
        session()->flash('created', 'Registrasi berhasil!');

        $this->reset('name','email', 'address', 'telepon', 'SIM', 'password');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
