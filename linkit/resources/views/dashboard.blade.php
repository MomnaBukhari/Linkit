@extends('authedlayout')

@section('pusherscript')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('cf5cc9db30fd47bd829d', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('notify-channel');
        channel.bind('form-submit', function(data) {
            alert(JSON.stringify(data));
        });
    </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection


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



@section('pusherscript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
