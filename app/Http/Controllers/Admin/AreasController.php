<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\area;
use App\Models\categorias;
use App\Models\horario_area;
use App\Models\productos;
use App\Models\Value_Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AreasController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        $area = productos::where('state', '!=', 3)->paginate(10);

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
        $area = productos::where('id', $request->area)->first();
        if ($area != null) {
            # code...
            $dias = ["LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO", "DOMINGO"];
            $horario = [];
            foreach ($dias as $key => $value) {
                # code...
                $horario[$value] = horario_area::where('id_area',$request->area)
                ->where('dia',$value)->first();
            }
            $categorias = categorias::where('state', 1)->get();
            $tiposdecompra = Value_Parameter::where('idParameter', 3)->where('state', 1)->get();
            return view('admin.area.preview', compact('area', 'tiposdecompra', 'categorias', 'dias','horario'));
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
            $area = new productos();
            $area->producto_name = $request->name;
            $area->descripcion = $request->descripcion;
            $area->price = $request->price;
            $area->tipo_pago = 9;

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

    public function update(Request $request)
    {
        # code...
        $rules = [
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'descripcion' => 'required',
            'state' => 'required',

        ];

        $messages = [
            'id.required' => "Producto es requerido",
            'name.required' => "Nombre del area es requerido",
            'price.required' => "Precio del area es requerido",
            'descripcion.required' => "descripcion del area es requerido",
            'state.required' => "state del area es requerido",

        ];
        $this->validate($request, $rules, $messages);
        $imagenIcon = $request->file('icon');
        $imagenBack = $request->file('back');
        $ldate = date('Y_m_d_H_i_s');
        $producto = productos::where('id', $request->id)->first();
        if ($producto == null) {
            # code...
            Session::flash('message_error', "error al editar area 1");
            return back()->withInput();
        }

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
            $area = $producto;
            $area->producto_name = $request->name;
            $area->descripcion = $request->descripcion;
            $area->price = $request->price;
            $area->tipo_pago = $request->tipo_pago;
            $area->id_categoria = $request->categoria;

            $area->price = $request->price;

            if ($imagenIcon != null) {
                $area->foto_logo = $nombreFile;
                $imagenIcon->move($path_imagenIcon, $nombreFile);
            }

            if ($imagenBack != null) {
                $area->foto_back = $nombreFilePortada;
                $imagenBack->move($path_imagenPortada, $nombreFilePortada);
            }

            $area->state  = $request->state;
            $area->save();


            DB::commit();
        } catch (\Throwable $error) {
            DB::rollback();
            dd($error);
            Session::flash('message_error', "error al crear area");
            return back()->withInput();
        }
        Session::flash('message', 'Producto actualziado');
        return back()->withInput();
    }

    public function horario(Request $request)
    {
        # code...
        $rules = [
            'id' => 'required'
        ];

        $messages = [
            'id.required' => "Producto es requerido",
        ];
        $this->validate($request, $rules, $messages);
        $dias = ["LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO", "DOMINGO"];
        foreach ($dias as $key => $value) {
            # code...
            if ($request["horaInicio_".$value] != null && $request["horafinal_". $value] != null) {
                # code...
                DB::beginTransaction();
                try {
                    $horario = horario_area::where('dia', $value)
                    ->where('id_area',$request->id)
                    ->first();
                    // dd($horario);
                    if ($horario == null) {
                        # code...
                        $horario = new horario_area();
                    }

                    $horario->id_area = $request->id;
                    $horario->dia = $value;
                    $horario->horainicio = $request["horaInicio_" . $value];
                    $horario->horafinal =  $request["horafinal_" . $value];

                    $horario->save();

                    DB::commit();
                } catch (\Throwable $error) {
                    DB::rollback();
                    dd($error);
                    Session::flash('message_error', "error al crear area");
                    return back()->withInput();
                }
            }
        }
        Session::flash('message', "Horario actualizado");
        return back()->withInput();
    }
}
