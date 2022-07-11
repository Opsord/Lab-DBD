@extends ('layouts.artistdashtemplate')

@section('user')
    <button class="btn btn-warning btn-lg" type="button">
        <i class="bi bi-person-circle"></i>Username
    </button>
    <button type="button" class="btn btn-lg btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
        aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li>Cerrar sesion</li>
    </ul>
@endsection

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">{{ $album->name_album }}</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i class="bi bi-pencil-square"></i>
        </button>
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
                            <input type="hidden" class="form-control" name="id_album" placeholder="id Album" value="{{$album->id_album}}">
                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" name="id_artist" placeholder="id Artista" value="{{$user->id_user}}">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="id_genre" placeholder="id Genero">
                        </div>
                        <input type="hidden" class="form-control" name="reproducciones" value=0>
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
                    <td>{{ $album->name_album }}</td>
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
                                                    placeholder="Nombre de la cancion" value="{{$song->name_song}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" name="duration"
                                                    placeholder="Duracion (hh:mm:ss)" value="{{$song->duration}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" name="explicit"
                                                    placeholder="Restriccion etario: (true o false)" value="{{$song->is_explicit}}">
                                            </div>
                                                <input type="hidden" class="form-control" name="id_album"
                                                    placeholder="id Album" value="{{$song->album}}">

                                            <div class="form-group mb-3">
                                                <input type="hidden" class="form-control" name="id_artist"
                                                    placeholder="id Artista" value="{{$song->artist}}">
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
