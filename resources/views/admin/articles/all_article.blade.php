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

    <title>Support System | Artikel</title>
    
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
            <h1>All Article</h1>
            <p>({{ $total_article }})</p>
        </div>
        @if($articles->isEmpty())
        <p>No articles available.</p>
    @else
        @foreach ($articles as $article)
        <div class="col-lg-">
            <div class="blog-posts">
                <div class="row">
                <div class="col-lg-12">
                    <div class="post-item">
                    <div class="thumb">
                        <a href="{{ route('articles.show', $article->id) }}"><img src="{{ asset('storage/images/article/' . $article->image) }}" alt="{{ $article->title }}" height="220px"></a>
                    </div>
                    <div class="right-content">
                        <a href="{{ route('articles.show', $article->id) }}"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('articles.edit', $article->id) }}"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="deleteArticleLink" data-id="{{ $article->id }}"><i class="fa fa-trash"></i></a>
                        <form id="deleteArticleForm_{{ $article->id }}" action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <span class="date">{{ $article->updated_at }}</span>
                        <a href="{{ route('articles.show', $article->id) }}"><h4>{{ $article->title }}</h4></a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    </div>
    <script>
        document.querySelectorAll('.deleteArticleLink').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const formId = this.getAttribute('data-id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "This article will be deleted.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`deleteArticleForm_${formId}`).submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
