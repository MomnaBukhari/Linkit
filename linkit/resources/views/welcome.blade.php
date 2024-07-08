@extends('mainlayout')

@section('css')
<style>
    .welcomediv {
        width: 100%;
        height: 80vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: transform 0.3s ease-in-out;
    }
    .welcomediv:hover {
        /* transform: scale(1.05); */
    }
    .welcomediv h4 {
        margin-bottom: 4%;
        color: #1d8ced;
        font-size: 1.8em;
    }
    .welcomediv p {
        margin-bottom: 2%;
        font-size: 1.2em;
        color: #555;
    }
    .welcomediv a {
        color: #ffffff;
        text-decoration: none;
        padding: 10px 20px;
        background-color: #1d8ced;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }
    .welcomediv a:hover {
        background-color: #155a8a;
        color: #ffffff;
    }
</style>

@endsection


@section('pusherscript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            Pusher.logToConsole = true;

            var pusher = new Pusher('cf5cc9db30fd47bd829d', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('welcome-dashboard', function(data) {
                // Assuming `data.username` contains the username
                var welcomeMessage = 'Hi, ' + data.username + '! You are Successfully Logged In!';

                // Use SweetAlert2 to display the welcome message
                Swal.fire({
                    title: 'Welcome!',
                    text: welcomeMessage,
                    confirmButtonText: 'OK, Thanks!'
                });
            });
        });
    </script>
@endsection

@section('content')
    <div class="welcomediv">
        <h4>Welcome to LinkIt</h4>
        <p>A Place Where You Can Communicate with Each Other for Free. Just <span style="color:#1d8ced; font-weight: bold;">LinkIt</span> now!</p>
        <p>Are you logged in already?</p>
        <a href="/dashboard">Go to Dashboard</a>
    </div>
@endsection
