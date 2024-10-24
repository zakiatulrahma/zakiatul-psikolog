<h1>Pending Questionnaires</h1>
@foreach ($questionnaires as $questionnaire)
    <p>{{ $questionnaire->name }}</p>
    <form action="{{ route('admin.questionnaires.approve', $questionnaire) }}" method="post">
        @csrf
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit">Disetujui</button>
    </form>
    <form action="{{ route('admin.questionnaires.reject', $questionnaire) }}" method="post">
        @csrf
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit">Reject</button>
    </form>
@endforeach
