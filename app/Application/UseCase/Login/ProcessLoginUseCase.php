<?php

namespace App\Application\UseCase\Login;

use App\Domain\Repositories\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProcessLoginUseCase{

    private LoginRepositoryInterface $loginRepositoryInterface;

    public function __construct(LoginRepositoryInterface $loginRepositoryInterface)
    {

        $this->loginRepositoryInterface = $loginRepositoryInterface;

    }

    public function execute(array $credentials): void
    {
        if (!$this->loginRepositoryInterface->login($credentials['email'], $credentials['password'])) {
            throw ValidationException::withMessages([
                'email' => 'Email atau password salah.',
            ]);
        }

        $user = Auth::user();
        session(['user' => $user]);
    }
}
