<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page - {{ config('app.name') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/landing-page/styles.css') }}" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100 bg-image" style="background-image: url('{{asset('images/background.jpg')}}')">

    <main class="flex-shrink-0" style="backdrop-filter: blur(5px); ">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary m-3 shadow-sm rounded"
            style="--bs-bg-opacity: .1;">
            <div class="container-fluid px-5">
                <a class="navbar-brand" href="{{ url('/') }}"><span class="fw-bolder text-gradient">
                        <img src="{{ asset('images/favicon.png') }}" alt="Logo" width="30" height="30"
                            class="d-inline-block align-text-top">
                        {{ config('app.name') }}</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class=" btn btn-sm btn-primary"
                                href="{{ route('filament.app.auth.login') }}" role="button">Login / Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5 pb-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-xxl-5">
                        <!-- Header text content-->
                        <div class="text-center text-xxl-start">
                            <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                <div class="text-uppercase">Sekolah &middot; Islam &middot; Terpadu</div>
                            </div>
                            <div class="fs-3 fw-light text-muted">Selamat Datang !</div>
                            <h1 class="display-3 fw-bolder"><span class="text-gradient d-inline">Sistem Informasi My School</span>
                            </h1>
                            <div class="fs-6 mb-5 text-muted">Bagi orang tua/wali murid yang sudah melakukan registrasi silahkan klik tombol login</div>
                            <div
                                class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                <a class="btn btn-primary px-5 py-2 me-sm-3 fs-6 fw-bolder"
                                    href="{{ route('filament.app.auth.login') }}">Login</a>
                                <a class="btn btn-light px-5 py-2 fs-6 fw-bolder"
                                    href="{{ route('filament.app.auth.register') }}">Daftar baru</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <!-- Header profile picture-->
                        <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                            <div class="profile bg-transparent" style="--bs-bg-opacity: .5;">
                                <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                <img class="profile-img" src="{{ asset('images/accounting.png') }}" alt="accounting" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About Section-->
        <section class="bg-light py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xxl-8">
                        <div class="text-center my-5">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                            <p class="lead fw-light mb-4">Lorem ipsum.</p>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit
                                dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid cumque
                                officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
                            <div class="d-flex justify-content-center fs-2 gap-4">
                                <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                                <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                                <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; 2024</div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Core theme JS-->
    <script src="{{ asset('js/landing-page/scripts.js') }}"></script>
</body>

</html>
