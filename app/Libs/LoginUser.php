<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/10/2017
 * Time: 8:07 AM
 */

namespace App\Libs;


use App\Models\User;
use App\Repositories\Repositories\User\UserRepo;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;

class LoginUser extends Authenticate
{
    public function __construct(){
        $this->userRepo = new UserRepo();
    }
    public function attempt($credentials)
    {
        try
        {
            $user = $this->userRepo->findByEmail($credentials['email']);
        }
        catch (Exception $e)
        {
            return false;
        }
        if(!Hash::check($credentials['password'],$user->password))
            return false;
        return $user;
    }
    public function login(User $user)
    {
        $user->accessToken = $this->generateToken($user);
        $this->userRepo->updateUser($user);
        return $user;
    }
    public function generateToken(User $user){
        $keyString = date('Y-m-d h:i:s');
        $keyString = ($keyString.$user->email.$user->address);
        return bcrypt($keyString);
    }

}