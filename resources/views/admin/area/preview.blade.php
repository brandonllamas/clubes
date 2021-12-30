@extends('layouts.admin.index')
@section('title_pag')
    Editar {{ $area->producto_name }}
@endsection
@section('title')
    <h1 class="h3 mb-0 text-gray-800"> Editar Area {{ $area->producto_name }}</h1>

@endsection
@section('css')
    <style>
        .imagew {
            width: 100vw;
            height: 30vh;
        }

    </style>
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    😉 {{ Session::get('message') }} 😉
                </div>
            </div>
        </div>
    @endif
    @if (Session::has('message_error'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    😓 {{ Session::get('message_error') }} 😒
                </div>
            </div>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <p>Corregir </p>
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col">
            <img src="{{ asset('files/fotoPortada') . '/' . $area->foto_back }}" class="img-fluid imagew" alt="...">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Editar {{ $area->producto_name }}</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('areas.preview.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre de area <span
                                            class="text-center text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                                        placeholder="Name" required value="{{ $area->producto_name }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Precio para alquilar el
                                        area <span class="text-center text-danger">*</span></label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="price" required name="price" min="1" value="{{ $area->price }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tipo venta <span
                                            class="text-center text-danger">*</span></label>
                                    <select class="form-select form-label" aria-label="Default select example"
                                        name="tipo_pago">
                                        @foreach ($tiposdecompra as $item)
                                            @if ($item->idValueParameter == $area->tipo_pago)
                                                <option value="{{ $item->idValueParameter }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->idValueParameter }}">{{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Categoria<span
                                            class="text-center text-danger">*</span></label>
                                    <select class="form-select form-label" aria-label="Default select example"
                                        name="categoria">
                                        @foreach ($categorias as $item)
                                            @if ($item->id == $area->id_categoria)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->categoria_name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->categoria_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Descripcion <span
                                            class="text-center text-danger">*</span></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="descripcion">{{ $area->descripcion }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Icon Image <span
                                            class="text-center text-danger">*</span></label>
                                    <input class="form-control" type="file" id="formFile" name="icon" accept="image/*">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Back Image <span
                                            class="text-center text-danger">*</span></label>
                                    <input class="form-control" type="file" id="formFile" name="back" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Estado<span
                                            class="text-center text-danger">*</span></label>
                                    <select class="form-select form-label" aria-label="Default select example" name="state"
                                        required>
                                        <option value="1" {{ $area->state == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="2" {{ $area->state == 2 ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Horario de {{ $area->producto_name }}</h6>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        {{-- Lunes --}}
                        @foreach ($dias as $item)

                        <div class="row">
                            <strong> {{ $item }}</strong>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Hora Inicio <span
                                            class="text-center text-danger">*</span></label>
                                    <select class="form-select form-label" aria-label="Default select example"
                                        name="horaInicio_{{ $item }}">
                                        @for ($i = 1; $i < 24; $i = $i + 2)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Hora Final <span
                                            class="text-center text-danger">*</span></label>
                                    <select class="form-select form-label" aria-label="Default select example"
                                        name="horafinal_{{ $item }}">
                                        @for ($i = 1; $i < 24; $i = $i + 2)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        @endforeach




                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
