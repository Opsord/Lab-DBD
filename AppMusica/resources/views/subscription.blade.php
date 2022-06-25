@extends ('layouts.dashtemplate')

@section('dashcontent')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-light">Subscripciones</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
            data-bs-target="#usermodal">
            Agregar Subscripcion
        </button>
    </div>
    <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Subcripcion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/subscription/create" method="post">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="state" placeholder="Estado">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="start_date" placeholder="Fecha de inicio">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="end_date" placeholder="Fecha de termino">
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" class="form-control" name="payment_method" placeholder="id de metodo de pago">
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
                <td>State</td>
                <td>Start date</td>
                <td>End date</td>
                <td>Payment method</td>
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