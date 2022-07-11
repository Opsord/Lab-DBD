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
                    <h6 class="mb-2 pb-1">Genero: </h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="femaleGender"
                            value="option1" checked />
                        <label class="form-check-label" for="femaleGender">F</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="maleGender"
                            value="option2" />
                        <label class="form-check-label" for="maleGender">M</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="otherGender"
                            value="option3" />
                        <label class="form-check-label" for="otherGender">Otro</label>
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
            <td>Role</td>
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
            <td>{{ $role[$usuario->id_user-1]->id_role}}</td>
            <td><button class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#user-editmodal{{$usuario->id_user}}"><i class="bi bi-pencil-square"></i></button>
                <div class="modal fade" id="user-editmodal{{$usuario->id_user}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-black" id="exampleModalLabel">Editar Usuario id:
                                    {{ $usuario->id_user }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ url('user/update') }}/{{ $usuario->id_user }}" method="post">
                                @method("PUT")
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$usuario->name_user}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$usuario->email}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="hidden" class="form-control" name="password"
                                            placeholder="Password" value="{{$usuario->pass_user}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="birthday" placeholder="Birthday" value="{{$usuario->birthday}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="number" class="form-control" name="id_subscription"
                                            placeholder="id suscripcion" value="{{$usuario->id_subscription}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="genre"
                                            placeholder="Gender" value="{{$usuario->genre}}">
                                    </div>

                                    <div class="col-md-10 mb-4">

                                        <h6 class="mb-2 pb-1 text-black">Rol</h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="Artist"
                                            value="3" checked />
                                            <label class="form-check-label text-black"  for="Artist">Artista</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="User"
                                            value="2" />
                                            <label class="form-check-label text-black" for="User">Usuario</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="Admin"
                                            value="1" />
                                            <label class="form-check-label text-black" for="Admin">Admin</label>
                                        </div>

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
                </div>
            </td>
            <td>
                <form action="{{ url('user/delete') }}/{{ $usuario->id_user }}" method="post">
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
        <a style="text-decoration: none" class="text-light" href="/users/archive"><i class="bi bi-trash"></i>
            Papelera</a>
    </button>
</div>
@endsection