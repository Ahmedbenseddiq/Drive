<?php

namespace App\DTO;

use App\Http\Requests\LoginRequest;

class LoginDto
{
 
    public function __construct(
        public string $email,
        public string $password,){}


    public static function fromRequest(LoginRequest $request): LoginDto
    {
        // dd($request);
        $email = $request->validated()['email'];
        $password = $request->validated()['password'];

        return new self($email, $password);
    }
}   