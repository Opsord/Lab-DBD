@extends ('layouts.dashtemplate')

@section('dashcontent')
    <h1>Canciones</h1>
    <table class="table col-12 table-responsive">
        <thead class="text-light">
            <tr>
                <td>ID</td>
                <td>Namesong</td>
                <td>duration</td>
                <td>explicit?</td>
                <td>album</td>
                <td>country</td>
                <td>genre</td>
            </tr>
        </thead>
        <tbody class="text-light">
            @foreach ($songs as $cancion)
                <tr>
                    <td>{{ $cancion->id_song }}</td>
                    <td>{{ $cancion->name_song }}</td>
                    <td>{{ $cancion->duration }}</td>
                    <td>{{ $cancion->is_explicit }}</td>
                    <td>{{ $cancion->album }}</td>
                    <td>{{ $cancion->country }}</td>
                    <td>{{ $cancion->id_genre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
