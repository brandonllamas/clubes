<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //

    public function index(Request $request)
    {
        # code...

        return view('auth.login');
    }
    public function login(Request $request)
    {
        # code...
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'email.required' =>    "Debes enviar tu correo",
            'password.required' =>  "contraseña requerida",
        ];
        $this->validate($request, $rules, $messages);
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)
            ->first();
        if (!empty($user)) {
            if ($user->state == 1) {
                if (Auth::attempt($credentials)) {

                    return redirect()->route('dashboard');
                } else {
                    Session::flash('message_error', "credenciales incorrecta");
                    return redirect()->route('login');
                }
            } else {
                Session::flash('message_error', "Usuario inactivo");
                return redirect()->route('login');
            }
            dd($request->all());
        } else {
            Session::flash('message_error', "Usuario no existe");
            return redirect()->route('login');
        }
    }

    protected function getLogout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
}
