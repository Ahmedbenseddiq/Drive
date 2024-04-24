<?php

namespace App\Http\Controllers;


use App\DTO\LoginDto;
use App\DTO\RegisterDto;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Request;
use App\Repositories\UserRepositoryInterface;

class AuthController extends Controller
{
    public function __construct(public UserRepositoryInterface $repository){

    }


    public function loginpage()
    {
        return view('auth.login');
    }

    public function registerpage()
    {
        return view('auth.register');
    }

    public function restricted(){
        return view('auth.restricted');
    }


    public function register(registerRequest $registerRequest)
    {
       $resiterDto = RegisterDto::fromRequest($registerRequest);

       $this->repository->register($resiterDto);
    }


    public function login(LoginRequest $loginRequest)
    {
        $loginDto = LoginDto::fromRequest($loginRequest);

        $this->repository->login($loginDto);

    }

    public function logout(Request $request)
    {
        $this->repository->logout();

        return redirect('/');
    }
    
}
