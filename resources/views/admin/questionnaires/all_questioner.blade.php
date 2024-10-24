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

    <title>Support System | Daftar Konsultasi</title>

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
            <h1>Semua Pengajuan Konsultasi</h1>
            <p>({{ $total_questioner }})</p>
        </div>
    @if($questionnaires->isEmpty())
        <p>Tidak ada kuesioner yang tersedia.</p>
    @else
    @foreach ($questionnaires as $questionnaire)
    <div class="container-questionnaire">
                    <a href="{{ route('admin.questionnaires.show', $questionnaire->id) }}">
            <p>Name: {{ $questionnaire->name }}</p>
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
                    <label for="message">Message:</label>
                    <textarea class="form-control" name="message" required></textarea>
                    <input type="hidden" name="action" value="">
                    <div class="d-flex">
                        <!-- <button type="button" class="rejectButton" data-id="{{ $questionnaire->id }}" data-action="reject">Reject <i class="fa fa-times"></i></button> -->
                        <button type="button" class="approveButton" data-id="{{ $questionnaire->id }}" data-action="approve">Disetujui <i class="fa fa-check"></i></button>
                    </div>
                </form>
                @endif
            <hr>
    @endforeach
    @endif
    </div>

    <script>
        document.querySelectorAll('.rejectButton, .approveButton').forEach(button => {
            button.addEventListener('click', function(e) {
                const action = this.getAttribute('data-action');
                const formId = this.getAttribute('data-id');
                Swal.fire({
                    title: `Apakah Anda yakin ingin menyetujui  ${action} kuesioner ini?`,
                    text: "Tindakan ini tidak dapat dibatalkan.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: `Yes, ${action} it!`
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById(`questionnaireForm_${formId}`);
                        form.querySelector(`input[name="action"]`).value = action;
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
