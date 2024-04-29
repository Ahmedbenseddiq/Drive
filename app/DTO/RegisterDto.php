<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
        public UploadedFile $image 
    ) {}

    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        $validatedData = $request->validated();

        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $password = Hash::make($validatedData['password']);
        $role = $validatedData['role'];
        $image = $request->file('image'); 

        return new self($name, $email, $password, $role, $image);
    }
}
