@extends('layouts.template')

@section('user')
<button class="btn btn-warning btn-lg" type="button">
    <i class="bi bi-person-circle"></i>{{$user->name_user}}
</button>
<button type="button" class="btn btn-lg btn-warning dropdown-toggle dropdown-toggle-split"
    data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
    <li><a href="/logout">Cerrar sesion</a></li>
</ul>
@endsection

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
