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

    <title>Support System | Detail Konsultasi</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="javascript:window.history.back();"><i class="fa fa-arrow-left"></i></a>
            <h1>Detail Konsultasi</h1>
            <a href="#"><i class="fa fa-ellipsis-v"></i></a>
        </div>
    <p>Name: {{ $questionnaire->name }}</p>
    <p>Usia: {{ $questionnaire->usia }}</p>
    <p>Jenis Kelamin: {{ $questionnaire->jenis_kelamin }}</p>
    <p>Jurusan: {{ $questionnaire->jurusan }}</p>
    <p>Angkatan: {{ $questionnaire->angkatan }}</p>
    <p>Email: {{ $questionnaire->email }}</p>
    <p>No HP: {{ $questionnaire->no_hp }}</p>
    <p>Domisili: {{ $questionnaire->domisili }}</p>
    <p>Layanan: {{ $questionnaire->layanan }}</p>
    <p>Keluhan: {{ $questionnaire->keluhan }}</p>
    <p>Tanggal Konseling: {{ $questionnaire->tanggal_konseling }}</p>
    <p>Psikolog: {{ $questionnaire->psikolog }}</p>
    <p>Status: {{ $questionnaire->status }}</p>
    <p>Admin Message: {{ $questionnaire->admin_message }}</p>
    <p>Updated at: {{ $questionnaire->updated_at }}</p>
    <br>

    @if($questionnaire->status === 'approved' && !$questionnaire->feedback)
    <form action="{{ route('questionnaire.sendFeedback', $questionnaire->id) }}" method="POST">
        @csrf
        <label for="feedback">Umpan Balik:</label>
        <textarea class="form-control" id="feedback" name="feedback" required></textarea>
        <button type="submit">Kirim Umpan Balik</button>
    </form>
    @endif
    
    @if($questionnaire->feedback != null)
    <div class="container-mut">
        <div class="mutiara">
            <p>Feedback</p>
            <h1>{{ $questionnaire->feedback ?? 'Belum ada umpan balik' }}</h1>  
        </div>
    </div>
    @endif

    @if($questionnaire->ulasan || $questionnaire->rating != null)
    <div class="container-mut">
        <div class="mutiara">
            <p>Ulasan</p><br>
            <div class="rating mb-1">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $questionnaire->rating)
                        <span class="star" style="color: #f7be13; font-size:20px;">★</span>
                    @else
                        <span class="star" style="color: #f7be13; font-size:20px;">☆</span>
                    @endif
                @endfor
              </div>
            <h1>{{ $questionnaire->ulasan ?? 'Belum ada ulasan' }}</h1>
        </div>
    </div>
    @endif
</body>
</html>
