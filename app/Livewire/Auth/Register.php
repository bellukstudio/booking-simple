<?php

namespace App\Livewire\Auth;

use App\Application\UseCase\Register\ProcessRegisterUseCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|same:password_confirmation',
    ];

    private ProcessRegisterUseCase $registerUseCase;

    public function boot(ProcessRegisterUseCase $registerUseCase)
    {
        $this->registerUseCase = $registerUseCase;
    }

    public function register()
    {
        $this->validate();

        $user = $this->registerUseCase->execute([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        Auth::login($user);

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
