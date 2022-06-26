@extends ('layouts.dashtemplate')

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">Papelera Usuarios</h1>
        <form action="{{url("user/restoreAll")}}" method="post">
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                Restaurar todos los usuarios
            </button>
        </form>
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
                        <form action="{{url("user/restore")}}/{{$usuario->id_user}}" method="post">
                            <button class="btn btn-outline-success"><i class="bi bi-arrow-counterclockwise"></i></button>
                        </form>
                    </td>
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