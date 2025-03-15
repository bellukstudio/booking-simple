<?php

namespace App\Application\UseCase\Register;

use App\Domain\Repositories\RegisterRespositoryInterface;
use Illuminate\Support\Facades\Hash;

class ProcessRegisterUseCase
{

    private RegisterRespositoryInterface $registerRepository;

    public function __construct(RegisterRespositoryInterface $registerRespository)
    {
        $this->registerRepository = $registerRespository;
    }

    public function execute(array $data)
    {
        return $this->registerRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
