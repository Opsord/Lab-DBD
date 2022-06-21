@extends ('layouts.dashtemplate')

@section('dashcontent')
    <h1>Usuarios Registrados</h1>
    <table class="table col-12 table-responsive">
        <thead class="text-light">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Password</td>
                <td>Email</td>
                <td>birthday</td>
                <td>Subscription</td>
            </tr>
        </thead>
        <tbody class = "text-light">
            @foreach($users as $usuario)
            <tr>
                <td>{{$usuario->id_user}}</td>
                <td>{{$usuario->name_user}}</td>
                <td>{{$usuario->pass_user}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->birthday}}</td>
                <td>{{$usuario->id_subscription}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection