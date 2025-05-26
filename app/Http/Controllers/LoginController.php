<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserAddRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        if (auth()->check()) {
            return redirect()->to('');
        }
        return view('home.login');
    }

    public function loginCustomer()
    {
        $remember = request()->has(key: 'remember-me') ? true : false;
        if (auth()->attempt([
            'email' => request()->email,
            'password' => request()->password,
        ])) {
            return redirect()->to('/');
        } else {
            dd("Email or password is incorrect");
        }
    }

    public function signUpCustomer()
    {
        try {
            DB::beginTransaction();
            $customer = $this->customer->create([
                'name' => request()->name,
                'email' => request()->email,
                'password' => Hash::make(request()->password)
            ]);
            auth()->login($customer);
            DB::commit();
            return redirect()->route('indexLogin')->with('success', 'Đăng ký thành công!'); // sẽ redirect về route home nho vao dieu kien trong index()
        } catch (Exception $exception) {
            DB::rollBack(); // hủy tất cả nếu có lỗi 
            Log::error('Message: ' . $exception->getMessage() . '--- Line ' . $exception->getLine());
        }
    }
}
