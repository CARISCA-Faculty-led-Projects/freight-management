@extends(auth()->guard()->name == 'brokers' ? 'layout.roles.broker' : 'layout.roles.organization')

@section('content')
 <chat-view-component guard="{{auth()->guard()->name}}" />
@endsection
