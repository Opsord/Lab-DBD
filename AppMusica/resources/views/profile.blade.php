@extends('layouts.template')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Perfil</h1>
</div>

<div class="card" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <a href="https://ibb.co/MGnWpGg"><img src="https://i.ibb.co/MGnWpGg/perritodelbar.jpg" alt="perritodelbar"></a>
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
<div class="container">
    <div class="row">
      <div class="col">
        <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
            <a href="https://ibb.co/D159bPC"><img src="https://i.ibb.co/D159bPC/reggaeton.jpg" alt="reggaeton"></a>
            <div class="card-body">
              <p class="card-text">Mix Reggaeton</p>
              <p class="card-text"><small class="text-muted">Various Artists</small></p>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
            <a href="https://ibb.co/BNYvWcX"><img src="https://i.ibb.co/BNYvWcX/Clasic-Rock.jpg" alt="Clasic-Rock"></a>
            <div class="card-body">
              <p class="card-text">Clasic Rock</p>
              <p class="card-text"><small class="text-muted">Various Artists</small></p>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
            <a href="https://ibb.co/8YPSxDJ"><img src="https://i.ibb.co/8YPSxDJ/Pop-Music.jpg" alt="Pop-Music"></a>
            <div class="card-body">
              <p class="card-text">Best Pop Music</p>
              <p class="card-text"><small class="text-muted">Various Artists</small></p>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card text-bg-warning mb-3" style="width: 11.4rem;">
            <a href="https://ibb.co/0JzyrGZ"><img src="https://i.ibb.co/0JzyrGZ/Electro-House.jpg" alt="Electro-House"></a>
            <div class="card-body">
              <p class="card-text">Electro House</p>
              <p class="card-text"><small class="text-muted">Various Artists</small></p>
            </div>
          </div>
      </div>
    </div>
  </div>

@endsection