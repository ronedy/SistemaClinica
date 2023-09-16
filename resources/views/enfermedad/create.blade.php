@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'enfermedades'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Nueva enfermedad</h5>
                    </div>
                    @if ($errors->any())
                    <div class="card-body ">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <form method="post" action="{{ route('enfermedad.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                            name="descripcion" id="descripcion" type="text" placeholder="{{ __('Descripción') }}"
                                            value="{{ old('descripcion') }}" aria-required="true" required maxlength="100"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('sintoma') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('sintoma') ? ' is-invalid' : '' }}"
                                            name="sintoma" id="sintoma" type="text" placeholder="{{ __('Síntoma') }}"
                                            value="{{ old('sintoma') }}" aria-required="true" required maxlength="100"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('receta') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('receta') ? ' is-invalid' : '' }}"
                                            name="receta" id="receta" type="text" placeholder="{{ __('Receta') }}"
                                            value="{{ old('receta') }}" aria-required="true" required maxlength="100"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection