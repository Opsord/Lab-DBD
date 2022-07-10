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
                </td>
                <td>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection