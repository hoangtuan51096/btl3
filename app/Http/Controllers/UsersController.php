<?php

namespace App\Http\Controllers;

use app\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Str;
use App\Mail\CreateAccount;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    //Hien danh sach account
    public function index()
    {
        $danhsach = $this->userRepository->getAll();
        return view('users.index-users', compact('danhsach'));
    }

    
    public function create()
    {
        return view('users.create-user');
    }

    public function store(UserRequest $request)
    {
        $password = Str::random(8);
        $request['password'] = bcrypt($password);
        $createuser = $this->userRepository->create($request->all());
        $request['password'] = $password;
        Mail::to($request['email'])->send(new CreateAccount($request));
        session()->flash('status', 'Them account thanh cong');
        return redirect()->route('user.index');
    }

    public function resetPassword(Request $request)
    {
        foreach ($request->check as $value) {
            $password = Str::random(8);
            $active = 'new';
            $userById = $this->userRepository->changePassword($value, $password, $active);
            $userEmail = $this->userRepository->find($value)->email;
            Mail::to($userEmail)->send(new ResetPassword($password));
        }
        session()->flash('status', 'Reset Password thanh cong');
        return redirect()->route('user.index');
    }
}
