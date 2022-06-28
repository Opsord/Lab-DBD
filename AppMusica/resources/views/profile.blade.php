@extends('layouts.template')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Perfil</h1>
</div>

<div class="card" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <a href="https://www.instagram.com/perritodelbar/"><img src="https://i.ibb.co/TmkwfHm/perritodelbar.jpg"
                    alt="perritodelbar"></a>
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
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=vS46sgmnPQE"><img
                                                src="https://i.ibb.co/D159bPC/reggaeton.jpg" alt="reggaeton"></a>
                                        <div class="card-body">
                                            <p class="card-text">Mix Reggaeton</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=2WLyFO4ZFfU"><img
                                                src="https://i.ibb.co/BNYvWcX/Clasic-Rock.jpg" alt="Clasic-Rock"></a>
                                        <div class="card-body">
                                            <p class="card-text">Clasic Rock</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=M8GYYAcdgb0"><img
                                                src="https://i.ibb.co/8YPSxDJ/Pop-Music.jpg" alt="Pop-Music"></a>
                                        <div class="card-body">
                                            <p class="card-text">Best Pop Music</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=gQlUknjUX0I"><img
                                                src="https://i.ibb.co/0JzyrGZ/Electro-House.jpg"
                                                alt="Electro-House"></a>
                                        <div class="card-body">
                                            <p class="card-text">Electro House</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
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
                                        <a href="https://www.youtube.com/watch?v=Vzy8gCdfdkE"><img src="https://i.ibb.co/wSKqLpF/fiesta-tropical.jpg" alt="fiesta-tropical"></a>
                                        <div class="card-body">
                                            <p class="card-text">Fiesta Tropical</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=EkUNRrSft-g"><img src="https://i.ibb.co/tq14hTg/reggae.jpg" alt="reggae"></a>
                                        <div class="card-body">
                                            <p class="card-text">Reggae Music</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=LioiF4XdRwQ"><img src="https://i.ibb.co/sHvT84C/cumbia-chilena.jpg" alt="cumbia-chilena"></a>
                                        <div class="card-body">
                                            <p class="card-text">Cumbia Chilena</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=Cn5N2_dYfFY"><img src="https://i.ibb.co/DRS75zm/trap.jpg" alt="trap"></a>
                                        <div class="card-body">
                                            <p class="card-text">Trap Music</p>
                                            <p class="card-text"><small class="text-muted">Various Artists</small></p>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=mE7lTMxlJI0"><img src="https://i.ibb.co/YX90THB/woof.jpg" alt="woof"></a>
                                        <div class="card-body">
                                            <p class="card-text">Woof!</p>
                                            <p class="card-text"><small class="text-muted">Snoop Dogg</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=H7dQCq1lQtM"><img src="https://i.ibb.co/H28XGZ3/guach-perry.jpg" alt="guach-perry"></a>
                                        <div class="card-body">
                                            <p class="card-text">Guach Perry</p>
                                            <p class="card-text"><small class="text-muted">Chancho En Piedra</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=y-Hij3yMD60"><img src="https://i.ibb.co/zXcVfxs/Perro-Chocolo.jpg" alt="Perro-Chocolo"></a>
                                        <div class="card-body">
                                            <p class="card-text">Así yo ladro</p>
                                            <p class="card-text"><small class="text-muted">El Perro Chocolo</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=z1CSneHgd6c"><img src="https://i.ibb.co/c3rBjpk/Doggy-Style.webp" alt="Doggy-Style"></a>
                                        <div class="card-body">
                                            <p class="card-text">Doggy Style</p>
                                            <p class="card-text"><small class="text-muted">31 Minutos</small></p>
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
                                        <a href="https://www.youtube.com/watch?v=UaXqj5CBtMU"><img src="https://i.ibb.co/f8dQZ52/perros-salvajes.jpg" alt="perros-salvajes"></a>
                                        <div class="card-body">
                                            <p class="card-text">Perros Salvajes</p>
                                            <p class="card-text"><small class="text-muted">Daddy Yankee</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=jM3gkvfg2WA"><img src="https://i.ibb.co/txcVyDb/Exilio.jpg" alt="Exilio"></a>
                                        <div class="card-body">
                                            <p class="card-text">Exilio</p>
                                            <p class="card-text"><small class="text-muted">Perrosky</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=hxjf_Wnc0SU"><img src="https://i.ibb.co/4M75qdd/Baile-del-Perro.jpg" alt="Baile-del-Perro"></a>
                                        <div class="card-body">
                                            <p class="card-text">El Baile del Perrito</p>
                                            <p class="card-text"><small class="text-muted">Wilfrido Vargas</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
                                        <a href="https://www.youtube.com/watch?v=JasYNAEgehM"><img src="https://i.ibb.co/Hh3RWpN/perrito-malvado.jpg" alt="perrito-malvado"></a>
                                        <div class="card-body">
                                            <p class="card-text">Perrito Malvado</p>
                                            <p class="card-text"><small class="text-muted">Damas Gratis</small></p>
                                        </div>
                                    </div>
                                </div>
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