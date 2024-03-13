<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
class NavBar extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');

    }

    public function render()
    {
        return view('livewire.nav-bar');
    }
}
