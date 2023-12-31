@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'usuarios',
])

@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Editar usuario') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('usuarios.update', $usuario) }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('id_rol') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="select_rol">{{ __('Rol:') }}</label>
                                        <select class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="id_rol"
                                            id="select_rol"
                                            required
                                            autofocus
                                        >
                                        <option value="1" {{ old('id_rol', $usuario->id_rol) == 1 ? 'selected' : '' }}>Administador</option>
                                        <option value="2" {{ old('id_rol', $usuario->id_rol) == 2 ? 'selected' : '' }}>Secretaria</option>
                                        </select>

                                        @if ($errors->has('id_rol'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('id_rol') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Username:') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Username') }}" value="{{ old('name', $usuario->name) }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Correo:') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo') }}" value="{{ old('email', $usuario->email) }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('Contraseña: (opcional)') }}</label>
                                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}" value="">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Actualizar usuario') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
