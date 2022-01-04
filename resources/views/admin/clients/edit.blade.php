@extends('layouts.admin.index')
@section('title_pag')
    Editar Clientes
@endsection
@section('title')
    <h1 class="h3 mb-0 text-gray-800">Editar Clientes</h1>

@endsection
@section('css')

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
                    <p> {{ trans('restaurantes.corregirErrores') }} </p>
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cliente</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('cliente.create.updated') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cliente->id }}">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                                        placeholder="Name" required value="{{ $cliente->name }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Lastname <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Lastname" required name="lastname" value="{{ $cliente->lastname }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Documento de identidad
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="dni" id="exampleFormControlInput1"
                                        placeholder="Documento de identidad" value="{{ $cliente->dni }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email
                                        <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                                        placeholder="Email" required value="{{ $cliente->email }}" disabled>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Situacion</label>
                                    <input type="text" class="form-control" name="situacion" id="exampleFormControlInput1"
                                        placeholder="Situacion actual" required value="{{ $cliente->situacion }}" >
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">password
                                        <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="password" name="password">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
