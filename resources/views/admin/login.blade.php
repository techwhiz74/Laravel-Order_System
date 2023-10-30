<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Lion Werbe GmbH | Bestellsystem Stickprogramme & Vektordateien</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/asset/css/user/global.css') }}">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<div class="alert-messages">
    @if (Session::has('danger'))
        <p class="alert alert-danger" style="text-align: center;">
            {{ Session::get('danger') }}
        </p>
    @endif
</div>


<body class="antialiased">
    <section class="login_section">

        <div class="container">
            <div class="row justify-content-center">


                <div class="col-md-12" style="height: 100vh; display:flex; align-items:center;">
                    <div class="login_wrap">

                        @if (Session::has('danger'))
                            <p class="alert alert-danger" style="text-align: center;">
                                {{ Session::get('danger') }}
                            </p>
                        @endif
                        <!-- @if (Session::has('message'))
<p class="alert alert-danger" style="text-align: center;">
                            {{ Session::get('message') }}

                        </p>
@endif -->
                        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                        <div class="back_btttn">
                            <a href="{{ asset('/') }}">
                                <i class="fa-solid fa-arrow-left"></i>
                                <!-- Back To Home Page -->
                                {{ __('home.backToHome') }}
                            </a>
                        </div>
                        <form method="POST" auto-complete="off" action="{{ __('routes.admin-sign-in') }}">
                            <div class="login_heading">
                                <h1>Admin Login</h1>
                            </div>

                            @csrf
                            <div class="row">
                                <div class="form_dv">
                                    <input type="email" placeholder="Email*" class="form-control" name="email" />
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>

                                <!-- Password input -->
                                <div class="form_dv">
                                    <input type="password" id="form3Example4" class="form-control"
                                        autocomplete="new-password" name="password" />
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>

                                <!-- Checkbox -->
                                <!-- <div class="form-check d-flex subscribe-checkbox">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                    <label class="form-check-label" for="form2Example33">
                                        Subscribe to our newsletter
                                    </label>
                                </div> -->

                                <!-- Submit button -->
                                <div class="submit_btn">
                                    <button type="submit">
                                        Sign in
                                    </button>
                                </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>
