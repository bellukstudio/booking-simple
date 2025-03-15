<?php

namespace App\Livewire\Auth;

use App\Application\UseCase\Login\ProcessLoginUseCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|min:6')]
    public $password = '';


    private ProcessLoginUseCase $loginUseCase;

    public function boot(ProcessLoginUseCase $loginUseCase)
    {
        $this->loginUseCase = $loginUseCase;
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        try {
            $this->loginUseCase->execute($credentials);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            $this->addError('email', 'Email atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
