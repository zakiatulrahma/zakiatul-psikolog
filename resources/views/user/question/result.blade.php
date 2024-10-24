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

    <title>Support System | Cek Gejala Dini</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
</head>
<body>
    <!-- Pre-header Starts -->
  <div class="pre-header">
    <div class="containerr">
      <div class="row">
        <div class="col-lg-8 col-sm-8 col-7">
          <ul class="info">
            <li><a href="#"><i class="fa fa-envelope"></i>supportsystem@pnp.com</a></li>
            <li><a href="#"><i class="fa fa-phone"></i>020-1014-0924</a></li>
          </ul>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Pre-header End -->

  <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container-nav">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="{{ route('user.home') }}" class="logo">
                  <img src="{{ asset('storage/images/assets/icon-utama.png') }}" alt="">
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li class="scroll-to-section"><a href="{{ route('user.questionnaires.showAll') }}">Konsultasi</a></li>
                  <li class="scroll-to-section"><a href="{{ route('topics') }}">Cek Dini</a></li>
                  <li class="scroll-to-section"><a href="{{ route('articles.all') }}">Artikel</a></li>
                  
                  <li class="scroll-to-section"><div class="dropdown">
                    <a href="#"><img id="preview" src="{{ Str::startsWith(Auth::user()->image, 'https://lh3.googleusercontent.com') 
                        ? Auth::user()->image 
                        : (Auth::user()->image 
                            ? asset('storage/images/profile/' . Auth::user()->image) 
                            : asset('storage/images/profile/default-profile.png')) }}" alt="Profile Picture">
                            {{ Auth::user()->nama }}</a>
                    <div class="dropdown-content">
                        <a href="{{ route('user.edit') }}">Profile</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Logout ></button>
                        </form>
                      </div>    
                    </div>
                </li> 
                </ul>        
            </style>
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
      </header>
    <div class="container">
      <div class="header">
          <a href="{{route('topics')}}"><i class="fa fa-arrow-left"></i></a>
          <h1>Cek Gejala Dini</h1>
          <a><i class="fa fa-ellipsis-v"></i></a>
      </div>
      <h3>Hasil Evaluasi - Anda mengalami gejala terkait dengan {{ $topic['title'] }}</h3>

      @if ($hasSymptoms)
          <br>
          <p><strong>{{ $severity }}</strong></p>
          <br>
          <p><a href="{{ route('user.questionnaires.showAll') }}">Coba konseling langsung</a> atau coba beberapa solusi berikut yang mungkin dapat membantu : </p>
          <ul>
              @foreach ($topic['solutions'] as $solution)
              <div class="card-pilihan">
                  <li>
                      <a href="{{ route('solution', ['topic' => strtolower($topic['title']), 'solutionId' => $solution['id']]) }}">
                          <img src="{{ $solution['image'] }}" alt="{{ $solution['title'] }}" width="100">
                          {{ $solution['title'] }}
                      </a>
                  </li>
              </div>
              @endforeach
          </ul>
      @else
          <br>
          <p><strong>{{ $severity }}</strong></p>
          <p>Anda tidak mengalami gejala yang signifikan terkait dengan {{ $topic['title'] }}.</p>
      @endif
    </div>
</body>
<!-- <p class="d-flex ms-10">Copyright © 2024 Zakia Tulrahma.</p> -->
</html>
