<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        $clientes = User::where('profile',4)
        ->paginate(10);

        return view('admin.clients.index',compact('clientes'));
    }


    public function create()
    {
        # code...
        return view('admin.clients.create');
    }

    public function edit(Request $request)
    {
        # code...
        $rules = [
            'id' => 'required'
        ];
        $messages = [
            'id.required' => "id es requerido"
        ];
        $this->validate($request, $rules, $messages);
        $cliente = user::where('id',$request->id)->first();
        return view('admin.clients.edit',compact('cliente'));
    }

    public function store(Request $request)
    {
        # code...
        // dd($request->all());
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'name.required' => "name es requerido",
            'lastname.required' => "lastname es requerido",
            'email.required' => "email es requerido",
            'dni.required' => "Dni es requerido",
            'password.required' => "password es requerido",
        ];
        $this->validate($request, $rules, $messages);
        $userMail = User::where('email', $request->email)->where('state', 1)->get();
        if (Count($userMail) != 0) {
            # code...
            Session::flash('message_error', 'Email ya en uso');
            return back()->withInput();
        }
        try {
            $trabajador = new User;
            $trabajador->name = $request->name;
            $trabajador->lastname = $request->lastname;
            $trabajador->email = $request->email;
            $trabajador->dni = $request->dni;
            $trabajador->password = Hash::make($request->password);
            $trabajador->profile = 4;
            $trabajador->state = 1;
            $trabajador->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            // dd($th,$request->all());
            Session::flash('message_error', 'error');
            return back()->withInput();
        }
        Session::flash('message', 'usuario creado');
        return redirect()->route('cliente.index');
    }

    public function activate(Request $request)
    {
        # code...
        $rules = [
            'id' => 'required',
            'state' => 'required',
        ];

        $messages = [
            'id.required' => "id es requerido",
            'state.required' => "state es requerido",
        ];
        $this->validate($request, $rules, $messages);

            // dd($request->all());
        try {
            $trabajador = User::where('id',$request->id)->first();
            $trabajador->state = $request->state;
            $trabajador->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            // dd($th,$request->all());
            Session::flash('message_error', 'error');
            return back()->withInput();
        }
        return redirect()->back()->with('message', 'Cambiado asignado correctamente');
    }

    public function updated(Request $request)
    {

        $rules = [
            'id' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            // 'password' => 'required',
        ];

        $messages = [
            'id.required' => "id es requerido",
            'name.required' => "name es requerido",
            'lastname.required' => "lastname es requerido",
            // 'password.required' => "password es requerido",
        ];
        $this->validate($request, $rules, $messages);

        $trabajador = User::where('id', $request->id)
            ->where('state', 1)
            ->first();
        if (empty($trabajador)) {
            # code...
            Session::flash('message_error', 'error 1');
            return back()->withInput();
        }
        try {
            // $trabajador = new User;
            $trabajador->name = $request->name;
            $trabajador->lastname = $request->lastname;
            if ($request->password != null) {
                $trabajador->password = Hash::make($request->password);
            }
            $trabajador->dni = $request->dni;
            $trabajador->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('message_error', 'error th');
            return back()->withInput();
        }
        Session::flash('message', 'usuario Actualizado');
        return redirect()->route('cliente.index');

    }
}
