@extends ('layouts.dashtemplate')

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">Canciones</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
            data-bs-target="#usermodal">
            Agregar Cancion
        </button>
    </div>
    <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Cancion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/song/create" method="post">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="name_song" placeholder="Nombre de la cancion">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="duration" placeholder="Duracion (hh:mm:ss)">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="explicit" placeholder="Restriccion etario: (true o false)">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="id_album" placeholder="id Album">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="id_genre" placeholder="id Genero">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="id_country" placeholder="id Pais">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table col-12 table-responsive">
        <thead class="text-light">
            <tr>
                <td>ID</td>
                <td>Namesong</td>
                <td>duration</td>
                <td>explicit?</td>
                <td>album name</td>
                <td>album id</td>
                <td>country</td>
                <td>country id</td>
                <td>genre</td>
                <td></td>
            </tr>
        </thead>
        <tbody class="text-light">
            @for($i = 0; $i< count($songs); $i++)
            <tr>
                <td>{{ $songs[$i]->id_song }}</td>
                <td>{{ $songs[$i]->name_song }}</td>
                <td>{{ $songs[$i]->duration }}</td>
                <td>{{ $songs[$i]->is_explicit }}</td>
                <td>{{ $album[$songs[$i]->album - 1]->name_album}}</td>
                <td>{{$songs[$i]->album}}</td>
                <td>{{ $country[$songs[$i]->country - 1]->name_country }}</td>
                <td>{{$songs[$i]->country}}</td>
                <td>{{ $songs[$i]->genre }}</td>
                <td>
                    <form action="{{ url('song/delete') }}/{{ $songs[$i]->id_song }}" method="post">
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button>
                    </form>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
    <div>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <a style="text-decoration: none" class="text-light" href="/songs/archive"><i class="bi bi-trash"></i> Papelera</a>
        </button>
    </div>
@endsection
