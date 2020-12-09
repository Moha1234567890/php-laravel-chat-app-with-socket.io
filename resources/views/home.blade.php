@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="row chat-row">
                <div class="col-md-3">
                    <div class="users">
                        <h5>Users</h5>

                        <ul class="list-group list-chat-item">
                            @if($users->count())
                                @foreach($users as $user)
                                    <li class="chat-user-list">
                                        <a href="{{ route('message.conversation', $user->id) }}">
                                            <div class="chat-image">
                                                {!! makeImageFromName($user->name) !!}
                                                <i class="fa fa-circle user-status-icon user-icon-{{ $user->id }}" title="away"></i>
                                            </div>

                                            <div class="chat-name font-weight-bold">
                                                {{ $user->name }}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                    <div class="col-md-9">
                        <h1>
                            Message Section
                        </h1>


                    </div>

                </div>


        </div>
    </div>
</div>
@endsection

@push('scripts')
    <?php

    header('Access-Control-Allow-Methods', 'POST,GET,OPTIONS,PUT,DELETE');
    header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');
   header('Access-Control-Allow-Headers: Origin, X-Requested-With,Authorization, XMLHttpRequest, Content-Type, Accept');
    ?>
 
    
    <script>


        
        $(function () {

            let user_id = "{{ auth()->user()->id }}";
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);
            //alert('before fuck');
            socket.on('connect', function() {
                //alert('fuck');


                socket.emit('user_connected', user_id);
            });

            
        });
    </script>
    
@endpush


