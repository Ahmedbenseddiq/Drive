<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Models\Client;
use App\DTO\LoginDto;
use App\DTO\RegisterDto;
use App\Models\Operator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function register(RegisterDto $registerDto){

        $user = User::create($this->getarray($registerDto));
        // dd($user);

        if ($registerDto->role === 'client') {
            $client = Client::create(['user_id' => $user->id]); 
            return abort(redirect()->route('client.home'));
        } else if ($registerDto->role === 'operator') {
            $operator = Operator::create(['user_id' => $user->id]);
            return abort(redirect()->route('operator.home'));
        } 

    }

    private function getarray(RegisterDto $registerDto){
        return [
            'name' => $registerDto->name,
            'email' => $registerDto->email,
            'password' => $registerDto->password,
            'role' => $registerDto->role
        ];
    }


    public function login(loginDto $loginDto){
        
        $credentials = $this->getarr($loginDto);
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
            // dd($user);
            if ($user->role === 'admin') {
                return abort(redirect()->route('admin.home'));
            } elseif ($user->role === 'client') {
                return abort(redirect()->route('client.home'));
            } elseif ($user->role === 'operator') {
                return abort(redirect()->route('operator.home'));
            }
        }

        return abort(redirect()->route('loginpage')->with('error', 'Incorrect email or password. Please try again.'));
    }

    public function getarr(loginDto $loginDto){
        return [
            'email' => $loginDto->email,
            'password' => $loginDto->password
        ];
    }

    public function logout()
    {
        Auth::logout();
        return abort(redirect()->route('loginpage')->with('success', 'You have been logged out.'));
    }
        
}


