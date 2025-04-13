<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login Page -Karis Boutique')]
class LoginPage extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        if(!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('error', 'Invalid email or password');
            return;
        }

        if(Auth::user()->role === 'admin') {
            return redirect()->intended('/admin');
        }

        if(Auth::user()->role === 'agent') {
            return redirect()->intended('/agent');
        }
        
        return redirect()->intended('/');
    }
    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
