@extends('layouts.template')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Perfil</h1>
</div>

<div class="card text-bg-warning mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <a href="https://ibb.co/Gt3BRf7"><img src="https://i.ibb.co/Gt3BRf7/zhiv-2.jpg" alt="zhiv-2" borde="0"></a>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name_user }}</h5>
                <p class="card-text">Intente ligar con una informatica pero no se de Java</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Playlists</h1>
</div>
<div class="container-fluid  ">
    <div class="row">
        <div class="col">
            @if (count($user_playlists) < 4) @foreach ($user_playlists as $user_playlists) <div class="col">
                <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                    <a href="https://ibb.co/K96Nm7K"><img src="https://i.ibb.co/K96Nm7K/music-album-1.png"
                            alt="music-album-1" borde="0"></a>
                    <div class="card-body">
                        <p class="card-text">{{ $playlists[$user_playlists->id_playlist
                            -1]->name_playlist }}</p>
                    </div>
                </div>
        </div>
        @endforeach
        @else
        <div id="inam" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner d-flex">
                <div class="carousel-item active ">
                    <div class="container">
                        <div class="row">
                            @foreach ($user_playlists->take(4) as $user_playlists)
                            <div class="col">
                                <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                    <div class="card-body">
                                        <p class="card-text">{{ $playlists[$user_playlists->id_playlist
                                            -1]->name_playlist }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            @foreach ($user_playlists->take(4) as $user_playlists)
                            <div class="col">
                                <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                    <div class="card-body">
                                        <p class="card-text">{{ $playlists[$user_playlists->id_playlist
                                            -1]->name_playlist }}</p>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#inam" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#inam" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#inam" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#inam" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        @endif
    </div>
</div>
</div>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Canciones Favoritas</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if (count($user_like) < 4) @foreach ($user_like as $ul) <div class="col">
                <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                    <a href="{{ url('songview') }}/{{ $songs[$ul->id_song]->id_song}}"><img
                            src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4" borde="0"></a>
                    <div class="card-body">
                        <p class="card-text">{{ $songs[$ul->id_song]->name_song }}</p>
                        <p class="card-text"><small class="text-muted">{{$artist[$songs[$ul->id_song]->artist -
                                1]->name_user}}</small></p>
                    </div>
                </div>
        </div>
        @endforeach
        @else
        <div id="inam2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            @foreach ($user_like->random(4) as $ul)
                            <div class="col">
                                <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="{{ url('songview') }}/{{ $songs[$ul->id_song]->id_song}}"><img
                                            src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4"
                                            borde="0"></a>
                                    <div class="card-body">
                                        <p class="card-text">{{ $songs[$ul->id_song]->name_song }}</p>
                                        <p class="card-text"><small
                                                class="text-muted">{{$artist[$songs[$ul->id_song]->artist -
                                                1]->name_user}}</small></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            @foreach ($user_like->random(4) as $ul)
                            <div class="col">
                                <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="{{ url('songview') }}/{{ $songs[$ul->id_song]->id_song }}"><img
                                            src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4"
                                            borde="0"></a>
                                    <div class="card-body">
                                        <p class="card-text">{{ $songs[$ul->id_song]->name_song }}</p>
                                        <p class="card-text"><small class="text-muted">{{
                                                $artist[$songs[$ul->id_song]->artist]->name_user }}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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