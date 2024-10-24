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

    <title>Support System | Admin Dashboard</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Tambahkan ini -->

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/other-page.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="d-flex">
                <img id="preview" src="{{ Auth::user()->image ? asset('storage/images/profile/' . Auth::user()->image) : asset('storage/images/profile/default-profile.png') }}" alt="Profile Picture" width="25" height="25">
                <p> {{ Auth::user()->nama }}</p>
            </div>
            <h1>Admin Dashboard</h1>
            <form id="logoutForm" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="button" id="logoutButton">Keluar <i class="fa fa-sign-out" style="font-size:20px;color:white"></i></button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <h1>Pengajuan Konseling</h1>
            <p>({{ $total_questioner }})</p>
        </div>
        <div class="link pull-right">
            <a href="{{ route('user.questionnaires.showAll') }}">Lihat Semua Pengajuan ></a>
        </div>
        <br><br><br>
        @foreach ($questionnaires as $questionnaire)
        <div class="container-questionnaire">
            <a href="{{ route('admin.questionnaires.show', $questionnaire->id) }}">
                <p>{{ $questionnaire->name }}</p>
                <p>{{ $questionnaire->updated_at }}</p>
                <p class="
                    @if($questionnaire->status == 'rejected')
                        status-reject
                    @elseif($questionnaire->status == 'pending')
                        status-pending
                    @elseif($questionnaire->status == 'approved')
                        status-approved
                    @endif
                ">
                    {{ $questionnaire->status }}
                </p>
            </a>
        </div>
        @if($questionnaire->status == 'pending')
        <form id="questionnaireForm_{{ $questionnaire->id }}" action="{{ route('admin.questionnaires.update', $questionnaire->id) }}" method="post">
            @csrf
            <label for="message">Catatan:</label>
            <textarea class="form-control" name="message" required></textarea>
            <input type="hidden" name="action" value="">
            <div class="d-flex">
                <!-- <button type="button" class="rejectButton" data-id="{{ $questionnaire->id }}" data-action="reject">Reject <i class="fa fa-times"></i></button> -->
                <button type="button" class="approveButton" data-id="{{ $questionnaire->id }}" data-action="approve">Setujui<i class="fa fa-check"></i></button>
            </div>
        </form>
        @endif
        <hr>
        @endforeach
    </div>

    <div class="container">
        <div class="header">
            <h1>Notifikasi</h1>
            <p>({{ $total_notif }})</p>
        </div>
        <div class="link pull-right">
            <a href="{{ route('user.notification.showAll') }}">Lihat Semua Notifikasi ></a>
        </div>
        <br><br>
        @foreach ($notifications as $notification)
        <div class="container-questionnaire">
            <a>
                <p>{{ $notification->message }}</p>
            </a>
        </div>
        @endforeach
    </div>

    <div class="container">
        <div class="header">
            <h1>Artikel</h1>
            <p>({{ $total_article }})</p>
        </div>
        @if(Auth::user()->role == 'admin')
        <div class="link d-flex justify-content-between">
            <a href="{{ route('articles.create') }}">Buat Artikel Baru +</a>
            <a href="{{ route('articles.all') }}">Lihat Semua Artikel ></a>
        </div><br><br>
        @endif

        @if($articles->isEmpty())
            <p>Tidak ada kuesioner yang tersedia.</p>
        @else
        @foreach ($articles as $article)
        <div class="col-lg-">
            <div class="blog-posts">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="post-item">
                            <div class="thumb">
                                <a href="{{ route('articles.show', $article->id) }}"><img src="{{ asset('storage/images/article/' . $article->image) }}" alt="{{ $article->title }}" height="220px"></a>
                            </div>
                            <div class="right-content">
                                <a href="{{ route('articles.show', $article->id) }}"><i class="fa fa-eye" title="Preview"></i></a>
                                <a href="{{ route('articles.edit', $article->id) }}"><i class="fa fa-pencil" title="Edit"></i></a>
                                <a href="#" class="deleteArticleLink" data-id="{{ $article->id }}"><i class="fa fa-trash" title="Hapus"></i></a>
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
        </div>
        @endforeach
        @endif
    </div>

    <div class="container">
        <div class="header">
            <h1>Testimoni</h1>
            <p>({{ $total_comment }})</p>
        </div>
        <div class="link pull-right">
            <a href="{{ route('admin.allComment') }}">Lihat Semua Testimoni ></a>
        </div><br><br><br>
        @if($comments->isEmpty())
            <p>No comments available.</p>
        @else
        <table>
            <tr>
                <th>User</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->user->nama }}</td>
                <td>{{ $comment->content }}</td>
                <td>
                    <form id="deleteCommentForm_{{ $comment->id }}" action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="deleteCommentButton" data-id="{{ $comment->id }}"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>

    <script>
        // Logout SweetAlert
        document.getElementById('logoutButton').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Anda akan keluar.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        });

        // Reject and Approve SweetAlert
        document.querySelectorAll('.rejectButton, .approveButton').forEach(button => {
            button.addEventListener('click', function(e) {
                const action = this.getAttribute('data-action');
                const formId = this.getAttribute('data-id');
                Swal.fire({
                    title: `Apakah Anda yakin ingin ${action} kuesioner ini?`,
                    text: "Tindakan ini tidak dapat dibatalkan.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: `Ya, ${action}`
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById(`questionnaireForm_${formId}`);
                        form.querySelector(`input[name="action"]`).value = action;
                        form.submit();
                    }
                });
            });
        });

        // Delete Article SweetAlert
        document.querySelectorAll('.deleteArticleLink').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const formId = this.getAttribute('data-id');
                Swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Artikel ini akan dihapus.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`deleteArticleForm_${formId}`).submit();
                    }
                });
            });
        });

        // Delete Comment SweetAlert
        document.querySelectorAll('.deleteCommentButton').forEach(button => {
            button.addEventListener('click', function(e) {
                const formId = this.getAttribute('data-id');
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Komentar ini akan dihapus.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`deleteCommentForm_${formId}`).submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
