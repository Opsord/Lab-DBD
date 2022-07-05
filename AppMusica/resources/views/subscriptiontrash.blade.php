@extends ('layouts.dashtemplate')

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">Subscripciones</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Agregar Subscripcion
        </button>
    </div>
    <table class="table col-12 table-responsive">
        <thead class="text-light">
            <tr>
                <td>ID</td>
                <td>State</td>
                <td>Start date</td>
                <td>End date</td>
                <td>Payment method</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody class="text-light">
            @foreach ($Subscriptions as $sub)
                <tr>
                    <td>{{ $sub->id_subscription }}</td>
                    <td>{{ $sub->state }}</td>
                    <td>{{ $sub->start_date }}</td>
                    <td>{{ $sub->end_date }}</td>
                    <td>{{ $sub->payment_method }}</td>
                    <td>
                        <form action="{{url("/subscription/restore")}}/{{$sub->id_subscription}}" method="post">
                            <button class="btn btn-outline-success"><i class="bi bi-arrow-counterclockwise"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{url("subscription/delete")}}/{{$sub->id_subscription}}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection