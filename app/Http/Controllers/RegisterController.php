<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;


class RegisterController extends Controller
{

    public function addCustomer(Request $req)
    {
        $this->validate($req, 
        [
            'password' => 'confirmed|min:6'
        ], 
        [
            'password.confirmed'=>'Mật khẩu chưa đúng',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]);

        $customer = new Customer();
        $customer->user_name=$req->username;
        $customer->password = $req->password;
        $customer->first_name = $req->firstname;
        $customer->last_name = $req->lastname;
        $customer->email = $req->email;
        $customer->save();
        return redirect('/home');
    }
}
