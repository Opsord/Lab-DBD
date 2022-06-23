@extends ('layouts.dashtemplate')

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">Usuarios Registrados</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
            data-bs-target="#usermodal">
            Agregar Usuario
        </button>
    </div>
    <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/user/create" method="post">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Nombre">
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="birthday" placeholder="Birthday">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="id_subscription" placeholder="id suscripcion">
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
                <td>Username</td>
                <td>Password</td>
                <td>Email</td>
                <td>birthday</td>
                <td>Subscription</td>
                <td></td>
            </tr>
        </thead>
        <tbody class="text-light">
            @foreach ($users as $usuario)
                <tr>
                    <td>{{ $usuario->id_user }}</td>
                    <td>{{ $usuario->name_user }}</td>
                    <td>{{ $usuario->pass_user }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->birthday }}</td>
                    <td>{{ $usuario->id_subscription }}</td>
                    <td>
                        <form action="{{url("user/delete")}}/{{$usuario->id_user}}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
