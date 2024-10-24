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

    <title>Support System | Ajukan Konsultasi</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Tambahkan ini -->

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

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
            <a href="javascript:window.history.back();"><i class="fa fa-arrow-left"></i></a>
            <h1>Ajukan Konsultasi Tatap Muka</h1>
            <a><i class="fa fa-ellipsis-v"></i></a>
        </div>
        <form action="{{ route('questionnaire.store') }}" method="post">
            @csrf   
            <div class="mb-3">
                <label for="name">Nama</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="usia">Usia</label>
                <input class="form-control" type="number" value="{{ old('usia') }}" name="usia" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" required name="jenis_kelamin">
                    <option selected disabled>Pilih Jenis Kelamin</option>
                    <option value="laki-laki" @if (old('jenis_kelamin') == 'laki-laki') selected="selected" @endif>Laki-laki</option>
                    <option value="perempuan" @if (old('jenis_kelamin') == 'perempuan') selected="selected" @endif>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jurusan">Jurusan</label>
                <select class="form-select" aria-label="Default select example" required name="jurusan">
                    <option selected disabled>Pilih Jurusan</option>
                    <option value="Teknik Mesin" @if (old('jurusan') == 'Teknik Mesin') selected="selected" @endif>Teknik Mesin</option>
                    <option value="Teknik Sipil" @if (old('jurusan') == 'Teknik Sipil') selected="selected" @endif>Teknik Sipil</option>
                    <option value="Teknik Elektro" @if (old('jurusan') == 'Teknik Elektro') selected="selected" @endif>Teknik Elektro</option>
                    <option value="Administrasi Niaga" @if (old('jurusan') == 'Administrasi Niaga') selected="selected" @endif>Administrasi Niaga</option>
                    <option value="Akuntansi" @if (old('jurusan') == 'Akuntansi') selected="selected" @endif>Akuntansi</option>
                    <option value="Teknologi Informasi" @if (old('jurusan') == 'Teknologi Informasi') selected="selected" @endif>Teknologi Informasi</option>
                    <option value="Bahasa Inggris" @if (old('jurusan') == 'Bahasa Inggris') selected="selected" @endif>Bahasa Inggris</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="angkatan">Angkatan</label>
                <select class="form-select" aria-label="Default select example" required name="angkatan">
                    <option selected disabled>Pilih Angkatan</option>
                    <option value="2018" @if (old('angkatan') == '2018') selected="selected" @endif>2018</option>
                    <option value="2019" @if (old('angkatan') == '2019') selected="selected" @endif>2019</option>
                    <option value="2020" @if (old('angkatan') == '2020') selected="selected" @endif>2020</option>
                    <option value="2021" @if (old('angkatan') == '2021') selected="selected" @endif>2021</option>
                    <option value="2022" @if (old('angkatan') == '2022') selected="selected" @endif>2022</option>
                    <option value="2023" @if (old('angkatan') == '2023') selected="selected" @endif>2023</option>
                    <option value="2024" @if (old('angkatan') == '2024') selected="selected" @endif>2024</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" value="{{ old('email') }}" name="email" required>
            </div>
            <div class="mb-3">
                <label for="no_hp">No HP</label>
                <input class="form-control" type="text" name="no_hp" value="{{ old('no_hp') }}" required>
            </div>
            <div class="mb-3">
                <label for="layanan">Topik Konseling</label>
                <select class="form-select" aria-label="Default select example" required name="layanan">
                    <option selected disabled>Pilih Topik</option>
                    <option value="Stress" @if (old('layanan') == 'Stress') selected="selected" @endif>Stress</option>
                    <option value="Gangguan Kecemasan" @if (old('layanan') == 'Gangguan Kecemasan') selected="selected" @endif>Gangguan Kecemasan</option>
                    <option value="Depresi" @if (old('layanan') == 'Depresi') selected="selected" @endif>Depresi</option>
                    <option value="Keluarga & Hubungan" @if (old('layanan') == 'Keluarga & Hubungan') selected="selected" @endif>Keluarga & Hubungan</option>
                    <option value="Trauma" @if (old('layanan') == 'Trauma') selected="selected" @endif>Trauma</option>
                    <option value="Gangguan Mood" @if (old('layanan') == 'Gangguan Mood') selected="selected" @endif>Gangguan Mood</option>
                    <option value="Pekerjaan & Karir" @if (old('layanan') == 'Pekerjaan & Karir') selected="selected" @endif>Pekerjaan & Karir</option>
                    <option value="Adiksi" @if (old('layanan') == 'Adiksi') selected="selected" @endif>Adiksi</option>
                    <option value="Pengembangan Diri" @if (old('layanan') == 'Pengembangan Diri') selected="selected" @endif>Pengembangan Diri</option>
                    <option value="Pengasuhan & Anak" @if (old('layanan') == 'Pengasuhan & Anak') selected="selected" @endif>Pengasuhan & Anak</option>
                    <option value="Gangguan Kepribadian" @if (old('layanan') == 'Gangguan Kepribadian') selected="selected" @endif>Gangguan Kepribadian</option>
                    <option value="Identitas Seksual" @if (old('layanan') == 'Identitas Seksual') selected="selected" @endif>Identitas Seksual</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="psikolog">Psikolog</label>
                <select class="form-select" aria-label="Default select example"required name="psikolog">
                    <option selected disabled>Pilih Psikolog</option>
                    <option value="Evantrida Mayliza" @if (old('psikolog') == 'Evantrida Mayliza') selected="selected" @endif>Evantrida Mayliza</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_konseling">Tanggal Konseling</label>
                <input type="date" class="form-control @error('tanggal_konseling') is-invalid @enderror" id="tanggal_konseling" name="tanggal_konseling" value="{{ old('tanggal_konseling') }}" required>
                @error('tanggal_konseling')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="waktu_konseling">Waktu Konseling</label>
                <input type="time" class="form-control @error('waktu_konseling') is-invalid @enderror" id="waktu_konseling" name="waktu_konseling" value="{{ old('waktu_konseling') }}" required>
                @error('waktu_konseling')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="mb-3">
                <label for="domisili">Alamat</label>
                <textarea class="form-control" name="domisili" required>{{ old('domisili') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control" name="keluhan" required>{{ old('keluhan') }}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Buat Pengajuan</button>
        </form>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Bootstrap Datepicker JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                daysOfWeekDisabled: [0, 1, 3, 4, 6], // Disable all days except Tuesday (2) and Thursday (5)
                autoclose: true
            });
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: 
                    '@foreach ($errors->all() as $error)' +
                        '<p>{{ $error }}</p>' +
                    '@endforeach',
                });
            @endif
        });
    </script>
</body>
<!-- <p class="d-flex ms-10">Copyright © 2024 Zakia Tulrahma.</p> -->
</html>
