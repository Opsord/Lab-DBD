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
                                        <a href="https://ibb.co/D159bPC"><img
                                                src="https://i.ibb.co/D159bPC/reggaeton.jpg" alt="reggaeton"></a>
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
                                        <a href="https://ibb.co/wSKqLpF"><img src="https://i.ibb.co/wSKqLpF/fiesta-tropical.jpg" alt="fiesta-tropical"></a>
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
    <h1 class="text-light">albums para ti</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div id="inam3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://www.youtube.com/watch?v=uVu_y9ZV-D4"><img src="https://i.ibb.co/XF8YdPw/harry-styles-fine-line-portada.jpg" alt="harry-styles-fine-line-portada" /></a>
                                        <div class="card-body">
                                            <p class="card-text">Fine Line</p>
                                            <p class="card-text"><small class="text-muted">Harry Styles</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://www.youtube.com/watch?v=w8eFZoOcYKc&list=PLtdokPm7vPss1TXrV4gr2pnSXmMu-UFF4"><img src="https://i.ibb.co/xs1Jmj3/el-finde-uwu.jpg" alt="el-finde-uwu" /></a>
                                        <div class="card-body">
                                            <p class="card-text">Dawn FM</p>
                                            <p class="card-text"><small class="text-muted">The Weeknd</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://www.youtube.com/watch?v=NBghhjuMNKM&list=PLxA687tYuMWhfoXY3jn9zjMklNtWXcdMA"><img src="https://i.ibb.co/Thcj1m6/imagen-album.jpg" alt="imagen-album" ></a>
                                        <div class="card-body">
                                            <p class="card-text">Un verano sin ti</p>
                                            <p class="card-text"><small class="text-muted">Bad Bunny</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://www.youtube.com/watch?v=9xE0x05Xuuk&list=PLOkPWZS9Q7ECOreiaeGJZ_dA8KlCtsvHN"><img src="https://i.ibb.co/nmVh5sW/AM-Arctic-Monkeys.jpg" alt="AM-Arctic-Monkeys" /></a>
                                        <div class="card-body">
                                            <p class="card-text">AM</p>
                                            <p class="card-text"><small class="text-muted">Arctic Monkeys</small></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=QylI7_zJb_E&list=PLxzSZG7g8c8xSdLdrwSQAdxGeA9WZQ6EW"><img src="https://i.ibb.co/JxtfZPc/71lix6-Vf-WL-SL1425.jpg" alt="71lix6-Vf-WL-SL1425" /></a>
                                        <div class="card-body">
                                            <p class="card-text">DEMON DAYS</p>
                                            <p class="card-text"><small class="text-muted">Gorillaz</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=j7nkIvq_pps&list=PLOjtwjHYJ8s6VkIeWhrT_-44gtTdeTRGf"><img src="https://i.ibb.co/58qp7mZ/giveon.jpg" alt="giveon" /></a>
                                        <div class="card-body">
                                            <p class="card-text">Take Time</p>
                                            <p class="card-text"><small class="text-muted">Giveon</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=I8c7UBa_0nk&list=PLxA687tYuMWjiBbeqzFWT8YYFMvbUzAX4"><img src="https://i.ibb.co/wy3WTqx/joji.jpg" alt="joji" /></a>
                                        <div class="card-body">
                                            <p class="card-text">Nectar</p>
                                            <p class="card-text"><small class="text-muted">Joji</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                    <a href="https://www.youtube.com/watch?v=_hZCsgcKa-g&list=PLxKHVMqMZqUTP5JaywWtDhnTvczizFG8u"><img src="https://i.ibb.co/NStx54n/childish.png" alt="childish"  /></a>
                                        <div class="card-body">
                                            <p class="card-text">Redbone</p>
                                            <p class="card-text"><small class="text-muted">Childish Gambino</small></p>
                                        </div>
                                    </div>
                                </div>
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