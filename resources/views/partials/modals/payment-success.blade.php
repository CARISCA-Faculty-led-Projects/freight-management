

@extends('layout.head')
    <div class="container-fluid" style="top: 40rem">
        <div
            class="success-container d-flex flex-column justify-content-center align-items-center px-3 pt-5 text-center">
            @if ($status == "success")
                <img src="{{ asset('assets/media/gifs/verified.gif') }}" class="img-fluid" alt="">
            @else
                <img src="{{ asset('assets/media/illustrations/error.png') }}" class="img-fluid w-20" alt="">
            @endif
            <h3 class="display-4" style="font-size: 5rem">{{ $message }}</h3>
            <h4 class="font-light" style="font-size: 3rem">Kindly close this window and return to your previous page</h4>
        </div>
    </div>
