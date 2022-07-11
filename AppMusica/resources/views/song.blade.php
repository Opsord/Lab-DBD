@extends ('layouts.dashtemplate')

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">Canciones</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
            data-bs-target="#songmodal">
            Agregar Cancion
        </button>
    </div>
    <div class="modal fade" id="songmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" name="explicit"
                                placeholder="Restriccion etario: (true o false)">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="id_album" placeholder="id Album">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="id_artist" placeholder="id Artista">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="id_genre" placeholder="id Genero">
                        </div>
                        <input type="hidden" name="reproducciones" name="reproducciones" value=0>
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
                <td>#</td>
                <td>TITULO</td>
                <td>⌛</td>
                <td>EXPLÍCITO(?)</td>
                <td>ÁLBUM</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody class="text-light">
            @foreach ($songs as $song)
                <tr>
                    <td>{{ $song->id_song }}</td>
                    <td>{{ $song->name_song }}</td>
                    <td>{{ $song->duration }}</td>
                    <td>{{ $song->is_explicit }}</td>
                    <td>{{ $album[$song->album - 1]->name_album }}</td>
                    <td>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm" data-bs-toggle="modal"
                            data-bs-target="#song-editmodal{{$song->id_song}}"><i class="bi bi-pencil-square"></i>
                        </button>
                        <div class="modal fade" id="song-editmodal{{$song->id_song}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-black" id="exampleModalLabel">Editar Cancion id: {{$song->id_song}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('song/update') }}/{{ $song->id_song }}" method="post">
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" name="name_song"
                                                    placeholder="Nombre de la cancion">
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" name="duration"
                                                    placeholder="Duracion (hh:mm:ss)">
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" name="explicit"
                                                    placeholder="Restriccion etario: (true o false)">
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="number" class="form-control" name="id_album"
                                                    placeholder="id Album">
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="number" class="form-control" name="id_artist"
                                                    placeholder="id Artista">
                                            </div>
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
                    </td>


                    <td>
                        <form action="{{ url('song/delete') }}/{{ $song->id_song }}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <a style="text-decoration: none" class="text-light" href="/songs/archive"><i class="bi bi-trash"></i>
                Papelera</a>
        </button>
    </div>
@endsection
