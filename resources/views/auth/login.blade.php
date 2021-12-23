<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
        /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url("{{ asset('assets/image/car-6810885 (1).jpg') }}");
            background-size: cover;
            background-position: center center;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image">

            </div>



            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">Login</h3>
                                <p class="text-muted mb-4">Login your account admin</p>
                                <div class="row">
                                    <div class="col">
                                        @if (Session::has('message'))
                                            <div class="alert alert-success alert-dismissible text-center" role="alert">

                                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" >
                                                    <span aria-hidden="true">&times;</span>
                                                 </button>
                                                😉 {{ Session::get('message') }} 😉
                                            </div>
                                        @endif
                                        @if (Session::has('message_error'))
                                            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" >
                                                    <span aria-hidden="true">&times;</span>
                                                 </button>
                                                😓 {{ Session::get('message_error') }} 😒
                                            </div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" >
                                                    <span aria-hidden="true">&times;</span>
                                                 </button>
                                                😓 {{ Session::get('error') }} 😒
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="inputEmail" type="email" name="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="inputPassword" type="password" name="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    {{-- <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Remember password</label>
                                    </div> --}}
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Login</button>

                                    </div>
                                    <div class="text-center d-flex justify-content-between mt-4">
                                        <p>Desarollador por <a href="#" class="font-italic text-muted">
                                                <u>Darkmoon Companny</u></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
