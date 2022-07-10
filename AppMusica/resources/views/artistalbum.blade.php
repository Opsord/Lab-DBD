@extends ('layouts.artistdashtemplate')

@section('user')
<button class="btn btn-warning btn-lg" type="button">
    <i class="bi bi-person-circle"></i>Username
</button>
<button type="button" class="btn btn-lg btn-warning dropdown-toggle dropdown-toggle-split"
    data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
    <li>Cerrar sesion</li>
</ul>
@endsection

@section('dashcontent')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="text-light">Tus Albums creados</h1>
</div>
<table class="table col-12 table-responsive">
    <thead class="text-light">
        <tr>
            <td>#</td>
            <td>ALBUM</td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody class="text-light">
        @foreach ($album as $album)
            <tr>
                <td>{{ $album->album }}</td>
                <td>{{ $album->name_album }}</td>
                <td><a href="{{url('albumedit')}}/{{$album->id_album}}"><button type="" class="btn btn-outline-success"><i class="bi bi-box-arrow-in-left"></i></button></a></td>
                <td><button type="" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection