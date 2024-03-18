<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Profile extends Component
{
    public $name;
    public $email;
    public $address;
    public $sim;
    public $telepon;


    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->address = auth()->user()->address;
        $this->sim = auth()->user()->SIM;
        $this->telepon = auth()->user()->telepon;
    }

    public function edit()
    {
        $user = User::where('name', $this->name)->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'SIM' => $this->sim,
            'telepon' => $this->telepon
        ]);

        session()->flash('updated', 'Profil berhasil diperbaharui!');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
