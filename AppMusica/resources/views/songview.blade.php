@extends('layouts.template')

@section('content')
    <div class="card m-auto mt-5 bg-warning" style="width: 18rem;">
        <img src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-text text-center">{{ $song->name_song }}</h2>
        </div>
        <audio controls>
            <source src={!! asset('/public/never.mp3') !!} type="audio/mp3">
        
        </audio>
    @endsection
