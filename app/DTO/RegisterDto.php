<?php

namespace App\DTO;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterDto
{
 
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
        public string $image,){}


    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        // dd($request);
        $name = $request->validated()['name'];
        $email = $request->validated()['email'];
        $password = Hash::make($request->validated()['password']);
        $role = $request->validated()['role'];
        $image = $request->validated()['image'];
    
        return new self($name, $email, $password, $role, $image);
    }
}   
