<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPage extends Component
{
    public $email = '';

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status=Password::sendResetLink([
            'email' => $this->email
        ]);

        if($status === Password::RESET_LINK_SENT){
            session()->flash('success', 'Password reset link sent to your email');
            $this->email = '';
        }
    }
    public function render()
    {
        return view('livewire.auth.forgot-page');
    }
}
