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
                <td></td>
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
                    <td>
                        <form action="{{ url('song/restore') }}/{{ $songs[$i]->id_song }}" method="post">
                            <button class="btn btn-outline-success"><i class="bi bi-arrow-counterclockwise"></i></button>
                        </form>
                    </td>
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
@endsection
