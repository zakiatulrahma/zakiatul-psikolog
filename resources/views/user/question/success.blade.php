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

    <title>Support System | Cek Masalah Mental</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{route('user.home')}}"><i class="fa fa-arrow-left"></i></a>
            <h1>Cek Masalah Mental</h1>
            <a><i class="fa fa-ellipsis-v"></i></a>
        </div>

    <h3>Bagus! Tetaplah Semangat Menjalani Hidup dan Jaga Kesehatan Kamu </h3>
    <div class="mutiara">
        <a href="{{ route('user.home') }}">Kembali Ke Beranda <i class="fa fa-angle-right"></i></a>
    </div>
    <div class="container-mut">
        <div class="mutiara">
        <img src="{{ asset('storage/images/assets/kutip.png') }}" alt="" width="30px">
        <hr>
        <h1><div id="quote">Memuat kutipan...</div></h1>
        <p><div id="author"></div></p>
    </div>
    </div>
    </div>
    <script>
        $.ajax({
            method: 'GET',
            url: 'https://dummyjson.com/quotes/random',
            contentType: 'application/json',
            success: function(result) {
                console.log(result);
                const quote = result.quote;
                const author = result.author;
                $('#quote').text(quote);
                $('#author').text('~ ' + author);
            },
            error: function ajaxError(jqXHR) {
                console.error('Error: ', jqXHR.responseText);
                $('#quote').text('Tidak dapat memuat kutipan.');
            }
        });
    </script>
</body>
</html>
