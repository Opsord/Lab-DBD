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
<a href="/profile"><button class="btn btn-warning btn-lg" type="button">
    <i class="bi bi-person-circle"></i>{{$user->name_user}}
</button></a>
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
    <h1 class="text-light">¡Bienvenido {{$user->name_user}}, disfruta tu estancia en nuestra paltaforma!</h1>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Playlists recomendadas</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div id="inam" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @for ($i = 0;$i < 4;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://ibb.co/K96Nm7K"><img src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1" ></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$playlists[$user_playlists[$i]->id_playlist - 1]->name_playlist}}</p>
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
                                    <a href="https://ibb.co/K96Nm7K"><img src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1" ></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$playlists[$user_playlists[$i]->id_playlist - 1]->name_playlist}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
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
        </div>
    </div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">TOP 10 más escuchadas</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div id="inam2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @for ($i = 0;$i < 4;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="{{ url('songview') }}/{{ $top10[$i]->id_song}}"><img
                                            src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$top10[$i]->name_song}}</p>
                                            <p class="card-text"><small class="text-muted">{{$artist[$top10[$i]->artist - 1]->name_user}}</small></p>
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
                                        <a href="{{ url('songview') }}/{{ $top10[$i]->id_song}}"><img
                                            src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$top10[$i]->name_song}}</p>
                                            <p class="card-text"><small class="text-muted">{{$artist[$top10[$i]->artist - 1]->name_user}}</small></p>
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
                                @for ($i = 8;$i < 10;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="{{ url('songview') }}/{{ $top10[$i]->id_song}}"><img
                                            src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$top10[$i]->name_song}}</p>
                                            <p class="card-text"><small class="text-muted">{{$artist[$top10[$i]->artist - 1]->name_user}}</small></p>
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
        </div>
    </div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Albums para ti</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div id="inam3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @for ($i = 0;$i < 4;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://ibb.co/7GpPJF1"><img src="https://i.ibb.co/7GpPJF1/music-album-icon.png" alt="music-album-icon"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$albums[$artist_albums[$i]->album - 1]->name_album}}</p>
                                            <p class="card-text"><small class="text-muted">{{$artist[$artist_albums[$i]->artist -1]->name_user}}</small></p>
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
                                        <a href="https://ibb.co/7GpPJF1"><img src="https://i.ibb.co/7GpPJF1/music-album-icon.png" alt="music-album-icon"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$albums[$artist_albums[$i]->album - 1]->name_album}}</p>
                                            <p class="card-text"><small class="text-muted">{{$artist[$artist_albums[$i]->artist -1]->name_user}}</small></p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#inam3" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#inam3" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection