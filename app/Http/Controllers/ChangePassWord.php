<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PasswordRequest;
use App\Repositories\User\UserRepository;

class ChangePassWord extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    //Hien danh sach account
    public function index()
    {
        return view('auth.change-password');
    }
    
    public function update(PasswordRequest $request, $id)
    {
        $active = 'active';
        $password = $this->userRepository->changePassword($id, $request->password, $active);
        Auth::logout();
        return redirect('home');
    }
}
