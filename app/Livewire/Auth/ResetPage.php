<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Str;

#[Title('Reset Password - Karis Boutique')]
class ResetPage extends Component
{
    #[Url]
    public $email;
    public $password;
    public $password_confirmation;
    public $token;

    public function mount($token)
    {
        $this->token = $token;
    }
    
    public function resetPassword()
    {
        $this->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:35|confirmed',
            'password_confirmation' => 'required',
        ]);

        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'token' => $this->token
        ], function($user, $password){
            $password= $this->password;
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            event(new PasswordReset($user));
        });

        return $status === Password::PASSWORD_RESET?redirect('/login'):session()->flash('error','Something went wrong');
    }

    public function render()
    {
        return view('livewire.auth.reset-page');
    }
}
