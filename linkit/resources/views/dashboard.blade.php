@extends('authedlayout')
@section('content')
    <div class="dashboard">
        <div class="dashboardpart1">
            <h1>Hi, {{ $user->name }}!</h1>
            {{-- <p>Your email: {{ $user->email }}</p> --}}
            <a href="{{ route('inbox') }}">Inbox</a>
        </div>
        <div class="dashboardpart2">
            <img src="chatillustration.png">
        </div>
    </div>
@endsection
