<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="storage/images/assets/icon1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/login.css">
    <title>Support System | Registrasi</title>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">

                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Daftar</h3>
                                </div>
                            </div>
                            @if (session('success'))
                                <div>{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('register') }}" method="post" class="signin-form">
                                @csrf
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control" name="username" required>
                                    <label class="form-control-placeholder" name="username"
                                        for="username">Username</label>
                                    @error('username')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control" name="nama" required>
                                    <label class="form-control-placeholder" name="nama" for="nama">Nama
                                        Lengkap</label>
                                    @error('nama')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control" name="email" required>
                                    <label class="form-control-placeholder" name="email" for="email">Email</label>
                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input id="password-field" type="password" name="password" class="form-control"
                                        required>
                                    <label class="form-control-placeholder" name="password"
                                        for="password">Password</label>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    @error('password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded-pill submit px-3">Daftar</button>
                                </div>

                            </form>
                            <p class="text-center">Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/login/jquery.min.js"></script>
    <script src="js/login/popper.js"></script>
    <script src="js/login/bootstrap.min.js"></script>
    <script src="js/login/main.js"></script>

</body>

</html>
