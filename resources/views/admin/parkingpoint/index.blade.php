@extends('layouts.admin.index')
@section('title_pag')
    Zonas de parking
@endsection
@section('title')
    <h1 class="h3 mb-0 text-gray-800">Zonas de parking</h1>

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

    <div class="row mb-3">
        <div class="col-11"></div>
        <div class="col">
            <a href="{{ route('punto.create') }}" class="btn btn-primary">+</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nombre Parking</th>
                                    <th>direction</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $key => $item)
                                    <tr>
                                        <td>#</td>
                                        <td>{{ $item->getDetalle->name_parking }}</td>
                                        <td>{{ $item->getDetalle->direction  }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <form action="{{ route('cliente.create.activate') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                @if ($item->state == 1)
                                                    <input type="hidden" name="state" value="2">
                                                    <button class="btn btn-success" style="color: white"
                                                        type="submit">Activo</button>
                                                @else
                                                    <input type="hidden" name="state" value="1">
                                                    <button class="btn btn-warning" style="color: white"
                                                        type="submit">Inactivo</button>
                                                @endif
                                            </form>


                                        </td>
                                        <td>
                                            <a  class="btn btn-primary" href="{{ route('cliente.edit', ['id'=>$item->id]) }}" >
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $clientes->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
