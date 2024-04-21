<?php

namespace App\Repositories;

use App\DTO\loginDto;
use App\DTO\RegisterDto;

interface UserRepositoryInterface
{
   public function register(RegisterDto $registerDto);
   public function login(loginDto $loginDto);

   public function logout();
}
