<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;


#[Layout('layouts/app')]
class Login extends Component
{

    #[Validate('required')]
    public $email;


    #[Validate('required')]
    public $password;

    public function login()
    {
        $validated = $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {

            return redirect()->route('home');
        } else {
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
    }

    public function render()
    {
        return view('livewire.login');
    }
}
