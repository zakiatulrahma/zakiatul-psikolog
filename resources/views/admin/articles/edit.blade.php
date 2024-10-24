<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="storage/images/assets/icon1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Support System | Edit Artikel</title>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Tambahkan ini -->

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">

</head>

<body>
    <div class="container">
        <div class="header">
            <a href="{{route('admin.home')}}"><i class="fa fa-arrow-left"></i></a>
            <h1>Edit Artikel</h1>
            <a><i class="fa fa-ellipsis-v"></i></a>
        </div>
        <div class="artikel">
            <form id="updateForm" action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}" required>
                </div>
                <br>
                <div>
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ $article->author }}" required>
                </div>
                <br>
                <div>
                    <label for="image">Thumbnail:</label>
                    <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)">
                </div>
                <br>
                <div class="frame-photo" id="frame-photo">
                    <img id="preview" src="{{ $article->image ? asset('storage/images/article/' . $article->image) : asset('storage/images/assets/no_image_available.jpg') }}" alt="Gambar Referensi" height="250">
                </div>
                <hr>
                <div>
                    <label for="content">Content:</label>
                    <textarea class="form-control" name="content" id="content" rows="10">{{ $article->content }}</textarea>
                </div>
                <button type="button" id="updateButton">Update</button> <!-- Ubah type menjadi button -->
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

        document.getElementById('updateButton').addEventListener('click', function() {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to update this article?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updateForm').submit();
                }
            });
        });

        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
