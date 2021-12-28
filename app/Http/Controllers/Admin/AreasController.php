<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AreasController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        $area = area::where('state', '!=', 3)->paginate(10);

        return view('admin.area.index', compact('area'));
    }

    public function create(Request $request)
    {
        # code...
        return view('admin.area.create');
    }

    public function preview(Request $request)
    {
        # code...
        $rules = [
            'area' => 'required',
        ];

        $messages = [
            'area.required' => "area es requerido",
        ];
        $this->validate($request, $rules, $messages);
        $area = area::where('id', $request->area)->first();
        if ($area != null) {
            # code...
            return view('admin.area.preview', compact('area'));
        } else {
            Session::flash('message_error', "Area no encontrada");
            return back()->withInput();
        }
    }

    public function store(Request $request)
    {
        # code...
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'descripcion' => 'required',
            'icon' => 'required',
            'back' => 'required'
        ];

        $messages = [
            'name.required' => "Nombre del area es requerido",
            'price.required' => "Precio del area es requerido",
            'descripcion.required' => "descripcion del area es requerido",
            'icon.required' => "descripcion del area es requerido",
            'back.required' => "descripcion del area es requerido",
        ];
        $this->validate($request, $rules, $messages);
        $imagenIcon = $request->file('icon');
        $imagenBack = $request->file('back');
        $ldate = date('Y_m_d_H_i_s');

        if ($imagenIcon != null) {
            $path_imagenIcon = public_path() . '/files/fotoIcon';
            $nombreFile = $request->name . '-' . $ldate . '.png';
        }

        if ($imagenBack != null) {
            # code...
            $path_imagenPortada = public_path() . '/files/fotoPortada';
            $nombreFilePortada = $request->name . '-' . $ldate . '.png';
        }

        DB::beginTransaction();
        try {
            $area = new area();
            $area->area_name = $request->name;
            $area->descripcion = $request->descripcion;
            $area->price = $request->price;

            $area->price = $request->price;

            if ($imagenIcon != null) {
                $area->foto_logo = $nombreFile;
                $imagenIcon->move($path_imagenIcon, $nombreFile);
            }

            if ($imagenBack != null) {
                $area->foto_back = $nombreFilePortada;
                $imagenBack->move($path_imagenPortada, $nombreFilePortada);
            }

            $area->save();


            DB::commit();
        } catch (\Throwable $error) {
            DB::rollback();
            dd($error);
            Session::flash('message_error', "error al crear area");
            return back()->withInput();
        }
        Session::flash('message', 'Area creada');
        return redirect()->route('areas.index');
    }
}
