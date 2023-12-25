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
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/asset/css/user/global.css') }}">
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;

        }

        .gradient-custom {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to bottom right, rgba(252, 203, 144, 1), rgba(213, 126, 235, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to bottom right, rgba(252, 203, 144, 1), rgba(213, 126, 235, 1))
        }

        .mask-custom {
            background: rgba(24, 24, 16, .2);
            border-radius: 2em;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.05);
            background-clip: padding-box;
            box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
        }

        #register_form {
            padding: 2vw 0 !important;
        }

        #register_form .login_wrap {
            max-width: 60vw;
            padding: 4vw 5vw;
        }

        #register_form .back_btttn {
            margin-bottom: 15px;
        }

        #register_form .heading_logo {
            margin-bottom: 20px;
        }

        #register_form .footerrr {
            padding-top: 15px;
        }

        #register_form .container {
            padding-right: calc(var(--mdb-gutter-x)*0.5);
            padding-left: calc(var(--mdb-gutter-x)*0.5);
        }

        @media (max-width: 600px) {

            #register_form .login_wrap {
                padding: 3vh 3vw;
                max-width: 100%
            }

            #register_form .heading_logo .logo_img img,
            .footerrr .fttrr_img img {
                max-width: 100px;
            }
        }

        form button {
            position: relative;
            overflow: hidden;
            color: #fff;
            background-color: #c3ac6d;
            border: none;
            border-radius: 0;
            padding: 9px 10px;
        }
    </style>
</head>

<body class="antialiased">
    <section id="register_form" class="login_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="login_wrap">

                        <div class="back_btttn">
                            <a href="{{ asset('/') }}">
                                <i class="fa-solid fa-arrow-left"></i>
                                <!-- Back To Home Page -->
                                {{ __('home.backToHome') }}
                            </a>
                        </div>

                        <form action="{{ __('routes.customer-registration') }}" method="POST" style="font-size: 13px;"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="heading_logo">
                                <div class="login_heading">
                                    <h1>{{ __('home.register') }}</h1>
                                </div>
                                <div class="logo_img">
                                    <a href="{{ asset('/') }}">
                                        <img src="{{ asset('asset/images/lion_werbe_gmbh_logo.webp') }}" alt="empty">
                                    </a>
                                </div>
                            </div>

                            <div class="cred_txt">
                                <p>{{ __('home.register_lines') }}</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.company') }}<span class="reqiurd">*</span>
                                        </label>
                                        <input type="text" class="register_input" name="company">
                                        @if ($errors->has('company'))
                                            <span class="text-danger">{{ __('home.company') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.company_addition') }}</label>
                                        <input type="text" class="register_input" name="company_addition">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="t1">{{ __('home.name') }}<span
                                                class="reqiurd">*</span></label>
                                        <input type="text" class="register_input" id="t1" name="name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ __('home.name') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="t1">{{ __('home.first_name') }}<span
                                                class="reqiurd">*</span></label>
                                        <input type="text" class="register_input" id="t1" name="first_name">
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ __('home.first_name') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="">
                                        <label for="e1">{{ __('home.email') }}<span
                                                class="reqiurd">*</span></label>
                                        <input type="email" class="register_input" id="e1" name="email">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.street_number') }} <span
                                                class="reqiurd">*</span></label>
                                        <input type="text" class="register_input" name="street_number">
                                        @if ($errors->has('street_number'))
                                            <span class="text-danger">{{ __('home.street_number') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.postal_code') }} <span
                                                class="reqiurd">*</span></label>
                                        <input type="text" class="register_input" name="postal_code">
                                        @if ($errors->has('postal_code'))
                                            <span class="text-danger">{{ __('home.postal_code') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.location') }} <span
                                                class="reqiurd">*</span></label>
                                        <input type="text" class="register_input" name="location">
                                        @if ($errors->has('location'))
                                            <span class="text-danger">{{ __('home.location') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.country') }} <span
                                                class="reqiurd">*</span></label>
                                        <select name="country" class="register_input">
                                            <option value="Deutschland">Deutschland</option>
                                            <option value="Österreich">Österreich</option>
                                            <option value="Schweiz">Schweiz</option>
                                            <option value="Italien">Italien</option>
                                            <option value="Niederlande">Niederlande</option>
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ __('home.country') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.website') }}</label>
                                        <input type="text" class="register_input" name="website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.phone') }} <span
                                                class="reqiurd">*</span></label>
                                        <input type="text" class="register_input" name="phone">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ __('home.phone') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.mobile') }}</label>
                                        <input type="text" class="register_input" name="mobile">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.tax_number') }} </label>
                                        <input type="text" class="register_input" name="tax_number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.vat_number') }} </label>
                                        <input type="text" class="register_input" name="vat_number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.register_number') }} </label>
                                        <input type="text" class="register_input" name="register_number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.kd_group') }} </label>
                                        <input type="text" class="register_input" name="kd_group">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.kd_category') }} </label>
                                        <input type="text" class="register_input" name="kd_category">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="c1">{{ __('home.payment_method') }} </label>
                                        <select name="payment_method" class="register_input">
                                            <option value=""></option>
                                            <option value="Sofort ohne Abzug">
                                                Sofort ohne Abzug
                                            </option>
                                            <option value="Lastschrift">
                                                Lastschrift
                                            </option>
                                            <option value="Vorkasse">
                                                Vorkasse</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="register_bank_name">
                                    <div class="">
                                        <label for="c1">{{ __('home.bank_name') }} </label>
                                        <input type="text" class="register_input" name="bank_name">
                                    </div>
                                </div>
                                <div class="col-md-12" id="register_IBAN">
                                    <div class="">
                                        <label for="c1">{{ __('home.IBAN') }} </label>
                                        <input type="text" class="register_input" name="IBAN">
                                    </div>
                                </div>
                                <div class="col-md-12" id="register_BIC">
                                    <div class="">
                                        <label for="c1">{{ __('home.BIC') }} </label>
                                        <input type="text" class="register_input" name="BIC">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="c1">{{ __('home.upload') }} <span
                                                class="reqiurd">*</span></label>
                                        <input type="file" class="form-control" name="upload"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                            style="font-size:13px; margin:5px 0;">
                                        @if ($errors->has('upload'))
                                            <span class="text-danger">{{ __('home.upload') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="c1">{{ __('home.avatar_upload') }}</label>
                                        <input type="file" class="form-control" name="avatar_upload"
                                            aria-describedby="inputGroupFileAddon04" aria-label="avatar_upload"
                                            style="font-size:13px; margin:5px 0;">
                                        @if ($errors->has('avatar_upload'))
                                            <span class="text-danger">{{ __('home.upload') }}
                                                {{ __('home.required') }}<i class="fa fa-exclamation-circle"
                                                    aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="">
                                        <label for="p1">{{ __('home.password') }} <span
                                                class="reqiurd">*</span></label>
                                        <input type="password" class="register_input" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="">
                                        <label for="p1">{{ __('home.confirm_password') }} <span
                                                class="reqiurd">*</span></label>
                                        <input type="password" class="register_input" name="confirm_password">
                                        @if ($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}<i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                </div>

                            </div>



                            <div class="lgg_resi">
                                <div class="submit_btn">
                                    <button type="submit">{{ __('home.register_b') }}</button>
                                </div>
                                <div style="display: flex; align-items:center">
                                    <div class="resig_lnkk">
                                        <p>{{ __('home.already_have_account') }} </p>
                                        <a href="{{ __('routes.customer-login') }}"
                                            style="color: #444; margin-left:10px; font-weight:900">{{ __('home.login_b') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="footerrr">
                                <div class="fttrr_img">
                                    <img src="{{ asset('asset/images/lion_werbe_gmbh_logo.webp') }}" alt="empty">
                                </div>
                                <div class="copy_right_txt">
                                    <p>Copyright Lion Werbe GmbH</p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


</body>
<script>
    $(function() {
        $('#register_bank_name').hide();
        $('#register_IBAN').hide();
        $('#register_BIC').hide();
        $('[name=payment_method]').change(function() {
            if ($(this).val() == "Lastschrift") {
                $('#register_bank_name').show();
                $('#register_IBAN').show();
                $('#register_BIC').show();
            } else {
                $('#register_bank_name').hide();
                $('#register_IBAN').hide();
                $('#register_BIC').hide();
            }
        })
    })
</script>

</html>
