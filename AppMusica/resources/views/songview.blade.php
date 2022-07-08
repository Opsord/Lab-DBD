@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card m-auto mt-5 bg-warning" style="width: 18rem;">
        <img src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-text text-center">{{ $song->name_song }}</h2>
        </div>
    </div>
    <div >
        <div class="d-flex justify-content-center align-items-center">
            <form action="/songview/create" method="post">
                <input type="hidden" class="form-control" name="id_song" value={{$song->id_song}}>
                <input type="hidden" class="form-control" name="id_user" value={{$user->id_user}}>
                <button class="btn btn-primary btn-lg m-4" style="height: 60px; width: 60px;"><i class="bi bi-heart"></i></button>
            </form>
            
            <a href="https://www.youtube.com/watch?v=mCdA4bJAGGk"><button class="btn btn-primary btn-lg m-4" style="height: 60px; width: 60px;"><i class="bi bi-play"></i></button></a>
            
        </div>
    </div>
</div>
        
    @endsection
