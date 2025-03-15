<?php


namespace App\Infrastructure\Repository;

use App\Domain\Repositories\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginRepositoryImpl implements LoginRepositoryInterface
{
    public function login(string $email, string $password): bool
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            session()->regenerate();
            return true;
        }
        return false;
    }
}
