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

    <title>Support System | Solusi Masalah</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
</head>
<body>
    
    <div class="container">
        <div class="header">
            <a href="javascript:window.history.back();"><i class="fa fa-arrow-left"></i></a>
            <h1>Solusi Masalah</h1>
            <a><i class="fa fa-ellipsis-v"></i></a>
        </div>
    <h1>{{ $topic['topic'] }}</h1>
    <div class="container-mut">

        <div class="mutiara">
            <h1>{{ $solution }}</h1>
            <form action="{{ route('question.next') }}" method="post">
                @csrf
                <input type="hidden" name="topic_index" value="{{ $topicIndex }}">
                <input type="hidden" name="solution_index" value="{{ $solutionIndex }}">
            </div>
        </div>
            <label>Apakah solusi ini membantu?</label>
            <div class="d-flex">
                <button type="submit" name="helpful" value="1">Ya</button>
                <button type="submit" name="helpful" value="0">Tidak</button>
            </div>
            <div class="mutiara">
                <a href="{{ route('questionnaire.create') }}">Atau coba konsultasi tatap muka langsung <i class="fa fa-angle-right"></i></a>
            </div>
        </form>
    </div>
</body>
</html>
