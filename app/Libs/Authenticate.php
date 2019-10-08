<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/10/2017
 * Time: 8:07 AM
 */

namespace App\Libs;


use App\Repositories\Repositories\User\UserRepo;

Abstract class Authenticate
{
    public $users = null;
    public function __construct()
    {
        $this->users = new UserRepo();
    }
}