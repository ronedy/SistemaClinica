@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'usuarios'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Usuarios</h4>
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
                    <div class="row">
                        <div class="col-12 text-left">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-md btn-primary">{{ __('Nuevo usuario') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>Rol</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th class="text-right">Operaciones</th>
                                </thead>
                                <tbody>
                                    @foreach($users as $usuario)
                                    <tr>
                                        <td>{{ optional($usuario->rol)->descripcion ?? '' }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td class="text-right">
                                            <a rel="tooltip" class="btn btn-success" href="{{ route('usuarios.edit', $usuario) }}" data-original-title="" title="">
                                                Editar
                                            </a>
                                            @if ( $usuario->id != 1)
                                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("¿Este proceso no puede revertirse, estás seguro?") }}') ? this.parentElement.submit() : ''">
                                                    Eliminar
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
