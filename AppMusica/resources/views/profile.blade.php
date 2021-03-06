@extends('layouts.template')

@section('admin')
    @if ($role->id_role == 1)
        <a href="/dashboard" class="d-block text-light p-3"><i class="bi bi-card-list lead"></i></ion-icon> Dashboard</a>
    @endif
    @if ($role->id_role == 3)
        <a href="/artistdash" class="d-block text-light p-3"><i class="bi bi-file-music"></i> Administrar Canciones</a>
    @endif
@endsection

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
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Perfil</h1>
</div>

<div class="card text-bg-warning mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://i.ibb.co/Gt3BRf7/zhiv-2.jpg" class="img-fluid" alt="zhiv-2" data-bs-toggle="modal"
            data-bs-target="#profilemodal" >
        </div>
        <div class="modal fade" id="profilemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto de Perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <a href="/profile"><img src="https://i.ibb.co/cCXMQKJ/zhiv-2.jpg" class="img-fluid" alt="zhiv-2" /></a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name_user }}</h5>
                <p class="card-text">Intente ligar con una informatica pero no C de Java</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#user-editmodal{{ $user->id_user }}"><i class="bi bi-pencil-square"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="user-editmodal{{$user->id_user}}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="exampleModalLabel">Editar user id:
                    {{ $user->id_user }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{ url('user/update') }}/{{ $user->id_user }}" method="post">
                @method("PUT")
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$user->name_user}}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                    </div>
                        <input type="hidden" class="form-control" name="password"
                            placeholder="Password" value="{{$user->pass_user}}">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="birthday" placeholder="Birthday" value="{{$user->birthday}}">
                    </div>
                        <input type="hidden" class="form-control" name="id_subscription"
                            placeholder="id suscripcion" value="{{$user->id_subscription}}">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="genre"
                            placeholder="Gender" value="{{$user->genre}}">
                    </div>

                    <input type="hidden" class="form-control" name="role" value="{{$role->id_role}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Playlists</h1>
</div>
<div class="container-fluid  ">
    <div class="row">
        <div class="col">
            @if (count($user_playlists) < 5) 
            <div class="container">
                <div class="row">
                    @foreach ($user_playlists as $user_playlists) 
                    <div class="col">
                        <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                            <a href="https://ibb.co/K96Nm7K"><img src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1" borde="0"></a>
                            <div class="card-body">
                                <p class="card-text">{{ $playlists[$user_playlists->id_playlist-1]->name_playlist }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>  
        </div>
        @else
        <div id="inam" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner d-flex">
                <div class="carousel-item active ">
                    <div class="container">
                        <div class="row">
                            @for($i = 0;$i < 4;$i++)
                            <div class="col">
                                <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                    <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                    <div class="card-body">
                                        <p class="card-text">{{ $playlists[$user_playlists[$i]->id_playlist
                                            -1]->name_playlist }}</p>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            @for($i = 4;$i < 8;$i++)
                            <div class="col">
                                <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                    <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                    <div class="card-body">
                                        <p class="card-text">{{ $playlists[$user_playlists[$i]->id_playlist
                                            -1]->name_playlist }}</p>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <a href="#inam" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#inam" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        @endif
    </div>
</div>



<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Canciones Favoritas</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if (count($user_like) < 5) 
            <div class="container">
                <div class="row">
                    @foreach ($user_like as $ul)
                    <div class="col">
                        <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                            <a href="{{ url('songview') }}/{{ $songs[$ul->id_song - 1]->id_song}}"><img src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4" borde="0"></a>
                            <div class="card-body">
                                <p class="card-text">{{ $songs[$ul->id_song - 1]->name_song }}</p>
                                <p class="card-text"><small class="text-muted">{{$artist[$songs[$ul->id_song]->artist -1]->name_user}}</small></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>
            @else
            <div id="inam2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @for ($i = 0;$i < 4;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="{{ url('songview') }}/{{ $songs[$user_like[$i]->id_song]->id_song}}"><img
                                            src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{ $songs[$user_like[$i]->id_song -1]->name_song }}</p>
                                            <p class="card-text"><small
                                                class="text-muted">{{$artist[$songs[$user_like[$i]->id_song -1]->artist -
                                                1]->name_user}}</small></p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                @for ($i = 4;$i < 8;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="{{ url('songview') }}/{{ $songs[$user_like[$i]->id_song]->id_song }}"><img
                                            src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4"
                                            borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{ $songs[$user_like[$i]->id_song -1]->name_song }}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$songs[$user_like[$i]->id_song -1]->artist]->name_user }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#inam2" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#inam2" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            @endif
        </div> 
    </div>
</div>
@endsection