@extends('layouts.admin.index')
@section('title_pag')
    Editar Area {{ $area->area_name }}
@endsection
@section('title')
    <h1 class="h3 mb-0 text-gray-800">  Editar Area {{ $area->area_name }}</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">  Editar Area {{ $area->area_name }}</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('areas.create.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre de area <span
                                            class="text-center text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                                        placeholder="Name" required value="{{ $area->area_name }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Precio para alquilar el area <span
                                            class="text-center text-danger">*</span></label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="price" required name="price" min="1" value="{{ $area->price }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                          <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripcion <span
                                    class="text-center text-danger">*</span></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion">{{ $area->descripcion }}</textarea>
                              </div>
                          </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Icon Image <span class="text-center text-danger">*</span></label>
                                    <input class="form-control" type="file" id="formFile"  name="icon" accept="image/*">
                                  </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Back Image <span class="text-center text-danger">*</span></label>
                                    <input class="form-control" type="file" id="formFile"  name="back" accept="image/*">
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
@endsection
@section('script')

@endsection
