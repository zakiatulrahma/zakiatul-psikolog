<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('storage/images/assets/icon1.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Support System | Detail Konsultasi</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
</head>
<body>
    <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

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
                    <a href="#">
                      <img id="preview" src="{{ Str::startsWith(Auth::user()->image, 'https://lh3.googleusercontent.com') 
                    ? Auth::user()->image 
                    : (Auth::user()->image 
                        ? asset('storage/images/profile/' . Auth::user()->image) 
                        : asset('storage/images/profile/default-profile.png')) }}" alt="Profile Picture">
                        {{ Auth::user()->nama }}</a>
                    <div class="dropdown-content">
                        <a href="{{ route('user.edit') }}">Profile</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Keluar ></button>
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
    <p>Waktu Konseling: {{ $questionnaire->waktu_konseling }}</p>
    <p>Psikolog: {{ $questionnaire->psikolog }}</p>
    <p>Status: {{ $questionnaire->status }}</p>
    <p>Admin Message: {{ $questionnaire->admin_message }}</p>
    <p>Updated at: {{ $questionnaire->updated_at }}</p>

    <!-- Existing fields... -->

    @if($questionnaire->feedback != null)
    <div class="container-mut">
        <div class="mutiara">
            <p>Feedback</p>
            <h1>{{ $questionnaire->feedback ?? 'No feedback yet' }}</h1>  
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
            <h1>{{ $questionnaire->ulasan ?? 'No review yet' }}</h1>
        </div>
    </div>
    @endif

    @if($questionnaire->feedback && !$questionnaire->rating)
        <form action="{{ route('questionnaire.submitRating', $questionnaire->id) }}" method="POST">
            <div class="col-lg-5 col-sm-2">
                @csrf
                <label for="ulasan">Review:</label>
                <fieldset>
                  <span class="star-cb-group">
                    <div class="star-rating">
                      <input id="star-5" type="radio" name="rating" value="5" />
                      <label for="star-5" title="5 stars">★</label>
                      &nbsp;
                      <input id="star-4" type="radio" name="rating" value="4" />
                      <label for="star-4" title="4 stars">★</label>
                      &nbsp;
                      <input id="star-3" type="radio" name="rating" value="3" />
                      <label for="star-3" title="3 stars">★</label>
                      &nbsp;
                      <input id="star-2" type="radio" name="rating" value="2" />
                      <label for="star-2" title="2 stars">★</label>
                      &nbsp;
                      <input id="star-1" type="radio" name="rating" value="1" />
                      <label for="star-1" title="1 star">★</label>
                    </div>
                  </span>
                </fieldset>
              </div>

           
            <textarea class="form-control" id="ulasan" name="ulasan" required></textarea>
            <button type="submit">Submit Review</button>
        </form>
    @endif
    </div>
    
    <p class="d-flex ms-10">Copyright © 2024 Zakia Tulrahma.</p>
    
  </body>
</html>
