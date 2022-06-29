@extends ('layouts.dashtemplate')

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">Canciones</h1>
        <form action="{{ url('song/restoreAll') }}" method="post">
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#usermodal">
                Restaurar todas las canciones
            </button>
        </form>

    </div>
    <table class="table col-12 table-responsive">
        <thead class="text-light">
            <tr>
                <td>#</td>
                <td>TITULO</td>
                <td>⌛</td>
                <td>EXPLÍCITO(?)</td>
                <td>ÁLBUM</td>
                {{-- <td>album id</td> --}}
                <td>RESTRINGIDA EN</td>
                {{-- <td>country id</td> --}}
                <td>GENERO</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody class="text-light">
            @foreach ($songs as $cancion)
                <tr>
                    <td>{{ $cancion->id_song }}</td>
                    <td>{{ $cancion->name_song }}</td>
                    <td>{{ $cancion->duration }}</td>
                    <td>{{ $cancion->is_explicit }}</td>
                    <td>{{ $album[$songs[$i]->album - 1]->name_album}}</td>
                    <td>{{ $country[$songs[$i]->country - 1]->name_country }}</td>
                    <td>{{ $genre[$songs[$i]->genre - 1]->name_genre }}</td>
                    
                    <td>
                        <form action="{{ url('song/restore') }}/{{ $cancion->id_song }}" method="post">
                            <button class="btn btn-outline-success"><i class="bi bi-arrow-counterclockwise"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ url('song/delete') }}/{{ $cancion->id_song }}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
