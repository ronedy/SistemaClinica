@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'especialidades'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Nueva especialidad</h5>
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
                    <form method="post" action="{{ route('especialidad.store') }}" autocomplete="off" class="form-horizontal">
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
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection