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
                <h5 class="card-title">Tomas Bowie</h5>
                <p class="card-text">El unico e inigualable perrito del bar</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Playlists</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div id="inam" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @for($i = 0;$i < 4;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://ibb.co/K96Nm7K"><img src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1" borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$playlists[$i]->name_playlist}}</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @for($i = 4;$i < 8;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://ibb.co/K96Nm7K"><img src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1" borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$playlists[$i]->name_playlist}}</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
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
    <h1 class="text-light">Canciones Favoritas</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div id="inam2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @for($i = 0;$i < 4;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://ibb.co/1rqXc67"><img src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4" borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$songs[$i]->name_song}}</p>
                                            <p class="card-text"><small class="text-muted">Snoop Dogg</small></p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @for($i = 4;$i < 8;$i++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="https://i.ibb.co/1rqXc67/zhiv-song-4.png" alt="zhiv-song-4" borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">Perros Salvajes</p>
                                            <p class="card-text"><small class="text-muted">Daddy Yankee</small></p>
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


@endsection