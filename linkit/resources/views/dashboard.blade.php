@extends('authedlayout')

@section('content')
    <div class="dashboard">
        <div class="dashboardpart1">
            <h1>Hi, {{ $authUser->name }}!</h1>
            {{-- <p>Your email: {{ $user->email }}</p> --}}
            <a href="{{ route('inbox') }}">Inbox</a>
        </div>
        <div class="dashboardpart2">
            <img src="chatillustration.png">
        </div>
    </div>
    <div class="All-Users">
        <div class="user-data1">
            <h2>All Users</h2>
        </div>
        <div class="user-data2">
            @foreach ($users as $user)
                <div class="user-data-display">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- <a href="">Chat</a> --}}
                        <a class="chatbtn" href="{{ route('inbox', ['id' => $user->id]) }}">Chat!</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
@endsection
