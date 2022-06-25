@extends ('layouts.dashtemplate')

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">Generos</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
            data-bs-target="#usermodal">
            Agregar Genero
        </button>
    </div>
    <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Genero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/genre/create" method="post">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="name_genre" placeholder="Nombre del genero">
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
                <td>Genre</td>
                <td></td>
            </tr>
        </thead>
        <tbody class="text-light">
            @foreach ($genres as $generos)
                <tr>
                    <td>{{ $generos->id_genre}}</td>
                    <td>{{ $generos->name_genre }}</td>
                    <td>
                        <form action="{{url("genre/delete")}}/{{$generos->id_genre}}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection