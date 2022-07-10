@extends('layouts.template')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Playlists</h1>
</div>

<div class="container-fluid  ">
    <div class="row">
        <div class="col">
        @if (count($playlists) < 5) 
            <div id="inam" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner d-flex">
                    <div class="carousel-item active ">
                        <div class="container">
                            <div class="row">
                                @foreach ($playlists as $p)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                                src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                                borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{ $p->name_playlist }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
        @else
            <div id="inam" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner d-flex">
                    <div class="carousel-item active ">
                        <div class="container">
                            <div class="row">
                            @if (count($playlists) > 4)
                            @for ($j = 0;$j < 4;$j++) 
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$playlists[$j]->name_playlist}}</p>
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
                                @for ($j = 4;$j < 8;$j++)
                                <div class="col">                                    
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$playlists[$j]->name_playlist}}</p>
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
                                @if (count($playlists) > 8)
                                @for ($j = 8;$j < count($playlists);$j++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                        src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                        borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$playlists[$j]->name_playlist}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                                @endif
                                @endif
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
        @endif
        </div>
    </div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Albums</h1>
</div>

<div class="container-fluid  ">
    <div class="row">
        <div class="col">
        @if (count($albums) < 5) 
            <div id="inam2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner d-flex">
                    <div class="carousel-item active ">
                        <div class="container">
                            <div class="row">
                                @foreach ($artist_albums as $a_a)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                                src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                                borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{ $albums[$a_a->album - 1]->name_album }}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$a_a->artist -1]->name_user }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#inam2" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#inam2" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        @else
            <div id="inam2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner d-flex">
                    <div class="carousel-item active ">
                        <div class="container">
                            <div class="row">
                                @if (count($albums) > 4)
                                @for ($j = 0;$j < 4;$j++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$albums[arist_albums[$j]->album - 1]->name_album}}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$artist_albums[$j]->artist -1]->name_user }}</small>
                                            </p>
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
                                @for ($j = 4;$j < 8;$j++)
                                <div class="col">                             
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$albums[artist_albums[$j]->album - 1]->name_album}}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$artist_albums[$j]->artist -1]->name_user }}</small>
                                            </p>
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
                                @if (count($albums) > 8)
                                @for ($j = 8;$j < count($albums);$j++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                        src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                        borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$albums[artist_albums[$j]->album - 1]->name_album}}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$artist_albums[$j]->artist -1]->name_user }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                                @endif
                                @endif
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
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Canciones</h1>
</div>

<div class="container-fluid  ">
    <div class="row">
        <div class="col">
        @if (count($songs) < 5) 
            <div id="inam3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner d-flex">
                    <div class="carousel-item active ">
                        <div class="container">
                            <div class="row">
                                @foreach ($songs as $s)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                                src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                                borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{ $s->name_song }}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$s->artist -1]->name_user }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#inam3" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#inam3" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        @else
            <div id="inam3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner d-flex">
                    <div class="carousel-item active ">
                        <div class="container">
                            <div class="row">
                            @if (count($songs) > 4)
                            @for ($j = 0;$j < 4;$j++) 
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$songs[$j]->name_song}}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$s->artist -1]->name_user }}</small>
                                            </p>
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
                                @for ($j = 4;$j < 8;$j++)
                                <div class="col">                                    
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                            src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                            borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$songs[$j]->name_song}}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$s->artist -1]->name_user }}</small>
                                            </p>
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
                                @if (count($songs) > 8)
                                @for ($j = 8;$j < 12;$j++)
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;margin: auto;">
                                        <a href="https://ibb.co/K96Nm7K"><img
                                        src="https://i.ibb.co/K96Nm7K/music-album-1.png" alt="music-album-1"
                                        borde="0"></a>
                                        <div class="card-body">
                                            <p class="card-text">{{$songs[$j]->name_song}}</p>
                                            <p class="card-text"><small class="text-muted">{{
                                                $artist[$s->artist -1]->name_user }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                                @endif
                                @endif
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
        @endif
        </div>
    </div>
</div>
@endsection