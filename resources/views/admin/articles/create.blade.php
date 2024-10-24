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

    <title>Support System | Buat Artikel Baru</title>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{route('admin.home')}}"><i class="fa fa-arrow-left"></i></a>
            <h1>Artikel Baru</h1>
            <a><i class="fa fa-ellipsis-v"></i></a>
        </div>
        <div class="artikel">
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <br>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <br>
        <div>
            <label for="image">Thumbnail:</label>
            <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
        </div>
        <br>
        <div class="frame-photo" id="frame-photo">
            <img id="preview" src="{{ asset('storage/images/assets/no_image_available.jpg') }}" height="250">
        </div>
        <hr>
        <div>
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" id="content" rows="10"></textarea>
        </div>
        <br>
        <button type="submit">Upload</button>
    </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                const framePhoto = document.getElementById('frame-photo');
                output.src = reader.result;
                framePhoto.style.display = 'flex';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.getElementById('image');
            const framePhoto = document.getElementById('frame-photo');
            if (!imageInput.files.length) {
                framePhoto.style.display = 'flex';
            }
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>
</html>
