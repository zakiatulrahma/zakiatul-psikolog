<!DOCTYPE html>
<html>
<head>
    <title>Support System | My Articles</title>
    <link rel="icon" href="storage/images/assets/icon1.png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <img src="{{ asset('storage/images/' . $article->image) }}" alt="{{ $article->title }}">

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
