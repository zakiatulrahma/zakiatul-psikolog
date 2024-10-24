<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="storage/images/assets/icon1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Support System | Edit Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
</head>
<body>
    <div class="container">
    <div class="header">
        <a href="{{route('user.home')}}"><i class="fa fa-arrow-left"></i></a>
        <h1>Edit Profile</h1>
        <a href="#"><i class="fa fa-ellipsis-v"></i></a>
    </div>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            <div class="photo mb-5">
                <img id="preview" src="{{ Str::startsWith(Auth::user()->image, 'https://lh3.googleusercontent.com') 
                    ? Auth::user()->image 
                    : (Auth::user()->image 
                        ? asset('storage/images/profile/' . Auth::user()->image) 
                        : asset('storage/images/profile/default-profile.png')) }}" alt="Profile Picture">
            </div>
        <div class="mb-3">
            <label for="image">Gambar Profil</label>
            <input class= "form-control" type="file" name="image" id="image" onchange="previewImage(event)">
        </div>
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input class= "form-control" type="text" name="username" id="username" value="{{ $user->username }}" required>
        </div>
        <div class="mb-3">
            <label for="nama">Nama Lengkap</label>
            <input class= "form-control" type="text" name="nama" id="nama" value="{{ $user->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class= "form-control" type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <button class="btn btn-primary" type="submit">Update Profile</button>
    </div>
    </form>

    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
