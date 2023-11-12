@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'bitacora'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bitacoras</h4>
                    </div>
                    @if (session('mensaje'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span>{{ session('mensaje') }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{  route('bitacora.index') }}" method="get">
                            <div class="row">
                                <div class="col-4">
                                    <input class="form-control" type="date" name="fecha_inicio" value="{{ $fechaInicio ?? '' }}" />
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="date" name="fecha_fin" value="{{ $fechaFin ?? '' }}" />
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary" type="submit">Consultar</button>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Descripción
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($bitacoras as $bitacora)
                                    <tr>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($bitacora->created_at)) }}</td>
                                        <td>{{ $bitacora->descripcion }}</td>
                                        <td>{{ $bitacora->username }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $bitacoras->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
