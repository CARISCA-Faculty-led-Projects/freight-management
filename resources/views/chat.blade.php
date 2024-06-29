@extends('layout.roles.broker')

@section('content')
{{-- @php
dd(auth()->guard()->name);

@endphp --}}
 <chat-view-component guard="{{auth()->guard()->name}}" />
@endsection
