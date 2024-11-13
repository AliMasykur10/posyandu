<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Posyandu</title>

    <!-- General CSS Files -->
    <link href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        referrerpolicy="no-referrer" rel="stylesheet" />

    <!-- CSS Libraries -->
    <link href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}" rel="stylesheet">

    <!-- Template CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex align-items-stretch flex-wrap">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="m-3 p-4">
                        <img alt="logo" class="mb-5 mt-2" src="{{ asset('img/logo_upm.png') }}" width="90">
                        <h4 class="text-dark font-weight-normal">Selamat Datang Di <span class="font-weight-bold">Sistem
                                Informasi Posyandu Desa Jabung Sisir</span>
                        </h4>
                        <p class="text-muted">Sebelum melakukan aktifitas anda harus login terlebih dahulu.</p>
                        @if (session()->has('LoginFail'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('LoginFail') }}
                            </div>
                        @endif
                        <form action="/" class="needs-validation" method="POST" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input autofocus class="form-control" id="username" name="username" required
                                    tabindex="1" type="text">
                                <div class="invalid-feedback">
                                    Silakan Masuk kan Username
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label class="control-label" for="password">Password</label>
                                </div>
                                <input class="form-control" id="password" name="password" required tabindex="2"
                                    type="password">
                                <div class="invalid-feedback">
                                    Silakan Masukkan Password
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div> --}}

                            <div class="form-group text-right">
                                {{-- <a href="auth-forgot-password.html" class="float-left mt-3">
                                    Forgot Password?
                                </a> --}}
                                <button class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4"
                                    type="submit">
                                    Login
                                </button>
                            </div>
                        </form>

                        <div class="text-small mt-5 text-center">
                            Copyright &copy; Universitas Pancamarga
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 min-vh-100 background-walk-y position-relative overlay-gradient-bottom order-1"
                    data-background="{{ asset('img/unsplash/mom-baby.jpg') }}">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            Photo by <a class="text-light bb" href="https://unsplash.com/@jonathanborba"
                                target="_blank">Jonathan Borba</a> on <a class="text-light bb"
                                href="https://unsplash.com" target="_blank">Unsplash</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
