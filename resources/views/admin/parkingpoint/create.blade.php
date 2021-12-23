@extends('layouts.admin.index')
@section('title_pag')
    Crear Clientes
@endsection
@section('title')
    <h1 class="h3 mb-0 text-gray-800">Crear Clientes</h1>

@endsection
@section('css')
    <style>
        .map {
            width: 100%;
            height: 500px;
            margin-bottom: 3px
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
    <form action="{{ route('cliente.create.store') }}" method="post">

        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detalle Dueño Punto</h6>
                    </div>

                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name<span
                                            class="text-center">*</span></label>
                                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                                        placeholder="Name" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Lastname <span
                                            class="text-center">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Lastname" required name="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Documento de identidad<span
                                            class="text-center">*</span></label>
                                    <input type="text" class="form-control" name="dni" id="exampleFormControlInput1"
                                        placeholder="Documento de identidad" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email<span
                                            class="text-center">*</span></label>
                                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                                        placeholder="Email" required>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">password <span
                                            class="text-center">*</span></label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="password" required name="password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detalle Dueño Punto Parking</h6>
                    </div>

                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre del punto<span
                                            class="text-center">*</span></label>
                                    <input type="text" class="form-control" name="name_parking"
                                        id="exampleFormControlInput1" placeholder="Name" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Cellphone <span
                                            class="text-center">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Lastname" required name="cellphoneparking">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Direccion<span
                                            class="text-center">*</span></label>
                                    <input type="text" class="form-control" name="direction" id="exampleFormControlInput1"
                                        placeholder="Direccion" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div id="map" class="map"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection
@section('script')
    <script>
        let map;
        initMap();

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: {
                    lat: -33,
                    lng: 151
                },
            });
            const image =
                "{{ asset('assets/image/icon/shop-svgrepo-com.svg') }}";
            const beachMarker = new google.maps.Marker({
                position: {
                    lat: -33.89,
                    lng: 151.274
                },
                map,
                icon: image,
            });
        }
    </script>
@endsection
