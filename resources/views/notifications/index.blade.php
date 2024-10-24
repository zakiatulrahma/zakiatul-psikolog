<h1>Notifications</h1>
@foreach ($notifications as $notification)
    <p>{{ $notification->message }}</p>
@endforeach
