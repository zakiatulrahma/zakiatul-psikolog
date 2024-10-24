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

    <title>Support System | Notifikasi</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{route('admin.home')}}"><i class="fa fa-arrow-left"></i></a>
            <h1>Notifikasi</h1>
            <p>({{ $total_notif }})</p>
        </div>
    @if($notifications->isEmpty())
        <p>No questionnaires available.</p>
    @else
        @foreach ($notifications as $notification)
            <div class="container-questionnaire">
                <a>
                    <p>{{ $notification->message }}</p>
                    <p>{{ $notification->updated_at }}</p>
                </a>
            </div>
        @endforeach
    @endif
    </div>
</body>
</html>
